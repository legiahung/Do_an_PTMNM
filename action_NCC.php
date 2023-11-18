<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$id = "";
	$tenncc = "";
	$emailncc = "";
	$addncc = "";
    $phonencc = "";

    $update=false;

	if (isset($_POST['add'])) {
        $id=$_POST['id'];
		$tenncc=$_POST['tenncc'];
		$emailncc=$_POST['emailncc'];
        $addncc=$_POST['addncc'];
		$phonencc=$_POST['phonencc'];

		$query = "INSERT INTO NCC (ID_NCC, NAME_NCC, EMAIL_NCC, ADDRESS_NCC, PHONE_NCC ) VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("sssss", $id, $tenncc, $emailncc, $addncc, $phonencc);
		$stmt->execute();
		header('location: NCC.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$query = "DELETE FROM NCC WHERE ID_NCC=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id);
		$stmt->execute();

		header('location: NCC.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];

		$query = "SELECT * FROM NCC WHERE ID_NCC=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$id = $row['ID_NCC'];
        $tenncc = $row['NAME_NCC'];
        $emailncc = $row['EMAIL_NCC'];
        $addncc = $row['ADDRESS_NCC'];
        $phonencc = $row['PHONE_NCC'];

        $update=true;
	}if (isset($_POST['update'])) {
 
        $id = $_POST['id'];
        $tenncc = $_POST['tenncc'];
        $emailncc = $_POST['emailncc'];
        $addncc = $_POST['addncc'];
        $phonencc = $_POST['phonencc'];
      
        // Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
        $query_check = "SELECT * FROM NCC WHERE ID_NCC=?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("s", $id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row_check = $result_check->fetch_assoc();
      
        $id_old = $row_check['id'];
        $tenncc_old = $row_check['tenncc'];
        $emailncc_old = $row_check['emailncc'];
        $addncc_old = $row_check['addncc'];
        $phonencc_old = $row_check['phonencc'];
      
        if ($id != $id_old || $tenncc != $tenncc_old || $emailncc != $emailncc_old 
        || $addncc != $addncc_old || $phonencc != $phonencc_old ) {
          echo "Dữ liệu được chỉnh sửa mới:<br>";
          echo "ID: " . $id . "<br>";
          echo "Tên NCC: " . $tenncc . "<br>";
          echo "Email NCC: " . $emailncc . "<br>";
          echo "Địa chỉ NCC: " . $addncc . "<br>";
          echo "SĐT NCC: " . $phonencc . "<br>";
        }
      
        // Tiếp tục thực hiện câu truy vấn UPDATE
        $query = "UPDATE NCC SET NAME_NCC=?, EMAIL_NCC=?, ADDRESS_NCC=?, PHONE_NCC=? WHERE ID_NCC=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $tenncc, $emailncc, $addncc, $phonencc , $id);
        $stmt->execute();
      
        $_SESSION['response'] = "Updated Successfully!";
        $_SESSION['res_type'] = "primary";
        header('location: NCC.php');
      }

	if (isset($_GET['details'])) {
		$id = $_GET['details'];
		$query = "SELECT * FROM NCC WHERE ID_NCC=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$vid = $row['ID_NCC'];
		$vtenncc = $row['NAME_NCC'];
		$vemailncc = $row['EMAIL_NCC'];
		$vaddncc = $row['ADDRESS_NCC'];
        $phonencc = $row['PHONE_NCC'];
	}
?>