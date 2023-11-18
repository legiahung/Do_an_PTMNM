<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mảng số nguyên</title>
</head>

<body>
  <?php
  //a.tạo mảng có n phần tử, các phần tử có giá trị [-100,200]
  if (isset($_POST['n'])) $n = $_POST['n'];
  else $n = 0;
  $ketqua = "";
  if (isset($_POST['hthi'])) {
    $arr = array();
    for ($i = 0; $i < $n; $i++) {
      $x = rand(-100, 0);
      $arr[$i] = $x;
    }
    //-- In ra mảng vừa tạo
    $ketqua = "Mảng được tạo là:" . implode(" ", $arr) . "&#13;&#10;";
    //b.Tìm và in ra các số dương chẵn trong mảng dùng hàm foreach
    $count = 0;
    foreach ($arr as $v) {
      if ($v % 2 == 0)

        $count++;
    }
    $ketqua .= "Có $count số chẵn trong mảng" . "&#13;&#10;";
    //c.Đếm xem có bao nhiêu thành phần trong mảng có giá trị là số nhỏ hơn 100
    $count = 0;
    foreach ($arr as $v) {
      if ($v < 100)
        $count++;
    }
    $ketqua .= "Có $count số nhỏ hơn 100 trong mảng" . "&#13;&#10";
    //d. Tính tổng của các thành phần trong mảng giá trị là số âm.
    $Sum = 0;
    foreach ($arr as $v) {
      if ($v < 0)
        $Sum = $Sum + $v;
    }
    $ketqua .= "Tổng giá trị các số âm trong mảng là $Sum" . "&#13;&#10";
    //g.Tìm và in ra các số <n có chữ số cuối là số lẻ
    $targetValue=0;
    $viTri = array_search($targetValue,$arr);
    if($viTri !== false){
        ++$viTri;
        $ketqua.= "Phần tử có giá trị bằng 0 tại vị trí $viTri trong mảng." . "&#13;&#10";
    }
    else{
        $ketqua.="Không có giá trị nào bằng 0." . "&#13;&#10";
    }
    //f- Sắp xếp các số đó theo thứ tự tăng dần rồi lại in ra màn hình.
    $temp;
    $daySo = "";
    for ($i = 0; $i < count($arr); $i++) {
      for ($j = $i + 1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {
          $temp = $arr[$i];
          $arr[$i] = $arr[$j];
          $arr[$j] = $temp;
        }
      }
    }
    // -- in ra màn hình
    $ketqua .= "Dãy số ban đầu được sắp tăng dần là: ";
    for ($i = 0; $i < count($arr); $i++) {
      $daySo .= "$arr[$i]  ";
    }
    $ketqua .= $daySo . "&#13;&#10";
    
  }
  ?>
  <form action="" method="post">
    Nhập n: <input type="text" name="n" value="<?php echo $n ?>" />
    <input type="submit" name="hthi" value="Xử lý" /><br>
    Kết quả: <br>
    <textarea cols="70" rows="10" name="ketqua"><?php echo $ketqua ?>
	</textarea>
  </form>
</body>

</html>