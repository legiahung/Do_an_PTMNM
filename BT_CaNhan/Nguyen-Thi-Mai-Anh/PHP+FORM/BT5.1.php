<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $start = $_POST['giobd'];
        $finish = $_POST['giokt'];
        if (is_numeric($start) && is_numeric($finish)) {
            if ($finish > $start) {
                $giosudung = $finish - $start;
    
                $dongia_1 = 20000; 
                $dongia_2 = 45000; 

                if ($finish <= 17) {
                    $tt = $giosudung * $dongia_1;
                } elseif ($start >= 17) {
                    $tt = $giosudung * $dongia_2;
                } else {
                    $so_gio_1 = 17 - $start;
                    $so_gio_2 = $giosudung - $so_gio_1;
                    $tt = ($so_gio_1 * $dongia_1) + ($so_gio_2 * $dongia_2);
                }
            } else {
                $mgs = "Giờ kết thúc phải lớn hơn giờ bắt đầu.";
            }
        } else {
            $mgs = "Giờ bắt đầu và giờ kết thúc phải là số.";
        }
    }
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#40E0D0">
        <tr>
            <td colspan="2" bgcolor="#00868B"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu: </td>
            <td> <input type="text" name="giobd" value="<?php if (isset($start)) echo $start;?>"><b>(h)</b></td>
        </tr>
        <tr>
            <td>Giờ kết thúc: </td>
            <td> <input type="text" name="giokt" value="<?php if (isset($finish)) echo $finish;?>"><b>(h)</b></td>
        </tr>
        <tr>
            <td>Tiền thanh toán: </td>
            <td> <input type="text" name="tt" style="background-color:lightyellow" readonly
                        value="<?php if (isset($tt)) echo $tt;echo "";?>"><b>(VNĐ)</b>
            </td>
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