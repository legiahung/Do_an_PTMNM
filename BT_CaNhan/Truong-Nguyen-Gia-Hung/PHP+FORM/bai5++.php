<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tính tiền Karaoke</title>
</head>
<body>
<?php
    if (isset($_POST['submit'])) {
        $bd = $_POST['batdau'];
        $kt = $_POST['ketthuc'];

        // Chuyển giờ bắt đầu và giờ kết thúc thành định dạng HH:MM AM/PM
        $bd_formatted = date("h:i A", strtotime($bd));
        $kt_formatted = date("h:i A", strtotime($kt));

        // Chuyển đổi giờ bắt đầu và giờ kết thúc sang định dạng phút
        $bd_minutes = strtotime($bd);
        $kt_minutes = strtotime($kt);

        if ($bd_minutes !== false && $kt_minutes !== false) {
            if ($kt_minutes > $bd_minutes) {
                $duration_hours = ($kt_minutes - $bd_minutes) / 3600; // Đổi ra giờ
                $dongia_1 = 20000; // 10:00 AM - 12:00 PM
                $dongia_2 = 45000; // 12:00 PM - 05:00 PM
                
                // Kiểm tra nếu thời gian bắt đầu nằm ngoài khoảng 10:00 AM - 12:00 PM
                if ($bd_minutes < strtotime('10:00 AM')) {
                    $bd_minutes = strtotime('10:00 AM'); // Bắt đầu từ 10:00 AM
                }
                
                // Kiểm tra nếu thời gian kết thúc nằm ngoài khoảng 10:00 AM - 12:00 PM
                if ($kt_minutes > strtotime('12:00 PM')) {
                    $kt_minutes = strtotime('12:00 PM'); // Kết thúc lúc 12:00 PM
                }

                $duration_hours = ($kt_minutes - $bd_minutes) / 3600; // Cập nhật lại thời gian
                
                // Tính giá tiền dựa trên khoảng thời gian
                if ($bd_minutes >= strtotime('12:00 PM') || $kt_minutes <= strtotime('10:00 AM')) {
                    $ket_qua = 0;
                    $mgs = "Đang giờ nghỉ "; // Nếu sau 12:00 PM hoặc trước 10:00 AM thì giá tiền là 0
                } elseif ($kt_minutes <= strtotime('12:00 PM')) {
                    $ket_qua = $duration_hours * $dongia_1;
                } elseif ($kt_minutes <= strtotime('05:00 PM')) {
                    $ket_qua = $duration_hours * $dongia_2;
                }
                
                // Làm tròn kết quả thành 2 chữ số thập phân
                $ket_qua = number_format($ket_qua, 0);
            } else {
                $mgs = "Giờ kết thúc phải lớn hơn giờ bắt đầu.";
            }
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

<form action="" method="post">
    <table align="center" bgcolor="#33FFFF">
        <tr>
            <td colspan="2" bgcolor="#6600FF"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu: </td>
            <td> <input type="time" name="batdau" style="width: 160px" value="<?php if (isset($bd)) echo $bd;?>">(hh:mm)</td>
        </tr>
        <tr>
            <td>Giờ kết thúc: </td>
            <td> <input type="time" name="ketthuc" style="width: 160px" value="<?php if (isset($kt)) echo $kt;?>">(hh:mm)</td>
        </tr>
        <tr>
            <td>Tiền thanh toán: </td>
            <td> <input type="text" name="thanhtoan" style="background-color: #FFFF00; width: 157px" readonly value="<?php if (isset($ket_qua)) echo $ket_qua;?>">(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" style="width: 85px" value="Tính tiền">
                <input type="submit" name="reset" style="width: 85px" value="Nhập lại">
            </td>
            
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
    </table>
</form>

</body>
</html>
