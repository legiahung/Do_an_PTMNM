<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn, 'utf8mb4');
    $id_cus="";
	$id = "";
	$first_name = "";
	$last_name = "";
	$gt = "";
    $email_cus = "";
	$add_cus = "";
	$phone_cus = "";

    $update=false;

	if (isset($_POST['add'])) {

        $id_cus=$_POST['id_cus'];
        $id=$_POST['id'];
        $first_name =$_POST['first_name'];
        $last_name =$_POST['last_name'];
        $gt =$_POST['gt'];
        $email_cus =$_POST['email_cus'];
        $add_cus =$_POST['add_cus'];
        $phone_cus =$_POST['phone_cus'];
    

		$query = "INSERT INTO USERS_CUS ( ID_CUS, ID_USER, FIRSTNAME_CUS, LASTNAME_CUS, GioiTinh, EMAIL_CUS, ADDRESS_CUS, PHONE_CUS ) VALUES (?, ? , ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssssss", $id_cus, $id, $first_name,  $last_name, $gt , $email_cus, $add_cus, $phone_cus );
		$stmt->execute();
		header('location: info_cus.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";

        // Kiểm tra tính hợp lệ của giá trị ID_USER
$query_check_user = "SELECT ID_USER FROM USERS WHERE ID_USER=?";
$stmt_check_user = $conn->prepare($query_check_user);
$stmt_check_user->bind_param("s", $id);
$stmt_check_user->execute();
$result_check_user = $stmt_check_user->get_result();
$row_check_user = $result_check_user->fetch_assoc();
if (!$row_check_user) {
  echo "Giá trị ID_USER không hợp lệ!";
  exit;
}
	}

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$query = "DELETE FROM USERS_CUS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		header('location: info_cus.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];

		$query = "SELECT * FROM USERS_CUS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

        $id_cus=$row['ID_CUS'];
        $id =$row['ID_USER'];
        $first_name =$row['FIRSTNAME_CUS'];
        $last_name =$row['LASTNAME_CUS'];
        $gt =$row['GioiTinh'];
        $email_cus =$row['EMAIL_CUS'];
        $add_cus =$row['ADDRESS_CUS'];
        $phone_cus =$row['PHONE_CUS'];

        $update=true;
	}if (isset($_POST['update'])) {
        
        $id_cus=$_POST['id_cus'];
        $id =$_POST['id'];
        $first_name =$_POST['first_name'];
        $last_name =$_POST['last_name'];
        $gt =$_POST['gt'];
        $email_cus =$_POST['email_cus'];
        $add_cus =$_POST['add_cus'];
        $phone_cus =$_POST['phone_cus'];
      
        // Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
        $query_check = "SELECT * FROM USERS_CUS WHERE ID_USER=?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("i", $id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row_check = $result_check->fetch_assoc();
      
        $id_cus_old=$row_check['id_cus'];
        $first_name_old =$row_check['first_name'];
        $last_name_old =$row_check['last_name'];
        $gt_old=$row_check['gt'];
        $email_cus_old =$row_check['email_cus'];
        $add_cus_old =$row_check['add_cus'];
        $phone_cus_old =$row_check['phone_cus'];
      
        if ($id_cus != $id_cus_old || $first_name != $first_name_old || $last_name != $last_name_old ||
         $gt != $gt_old || $email_cus != $email_cus_old || $add_cus != $add_cus_old || $phone_cus != $phone_cus_old ) {
          echo "Dữ liệu được chỉnh sửa mới:<br>";
          echo "ID cus: " . $id_cus . "<br>";
          echo "Tên: " . $first_name . "<br>";
          echo "Họ: " . $last_name . "<br>";
          echo "Giới tính: " . $gt . "<br>";
          echo "Email: " . $email_cus . "<br>";
          echo "Địa chỉ: " . $add_cus . "<br>";
          echo "SĐT: " . $phone_cus . "<br>";
        }
      
        // Tiếp tục thực hiện câu truy vấn UPDATE
        $query = "UPDATE USERS_CUS SET ID_CUS=?, FIRSTNAME_CUS=?, LASTNAME_CUS=? 
        , GioiTinh=?, EMAIL_CUS=?, ADDRESS_CUS=?, PHONE_CUS=? WHERE ID_USER=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $id_cus, $first_name, $last_name,$gt ,
        $email_cus,$add_cus,$phone_cus, $id);
        $stmt->execute();
      
        $_SESSION['response'] = "Updated Successfully!";
        $_SESSION['res_type'] = "primary";
        header('location: info_cus.php');
      }

	if (isset($_GET['details'])) {
		$id = $_GET['details'];
		$query = "SELECT * FROM USERS_CUS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		
        $vid_cus=$row['ID_CUS'];
        $vid =$row['ID_USER'];
        $vfirst_name =$row['FIRSTNAME_CUS'];
        $vlast_name =$row['LASTNAME_CUS'];
        $vgt =$row['GioiTinh'];
        $vemail_cus =$row['EMAIL_CUS'];
        $vadd_cus =$row['ADDRESS_CUS'];
        $vphone_cus =$row['PHONE_CUS'];
	}
?>