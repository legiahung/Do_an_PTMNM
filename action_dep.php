<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn, 'utf8mb4');
	$id_dep = "";
	$tenphongban = "";
	
	$update = false;
	
	if (isset($_POST['add'])) {
		if (isset($_POST['id_dep']) && isset($_POST['tenphongban'])) {
			$id_dep = $_POST['id_dep'];
			$tenphongban = $_POST['tenphongban'];
	
			$query = "INSERT INTO DEPARTMENT (ID_DEP, NAME_DEP) VALUES (?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("ss", $id_dep, $tenphongban);
			$stmt->execute();
	
			$_SESSION['response'] = "Successfully Inserted to the database!";
			$_SESSION['res_type'] = "success";
			header('location: department.php');
			exit();
		} else {
			// Xử lý khi dữ liệu không đủ
			$_SESSION['response'] = "Please provide both ID and Department Name!";
			$_SESSION['res_type'] = "danger";
			header('location: department.php');
			exit();
		}
	}
	if (isset($_GET['delete'])) {
		$id_dep = $_GET['delete'];

		$query = "DELETE FROM DEPARTMENT WHERE ID_DEP=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_dep);
		$stmt->execute();

		header('location: department.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";

	}
	if (isset($_GET['edit'])) {
		$id_dep = $_GET['edit'];
	
		$query = "SELECT * FROM DEPARTMENT WHERE ID_DEP=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_dep);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
	
		$id_dep = $row['ID_DEP'];
		$tenphongban = $row['NAME_DEP'];
	
		$update = true;
	}
	if (isset($_POST['update'])) {

		$id_dep = $_POST['id_dep'];
		$tenphongban = $_POST['tenphongban'];
	
		// Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
		$query_check = "SELECT * FROM DEPARTMENT WHERE ID_DEP=?";
		$stmt_check = $conn->prepare($query_check);
		$stmt_check->bind_param("s", $id_dep);
		$stmt_check->execute();
		$result_check = $stmt_check->get_result();
		$row_check = $result_check->fetch_assoc();
	
		$id_old = $row_check['id_dep'];
		$tenphongban_old = $row_check['tenphongban'];
	
		if ($id_dep != $id_old || $tenphongban != $tenphongban_old) {
			echo "Dữ liệu được chỉnh sửa mới:<br>";
			echo "ID : " . $id_dep . "<br>";
			echo "Tên phòng ban: " . $tenphongban . "<br>";
		}
	
		// Tiếp tục thực hiện câu truy vấn UPDATE
		$query = "UPDATE DEPARTMENT SET NAME_DEP=? WHERE ID_DEP=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $tenphongban, $id_dep);
		$stmt->execute();
	
		$_SESSION['response'] = "Updated Successfully!";
		$_SESSION['res_type'] = "primary";
		header('location: department.php');
	}
	
	if (isset($_GET['delete'])) {
		$id_dep = $_GET['delete'];
	
		$query = "DELETE FROM DEPARTMENT WHERE ID_DEP=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_dep);
		$stmt->execute();
	
		header('location: department.php');
		$_SESSION['response'] = "Successfully Deleted!";
		$_SESSION['res_type'] = "danger";
	}
	
	if (isset($_GET['details'])) {
		$id_dep = $_GET['details'];
		$query = "SELECT * FROM DEPARTMENT WHERE ID_DEP=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $id_dep);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
	
		$vid = $row['ID_DEP'];
		$vtenphongban = $row['NAME_DEP'];
	}
?>