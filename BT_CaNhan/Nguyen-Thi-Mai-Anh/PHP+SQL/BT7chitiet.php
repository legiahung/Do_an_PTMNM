<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết</title>
</head>

<body>
  <?php
  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
  or die('Could not connect to MySQL: ' . mysqli_connect_error());
  $Ma_sua = isset($_GET['maSua']) ? $_GET['maSua'] : '';

  $sql = 
  "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia 
  FROM sua s 
  JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
  WHERE Ma_sua = '$Ma_sua'";
  $result = mysqli_query($com, $sql);

  echo "<div>
          <table border = 1 align='center' style = 'width: 600px'>";
  $row = mysqli_fetch_array($result);
  echo "<tr bgcolor='lightgreen'>
                    <th style = 'color: green' colspan='2'><h2>$row[0] - $row[1]</h2></th>
                </tr>
                <tr>
                    <td style = 'width: 200px'><img src='./Hinh_sua/$row[2] ' width= 200px height= 270/></td>
                    <td>
                        <div>
                            <b>Thành phần dinh dưỡng:</b>
                            <p>$row[3]</p>
                            <b>Lợi ích:</b>
                            <p>$row[4]</p>
                            <p style = 'text-align: right'><b>Trọng lượng:</b>$row[5] gr  -  <b>Đơn giá:</b>$row[6]</p>
                        </div>
                    </td>
                </tr>
                <tr>
                  <td><a href='BT7.php'>Quay lại</a></td>
                  <td></td>
                </tr>
            </table>
        </div>
        ";
  ?>

</body>

</html>