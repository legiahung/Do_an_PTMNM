<?php
  $com = mysqli_connect('localhost', 'root', '', 'quanly_ban_sua')
    or die('Could not connect to MySQL: ' . mysqli_connect_error());
  mysqli_set_charset($com, 'UTF8');
  $Loai_sua = mysqli_query($com, 'select Ten_loai FROM loai_sua');
  $Hang_sua = mysqli_query($com, 'select Ten_hang_sua FROM hang_sua');
  if (isset($_POST['them'])) {
    $ma_sua=$_POST['ma_sua'];
    $ten_sua=$_POST['ten_sua'];
    $hang_sua=$_POST['hang_sua'];
    $loai_sua=$_POST['loai_sua'];
    $trong_luong=$_POST['trong_luong'];
    $don_gia=$_POST['don_gia'];
    $thanh_phan=$_POST['thanh_phan'];
    $loi_ich=$_POST['loi_ich'];
    if ($_FILES['hinh_anh']['name'] != NULL) {
      $hinh_anh = $_FILES["hinh_anh"]["name"];
    } else echo "Vui lòng chọn file upload!";
  }
  $sql = "INSERT INTO sua (Ma_sua,Ten_sua,Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh) 
          VALUES ('$ma_sua','$ten_sua','$hang_sua','$loai_sua','$trong_luong','$don_gia','$thanh_phan','$loi_ich','$hinh_anh')";
  if (mysqli_query($com,$sql))
  {
    echo "Thêm thành công!";
    header('location: BT11.php');
  }
  else {//Lỗi
    $result = "Lỗi thêm mới" .mysqli_error($com);
  }
  ?>