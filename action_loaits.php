<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$id_loaits = "";
	$tenloaits = "";

    $update=false;

	if (isset($_POST['add'])) {
        $id_loaits=$_POST['id_loaits'];
		$tenloaits=$_POST['tenloaits'];

		$query = "INSERT INTO LOAITRANGSUC (ID_LOAITS, TENLOAITS) VALUES ( ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $id_loaits, $tenloaits);
		$stmt->execute();
		header('location: loaits.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	if (isset($_GET['delete'])) {
		$id_loaits = $_GET['delete'];

		$query = "DELETE FROM LOAITRANGSUC WHERE ID_LOAITS=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_loaits);
		$stmt->execute();

		header('location: loaits.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$id_loaits = $_GET['edit'];

		$query = "SELECT * FROM LOAITRANGSUC WHERE ID_LOAITS=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_loaits);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$id_loaits = $row['ID_LOAITS'];
		$tenloaits = $row['TENLOAITS'];


        $update=true;
	}if (isset($_POST['update'])) {

        $id_loaits = $_POST['id_loaits'];
        $tenloaits = $_POST['tenloaits'];
      
        // Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
        $query_check = "SELECT * FROM LOAITRANGSUC WHERE ID_LOAITS=?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("s", $id_loaits);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row_check = $result_check->fetch_assoc();
      
        $id_loaits_old = $row_check['id_loaits'];
        $tenloaits_old = $row_check['tenloaits'];
      
        if ($id_loaits != $id_loaits_old || $tenloaits != $tenloaits_old ) {
          echo "Dữ liệu được chỉnh sửa mới:<br>";
          echo "ID loại trang sức: " . $id_loaits . "<br>";
          echo "Tên loại trang sức: " . $tenloaits . "<br>";
        }
      
        // Tiếp tục thực hiện câu truy vấn UPDATE
        $query = "UPDATE LOAITRANGSUC SET TENLOAITS=? WHERE ID_LOAITS=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $tenloaits, $id_loaits);
        $stmt->execute();
      
        $_SESSION['response'] = "Updated Successfully!";
        $_SESSION['res_type'] = "primary";
        header('location: loaits.php');
      }

	if (isset($_GET['details'])) {
		$id_loaits = $_GET['details'];
		$query = "SELECT * FROM LOAITRANGSUC WHERE ID_LOAITS=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_loaits);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$vid = $row['ID_LOAITS'];
		$vtenloaits = $row['TENLOAITS'];
	}
?>