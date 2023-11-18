<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <title>Tính tiền Karaoke</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            $bd = $_POST['batdau'];
            $kt = $_POST['ketthuc'];
            if (is_numeric($bd) && is_numeric($kt)) {
                if ($kt > $bd) {
                    $duration = $kt - $bd;
                    $dongia_1 = 20000; // 10:00 - 17:00
                    $dongia_2 = 45000; // 17:00 - 24:00
                    if ($kt <= 17) {
                        $ket_qua = $duration * $dongia_1;
                    } elseif ($bd >= 17) {
                        $ket_qua = $duration * $dongia_2;
                    } else {
                        $so_gio_1 = 17 - $bd;
                        $so_gio_2 = $duration - $so_gio_1;
                        $ket_qua = ($so_gio_1 * $dongia_1) + ($so_gio_2 * $dongia_2);
                    }
                } else {
                    $mgs = "Giờ kết thúc phải lớn hơn giờ bắt đầu.";
                }
            } else {
                $mgs = "Giờ bắt đầu và giờ kết thúc phải là số.";
            }
        }
    ?>
<form action="(bai5)Karaoke.php" method="post">
    <table align="center" bgcolor="#66CC99">
        <tr>
            <td colspan="2" bgcolor="#009933"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu: </td>
            <td> <input type="text" name="batdau" value="<?php if (isset($bd)) echo $bd;?>">(h)</td>
        </tr>
        <tr>
            <td>Giờ kết thúc: </td>
            <td> <input type="text" name="ketthuc" value="<?php if (isset($kt)) echo $kt;?>">(h)</td>
        </tr>
        <tr>
            <td>Tiền thanh toán: </td>
            <td> <input type="text" name="thanhtoan" style="background-color: lightyellow" readonly value="<?php if (isset($ket_qua)) echo $ket_qua;?>">(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính tiền">
            </td>
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
    </table>
</form>

</body>
</html>