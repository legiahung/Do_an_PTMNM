<?php
	const DBHOST = 'localhost';
	const DBUSER = 'root';
	const DBPASS = '';
	const DBNAME = 'quanly_ban_sua';
	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	mysqli_set_charset($conn, 'utf8');
	// if ($conn->connect_errno) {
	//     die("Connection failed: " . $conn->connect_error);
	// } else {
	//     echo "-->thanh cong";
	// }
	$query = 'SELECT * FROM sua';
	$result = mysqli_query($conn, $query);;
?>
