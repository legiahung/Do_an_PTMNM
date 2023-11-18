<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
$query = 'SELECT * FROM hang_sua';
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bảng dữ liệu khách hàng</title>
    <style>
        table {
            border: 1px solid black;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h2 align="center" >Thông tin hãng sữa</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Mã hãng sửa</th>
            <th>Tên hãng sửa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) != 0) {
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $stt++ . "</td>";
                echo "<td>" . $row['Ma_hang_sua'] . "</td>";
                echo "<td>" . $row['Ten_hang_sua'] . "</td>";
                echo "<td>" . $row['Dia_chi'] . "</td>";
                echo "<td>" . $row['Dien_thoai'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
<?php
mysqli_close($conn);
?>