<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tính tiền Karaoke</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $bd = $_POST['batdau'];
    $kt = $_POST['ketthuc'];

    
    $bd_formatted = date("h:i A", strtotime($bd));
    $kt_formatted = date("h:i A", strtotime($kt));

    // Chuyển đổi giờ bắt đầu và giờ kết thúc sang định dạng phút
    $bd_minutes = strtotime($bd);
    $kt_minutes = strtotime($kt);

    if ($bd_minutes !== false && $kt_minutes !== false) {
    
        $ket_qua = 0;
        $mgs = "";

        $duration_hours = ($kt_minutes - $bd_minutes) / 3600;

     
        $dongia_1 = 20000; 
        $dongia_2 = 45000; 

        if ($bd_minutes >= strtotime('12:00 PM') || $kt_minutes <= strtotime('10:00 AM')) {
   
            $ket_qua = 0;
            $mgs = "Đang giờ nghỉ";
        } else {
            if ($bd_minutes < strtotime('10:00 AM')) {
                $bd_minutes = strtotime('10:00 AM');
            }
            if ($kt_minutes > strtotime('12:00 PM')) {
                $kt_minutes = strtotime('12:00 PM'); 
            }
            $duration_hours = ($kt_minutes - $bd_minutes) / 3600; 

            if ($kt_minutes <= strtotime('12:00 PM')) {
                $ket_qua = $duration_hours * $dongia_1;
            } elseif ($kt_minutes <= strtotime('05:00 PM')) {
                $ket_qua = $duration_hours * $dongia_2;
            }
        }

        // Làm tròn kết quả thành 2 chữ số thập phân
        $ket_qua = number_format($ket_qua, 2);
    } else {
        $mgs = "Giờ bắt đầu và giờ kết thúc không hợp lệ.";
    }

    if (isset($_POST['reset'])) {
        $bd = "";
        $kt = "";
        $ket_qua = "";
        $mgs = "";
    }
}
?>

<form action="karaoke.php" method="post">
    <table align="center" bgcolor="#FFD6E4">
        <tr>
            <td colspan="2" bgcolor="#E21033"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu: </td>
            <td> <input type="time" name="batdau" style="width: 150px" value="<?php if (isset($bd)) echo $bd;?>">(hh:mm)</td>
        </tr>
        <tr>
            <td>Giờ kết thúc: </td>
            <td> <input type="time" name="ketthuc" style="width: 150px" value="<?php if (isset($kt)) echo $kt;?>">(hh:mm)</td>
        </tr>
        <tr>
            <td>Tiền thanh toán: </td>
            <td> <input type="text" name="thanhtoan" style="background-color: yellow; width: 150px;" readonly value="<?php if (isset($ket_qua)) echo $ket_qua;?>">(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính tiền">
                <input type="submit" name="reset" value="Nhập lại">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
        </tr>
    </table>
</form>

</body>
</html>


