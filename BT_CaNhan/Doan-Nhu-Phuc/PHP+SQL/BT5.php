<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    th {
      background-color:coral;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  
  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
  or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8');
  $sql =
    'select Hinh,Ten_sua,Ten_hang_sua,Ten_loai,Trong_luong,Don_gia
    from sua s 
    join loai_sua ls on s.Ma_loai_sua = ls.Ma_loai_sua 
    join hang_sua hs on s.Ma_hang_sua = hs.Ma_hang_sua';
  $result = mysqli_query($com, $sql);

  echo "<table align='center' width='30%' border='1' style='border-collapse:collapse' >";
  echo "<tr><th colspan='2' align='center'><font size='5'  color='white'><b>THÔNG TIN HÃNG SỮA</b></font></th></tr>"; 

  if (mysqli_num_rows($result) <> 0) {
    while ($rows = mysqli_fetch_row($result)) {
      echo "<tr>";
      echo "<td width='20%' height='200px' align='center'><img width='150px' src='./Hinh_sua/$rows[0]' alt=''></td>";
      echo "<td>
      <b>$rows[1]</b><br>
      Nhà sản xuất: $rows[2]<br>
      $rows[3] - $rows[4] gr - $rows[5] VNĐ</td>";
      echo "</tr>";
    }
  }
  echo "</table>";
  ?>

</body>
</html>