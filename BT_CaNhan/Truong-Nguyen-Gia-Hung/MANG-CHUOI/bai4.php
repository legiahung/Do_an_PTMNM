<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mảng tìm kiếm thay thế</title>
  <style type="text/css">
    table {
      background-color: #D1EEEE;
    }

    table th {
      background-color: mediumseagreen;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  function tim_kiem($arr, $so)
  {
    for ($i = 0; $i < count($arr); $i++) {
      if ($arr[$i] == $so) {
        return $i;
      }
    }
    return -1;
  }
  $str = "";
  $str_kq = "";
  $ketqua = "";
  if (isset($_POST['so'])) {
    $so = $_POST['so'];
  }
  if (isset($_POST['so']) && isset($_POST['tinh'])) {
    $str = $_POST['mang'];
    $arr = explode(",", $str);
    $str_kq = implode(",", $arr);
    $vitri = tim_kiem($arr, $so);
    if ($vitri != -1) {
        ++$vitri;
      $ketqua = "Tìm thấy " . $so . " tại vị trí thứ " . $vitri . " của mảng.";
    } else {
      $ketqua = "Không tìm thấy " . $so . " trong mảng.";
    }
  }
  ?>
  <form action="" method="post">
    <table border="0" cellpadding="0" align="center">
      <th colspan="2" style="height: 40px; background-color: #008B8B">
        TÌM KIẾM
      </th>
      <tr>
        <td>Nhập mảng:</td>
        <td><input type="text" name="mang" size="70" value="<?php echo $str; ?> " /></td>
      </tr>
      <tr>
        <td>Nhập số cần tìm:</td>
        <td><input type="text" name="so" size="20" value="<?php if (isset($_POST['so'])) echo $_POST['so']; ?> " /></td>
      </tr>
      <tr>
        <td></td>
        <td><input style="background-color: #00BFFF;" type="submit" name="tinh" size="20" value="   Tìm kiếm  " /></td>
      </tr>
      <tr>
        <td>Mảng:</td>
        <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo $str_kq; ?> " /></td>
      </tr>
      <td>Kết quả tìm kiếm:</td>
      <td><input type="text" name="kq" size="70" disabled="disabled" value="<?php echo $ketqua; ?> " /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" style="background-color: #7AC5CD;"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
      </tr>
    </table>
  </form>
</body>

</html>