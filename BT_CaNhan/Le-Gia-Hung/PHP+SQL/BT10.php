<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Thông tin sữa</title>
  <style>
    a {
      text-decoration: none;
      color: darkseagreen;
      padding: 0 10px;
    }

    a:hover {
      color: darkgreen;
    }
  </style>
</head>

<body>
  <?php
  $ten_sua = "";
  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8'); //số mẩu tin trên mỗi trang, giả sử là 10
  $Loai_sua = mysqli_query($com, 'select Ten_loai FROM loai_sua');
  $Hang_sua = mysqli_query($com, 'select Ten_hang_sua FROM hang_sua');
  if (isset($_REQUEST['tim']) && !empty(addslashes($_GET['ten_sua']))) {
    $ten_sua = addslashes($_GET['ten_sua']) ;
    $loai_sua = $_GET['loai_sua'];
    $hang_sua = $_GET['hang_sua'];
    $sql =
    "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, ls.Ten_loai
    FROM sua s
    JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua
    JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua 
    WHERE Ten_sua LIKE '%$ten_sua%'
    AND ls.Ten_loai = '$loai_sua'
    AND hs.Ten_hang_sua = '$hang_sua'";
  } else {
    $sql =
    "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
    FROM sua s
    JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua";
  }
  //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
  $result = mysqli_query($com, $sql);
  ?>
  <p align='center'>
    <font color='green' face='Verdana, Geneva, sans-serif' size='5'>
      <b>TÌM KIẾM THÔNG TIN SỮA</b>
    </font>
  </p>
  <table align='center' width='800px' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
    <tr bgcolor='lightgreen'>
      <td colspan='2' align='center'>
        <form action='' methoh='get' style='margin:10px;'>
          <label>Loại sữa:</label>
          <select name="loai_sua">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($Loai_sua)) {
              echo "<option value = '{$row['Ten_loai']}'>{$row['Ten_loai']}</option>";
              $i += 1;
            }
            ?>
          </select> &emsp;
          <label>Hãng sữa: </label>
          <select name="hang_sua">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($Hang_sua)) {
              echo "<option value = '{$row['Ten_hang_sua']}'>{$row['Ten_hang_sua']}</option>";
              $i += 1;
            }
            ?>
          </select>
          <br>
          <br>
          <label>Tên sữa: </label>
          <input type='text' name='ten_sua' placeholder='Nhập từ khóa cần tìm' value="<?php if (isset($_GET['ten_sua'])) {
                                                                                        echo $_GET['ten_sua'];
                                                                                      } ?>">
          <input type='submit' name='tim' value='Tìm kiếm' style="background: limegreen; cursor: pointer;">
        </form>
        <?php
        if ($ten_sua != "")
          echo "Có " . mysqli_num_rows($result) . " sản phẩm được tìm thấy";
        else
          echo "";
        ?>
      </td>
    </tr>
    <?php
    if (mysqli_num_rows($result) <> 0) {
      $n = 0;
      while ($rows = mysqli_fetch_row($result)) {
        echo "<tr bgcolor='lightgreen'>
                <th style = 'color: green' colspan='2'><h2>$rows[0] - $rows[1]</h2></th>
            </tr>
            <tr>
              <td style = 'width: 200px'>
                <img src='./Hinh_sua/$rows[2] ' width= 200px height= 270px/>
              </td>
              <td>
                <div>
                  <b>Thành phần dinh dưỡng:</b>
                  <p>$rows[3]</p>
                  <b>Lợi ích:</b>
                  <p>$rows[4]</p>
                  <p><b>Trọng lượng:</b> <b style='color:green;'>$rows[5] gr</b> - <b>Đơn giá:</b> <b style='color:green;'>$rows[6] VNĐ</b></p>
                </div>
              </td>
            </tr>
        ";
        $n++;
        if ($n % 2 == 0)
          echo "<tr></tr>";
      } //while
    }
    echo "</table>";
    ?>

</html>