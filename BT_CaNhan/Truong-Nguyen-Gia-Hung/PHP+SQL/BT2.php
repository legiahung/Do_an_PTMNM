<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly_ban_sua";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
$query = 'SELECT * FROM khach_hang';
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bảng dữ liệu khách hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #FFCC99;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 align="center" >Thông tin khách hàng</h2>
    <table>
        <tr style="color: red;">
            <th>STT</th>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
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
                echo "<td>" . $row['Ma_khach_hang'] . "</td>";
                echo "<td>" . $row['Ten_khach_hang'] . "</td>";
                echo "<td class='center'>" . $row['Phai']  . "</td>";
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