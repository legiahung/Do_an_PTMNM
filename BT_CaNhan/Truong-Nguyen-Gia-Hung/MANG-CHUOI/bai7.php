<!DOCTYPE html>
<html lang="en">

<head>
  <title>Năm âm lịch</title>
  <style>
    table {
      background-color: #66CCFF;
    }

    table th {
      background-color: #0000DD;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['nam']))
    $nam = trim($_POST['nam']);
  else $nam = 0;
  $nam_al = "";
  if (isset($_POST['tinh'])) {
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");
    $nam = $nam - 3;
    $can = $nam % 10;
    $chi = $nam % 12;
    $nam_al = $mang_can[$can];
    $nam_al = $nam_al . " " . $mang_chi[$chi];
    $hinh = $mang_hinh[$chi];
    $hinh_anh = $hinh;
  }
  ?>
  <form action="" method="post">
    <table border="0" cellpadding="0" align="center">
      <th colspan="3" style="height: 40px;">TÍNH NĂM ÂM LỊCH
      </th>
      <tr>
        <td>Năm dương lịch:</td>
        <td>    </td>
        <td>Năm âm lịch:</td>
      </tr>
      <td><input type="text" name="nam" size="10" value="<?php if (isset($_POST['nam'])) echo $nam + 3; ?>" /></td>
      <td><input type="submit" name="tinh" size="15" value="=>" style="background-color: #FFFF99; color:red" /></td>
      <td><input type="text" name="nam_al" size="15" disabled="disabled" style="background-color: #FFFF99; color:red" value="<?php echo $nam_al; ?> " /></td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <img src="12con_giap/<?php echo $hinh_anh ?>" width="120px" alt="">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>