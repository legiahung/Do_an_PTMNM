<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$id = "";
	$name="";
	$email = "";
	$password = "";
	$typeuser = "";

    $update=false;

	if (isset($_POST['add'])) {
		$name=$_POST['name'];
        $email=$_POST['email'];
		$password=$_POST['password'];
		$typeuser=$_POST['typeuser'];

		$query = "INSERT INTO USERS (NAME, EMAIL, PASS, TYPE_USER) VALUES (?,?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssss", $name, $email, $password, $typeuser);
		$stmt->execute();
		header('location: general1.php');
		$_SESSION['response'] = "Successfully Inserted to the database!";
		$_SESSION['res_type'] = "success";
	}

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$query = "DELETE FROM USERS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		header('location: general1.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];

		$query = "SELECT * FROM USERS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$id = $row['ID_USER'];
		$name = $row['NAME'];
		$email = $row['EMAIL'];
		$password = $row['PASS'];
		$typeuser = $row['TYPE_USER'];

        $update=true;
	}if (isset($_POST['update'])) {
        $id = $_POST['id'];
		$name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $typeuser = $_POST['typeuser'];
      
        // Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
        $query_check = "SELECT * FROM USERS WHERE ID_USER=?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("i", $id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        $row_check = $result_check->fetch_assoc();
      
		$name_old = $row_check['name'];
        $email_old = $row_check['email'];
        $password_old = $row_check['pass'];
        $typeuser_old = $row_check['typeuser'];
      
        if ($name != $name_old ||$email != $email_old || $password != $password_old || $typeuser != $typeuser_old) {
          echo "Dữ liệu được chỉnh sửa mới:<br>";
		  echo "Tên : " . $name . "<br>";
          echo "Email: " . $email . "<br>";
          echo "Password: " . $password . "<br>";
          echo "Loại tài khoản: " . $typeuser . "<br>";
        }
      
        // Tiếp tục thực hiện câu truy vấn UPDATE
        $query = "UPDATE USERS SET NAME=?, EMAIL=?, PASS=?, TYPE_USER=? WHERE ID_USER=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi",$name, $email, $password, $typeuser, $id);
        $stmt->execute();
      
        $_SESSION['response'] = "Updated Successfully!";
        $_SESSION['res_type'] = "primary";
        header('location: general1.php');
      }

	if (isset($_GET['details'])) {
		$id = $_GET['details'];
		$query = "SELECT * FROM USERS WHERE ID_USER=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$vid = $row['ID_USER'];
		$vname=$row['NAME'];
		$vemail = $row['EMAIL'];
		$vpass = $row['PASS'];
		$vtypeuser = $row['TYPE_USER'];
	}
?>