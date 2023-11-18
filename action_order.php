<?php
session_start();
include 'config.php';
mysqli_set_charset($conn, 'utf8mb4');

$id="";
$id_hd = "";
$firstname = "";
$lastname = "";
$tents = "";
$diachi = "";
$sdt = "";
$mota = "";
$soluong = "";
$gia = "";
$tongtien = "";
$tinhtrang = "";

$update=false;


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM CTHD WHERE ID_CTHD=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();

    header('location: order.php');
    $_SESSION['response'] = "Successfully Deleted!";
    $_SESSION['res_type'] = "danger";
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT HOADON.ID_CUS, USERS_CUS.FIRSTNAME_CUS, USERS_CUS.LASTNAME_CUS, HOADON.ID_TS,  SANPHAM.TENTS, HOADON.DIACHINHAN, HOADON.SDTNHAN,
    CTHD.ID_CTHD, CTHD.ID_HD, CTHD.SOLUONGSP, CTHD.MOTA, CTHD.TINHTRANG, CTHD.DONGIA, CTHD.TONGTIENHD
      FROM HOADON
      JOIN CTHD ON HOADON.ID_HD = CTHD.ID_HD
      JOIN USERS_CUS ON HOADON.ID_CUS = USERS_CUS.ID_CUS
      JOIN SANPHAM ON HOADON.ID_TS = SANPHAM.ID_TS  WHERE ID_CTHD=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id=$row['ID_CTHD'];
    $id_hd =$row['ID_HD'];
    $firstname =$row['FIRSTNAME_CUS'];
    $lastname =$row['LASTNAME_CUS'];
    $tents =$row['TENTS'];
    $diachi =$row['DIACHINHAN'];
    $sdt =$row['SDTNHAN'];
    $mota =$row['MOTA'];
    $soluong =$row['SOLUONGSP'];
    $gia =$row['DONGIA'];
    $tongtien =$row['TONGTIENHD'];
    $tinhtrang =$row['TINHTRANG'];

    $update=true;
}if (isset($_POST['update'])) {
    
    $id=$_POST['id'];
    $id_hd =$_POST['id_hd'];
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $tents =$_POST['tents'];
    $diachi =$_POST['diachi'];
    $sdt =$_POST['sdt'];
    $mota =$_POST['mota'];
    $soluong =$_POST['soluong'];
    $gia =$_POST['gia'];
    $tongtien =$_POST['tongtien'];
    $tinhtrang =$_POST['tinhtrang'];
  
    // Kiểm tra xem dữ liệu mới có khác với dữ liệu cũ không
    // $query_check = "SELECT HOADON.ID_CUS=? , USERS_CUS.FIRSTNAME_CUS=?, USERS_CUS.LASTNAME_CUS = ?, HOADON.ID_TS =?,  SANPHAM.TENTS = ?, HOADON.DIACHINHAN= ?, HOADON.SDTNHAN=?,
    // CTHD.ID_CTHD = ?, CTHD.ID_HD= ?, CTHD.SOLUONGSP =?, CTHD.MOTA = ?, CTHD.TINHTRANG=?, CTHD.DONGIA=?, CTHD.TONGTIENHD= ?
    //   FROM HOADON
    //   JOIN CTHD ON HOADON.ID_HD = CTHD.ID_HD
    //   JOIN USERS_CUS ON HOADON.ID_CUS = USERS_CUS.ID_CUS
    //   JOIN SANPHAM ON HOADON.ID_TS = SANPHAM.ID_TS  WHERE ID_CTHD=?";
    // $stmt_check = $conn->prepare($query_check);
    // $stmt_check->bind_param("s", $id);
    // $stmt_check->execute();
    // $result_check = $stmt_check->get_result();
    // $row_check = $result_check->fetch_assoc();
  
    // $id_old=$row_check['id'];
    // $id_hd_old =$row_check['id_hd'];
    // $firstname_old =$row_check['firstname'];
    // $lastname_old =$row_check['lastname'];
    // $tents_old=$row_check['tents'];
    // $diachi_old =$row_check['diachi'];
    // $sdt_old =$row_check['sdt'];
    // $mota_old =$row_check['mota'];
    // $soluong_old=$row_check['soluong'];
    // $gia_old =$row_check['gia'];
    // $tongtien_old =$row_check['tongtien'];
    // $tinhtrang_old =$row_check['tinhtrang'];
  
    // if ($id != $id_old || $id_hd != $id_hd_old || $firstname != $firstname_old ||
    //  $lastname != $lastname_old || $tents != $tents_old || $diachi != $diachi_old || $sdt != $sdt_old
    //  || $mota != $mota_old || $soluong != $soluong_old || $gia != $gia_old || $tongtien != $tongtien_old || $tinhtrang != $tinhtrang_old) {
    //   echo "Dữ liệu được chỉnh sửa mới:<br>";
    //   echo "ID: " . $id . "<br>";
    //   echo "ID HD: " . $id_hd . "<br>";
    //   echo "Họ: " . $firstname . "<br>";
    //   echo "Tên: " . $lastname . "<br>";
    //   echo "Tên sản phẩm: " . $tents . "<br>";
    //   echo "Địa chỉ: " . $diachi . "<br>";
    //   echo "SĐT: " . $sdt . "<br>";
    //   echo "Mô tả: " . $mota . "<br>";
    //   echo "Số lượng: " . $soluong . "<br>";
    //   echo "Gía: " . $gia . "<br>";
    //   echo "Tổng tiền: " . $tongtien . "<br>";
    //   echo "Tình trạng: " . $tinhtrang . "<br>";
    // }
  
    // Tiếp tục thực hiện câu truy vấn UPDATE

    $query = "UPDATE CTHD
    SET 
        ID_HD = ?,
        SOLUONGSP = ?,
        MOTA= ?,
        DONGIA = ?,
        TONGTIENHD = ?,
        TINHTRANG = ?
    WHERE ID_CTHD = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiiss", $id_hd, $soluong, $mota, $gia, $tongtien, $tinhtrang, $id);
    $stmt->execute();
    $_SESSION['response'] = "Updated Successfully!";
    $_SESSION['res_type'] = "primary";
    header('location: order.php');
  }

if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $query = "SELECT HOADON.ID_CUS, USERS_CUS.FIRSTNAME_CUS, USERS_CUS.LASTNAME_CUS, HOADON.ID_TS,  SANPHAM.TENTS, HOADON.DIACHINHAN, HOADON.SDTNHAN,
    CTHD.ID_CTHD, CTHD.ID_HD, CTHD.SOLUONGSP, CTHD.MOTA, CTHD.TINHTRANG, CTHD.DONGIA, CTHD.TONGTIENHD
      FROM HOADON
      JOIN CTHD ON HOADON.ID_HD = CTHD.ID_HD
      JOIN USERS_CUS ON HOADON.ID_CUS = USERS_CUS.ID_CUS
      JOIN SANPHAM ON HOADON.ID_TS = SANPHAM.ID_TS WHERE ID_CTHD=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $vid=$row['ID_CTHD'];
    $id_hd =$row['ID_HD'];
    $firstname =$row['FIRSTNAME_CUS'];
    $lastname =$row['LASTNAME_CUS'];
    $tents =$row['TENTS'];
    $diachi =$row['DIACHINHAN'];
    $sdt =$row['SDTNHAN'];
    $mota =$row['MOTA'];
    $soluong =$row['SOLUONGSP'];
    $gia =$row['DONGIA'];
    $tongtien =$row['TONGTIENHD'];
    $tinhtrang =$row['TINHTRANG'];
}
?>
