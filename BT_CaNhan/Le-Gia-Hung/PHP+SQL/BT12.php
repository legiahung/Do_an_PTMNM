<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Thông tin khách hàng</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    table {
      text-align: center;
    }

    th {
      color: green;
    }

    tr:nth-child(even) {
      background-color: lightgreen;
    }
  </style>

</head>

<body>
  <?php
  // Ket noi CSDL

  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
  $sql = 'select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai,Email from khach_hang';
  $result = mysqli_query($com, $sql);
  //  $nam = <img src="./" alt="">;
  // $nu = ur
  echo "<p align='center'><font size='5' color='green'><b>THÔNG TIN KHÁCH HÀNG</b></font></P>";
  echo "<table align='center' width='90%'  cellpadding='2' cellspacing='2' class='table-bordered' style='border-collapse:collapse'>";
  echo '<tr>
    <th width="50">Mã khách hàng</th>
    <th width="150">Tên khách hàng</th>
    <th width="200">Giới tính</th>
    <th width="200">Địa chỉ</th>
    <th width="200">Điện thoại</th>
    <th width="200">Email</th>
    <th width="20">Sửa</th>
    <th width="20">Xóa</th>
</tr>';
  if (mysqli_num_rows($result) <> 0) {
    while ($rows = mysqli_fetch_row($result)) {
      if ($rows[2] == 1) {
        $rows[2] = "Nữ";
      } else
        $rows[2] = "Nam";
      echo "<tr>";
      echo "<td>$rows[0]</td>";
      echo "<td>$rows[1]</td>";
      echo "<td>$rows[2]</td>";
      echo "<td>$rows[3]</td>";
      echo "<td>0$rows[4]</td>";
      echo "<td>$rows[5]</td>";
      echo "<td>
              <a href='suakhachhang.php?maKH=$rows[0]' class='btn btn-primary'>
                <i class='fa-solid fa-pen-to-square'></i>
              </a>
            </td>";
      echo "<td>
              <a href='xoakhachhang.php?maKH=$rows[0]' class='btn btn-danger'>
                <i class='fa-solid fa-trash'></i>
              </a>
            </td>";
      echo "</tr>";
    }
  }
  echo "</table>";
  ?>
</body>

</html>