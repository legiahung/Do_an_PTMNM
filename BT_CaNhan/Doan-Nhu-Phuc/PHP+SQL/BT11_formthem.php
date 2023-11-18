<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sữa mới</title>
  <style>
    table {
      background: lightgreen;

    }

    td {
      padding: 6px;
    }
  </style>
</head>

<body>
  <?php
  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8');
  $Loai_sua = mysqli_query($com, 'select Ma_loai_sua,Ten_loai FROM loai_sua');
  $Hang_sua = mysqli_query($com, 'select Ma_hang_sua,Ten_hang_sua FROM hang_sua');
  ?>
  <form action="BT11_xuli.php" method="post" enctype="multipart/form-data">
    <table style="width: 50%;" align="center">
      <tr>
        <th colspan="2" align="center" bgcolor="green" style="color: white;">
          <div style="padding: 20px; font-size: 20px;">THÊM SỮA MỚI</div>
        </th>
      </tr>
      <tr>
        <td>Mã sữa: </td>
        <td>
          <input type="text" name="ma_sua" id="">
        </td>
      </tr>
      <tr>
        <td>Tên sữa: </td>
        <td>
          <input type="text" name="ten_sua" id="">
        </td>
      </tr>
      <tr>
        <td>Hãng sữa: </td>
        <td>
          <select name="hang_sua">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($Hang_sua)) {
              echo "<option value = '{$row['Ma_hang_sua']}'>{$row['Ten_hang_sua']}</option>";
              $i += 1;
            }
            ?>
        </td>
      </tr>
      <tr>
        <td>Loại sữa: </td>
        <td>
          <select name="loai_sua">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($Loai_sua)) {
              echo "<option value = '{$row['Ma_loai_sua']}'>{$row['Ten_loai']}</option>";
              $i += 1;
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Trọng lượng: </td>
        <td>
          <input type="text" name="trong_luong"> (gr hoặc ml)
        </td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td>
          <input type="text" name="don_gia"> (VNĐ)
        </td>
      </tr>
      <tr>
        <td style="display: block;">Thành phần dinh dưỡng: </td>
        <td>
          <textarea name="thanh_phan" id="" cols="30" rows="3" style="overflow: auto;"></textarea>
        </td>
      </tr>
      <tr>
        <td style="display: block;">Lợi ích: </td>
        <td>
          <textarea name="loi_ich" id="" cols="30" rows="3" style="overflow: auto;"></textarea>
        </td>
      </tr>
      <tr>
        <td>Hình ảnh: </td>
        <td>
          <input type="file" name="hinh_anh">
        </td>
      </tr>
      <tr>
        <td align="center" colspan="2">
          <input name="them" type="submit" value="Thêm mới">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>