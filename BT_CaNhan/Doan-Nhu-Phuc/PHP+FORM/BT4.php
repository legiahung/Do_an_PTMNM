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
            $math = $_POST['toan'];
            $phy = $_POST['ly'];
            $che = $_POST['hoa'];
            $dc = $_POST['diemchuan'];
            $tong = $math + $phy + $che;
            if(is_numeric($math) and is_numeric($phy) and is_numeric($che))
                if ($math >0 && $phy > 0 && $che > 0 && $tong >= $dc) 
                    $ket_qua = "Đậu";
                else $ket_qua = "Rớt";               
            else $mgs="Điểm toán lý hóa phải là số dương";
        }
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#FFCCFF">
        <tr>
            <td colspan="2" bgcolor="#FF0099"><h1>KẾT QUẢ THI ĐẠI HỌC</h1></td>
        </tr>
        <tr>
            <td>Toán: </td>
            <td> <input type="text" name="toan" value="<?php if (isset($math)) echo $math;?>"></td>
        </tr>
        <tr>
            <td>Lý: </td>
            <td> <input type="text" name="ly" value="<?php if (isset($phy)) echo $phy;?>"></td>
        </tr>
        <tr>
            <td>Hóa: </td>
            <td> <input type="text" name="hoa" value="<?php if (isset($che)) echo $che;?>"></td>
        </tr>
        <tr>
            <td>Điểm chuẩn: </td>
            <td> <input type="text" name="diemchuan" style="color: red;" value="<?php if (isset($dc)) echo $dc;?>"></td>
        </tr>
        <tr>
            <td>Tổng điểm: </td>
            <td> <input type="text" name="tong"readonly value="<?php if (isset($tong)) echo $tong;?>"></td>
        </tr>
        <tr>
            <td>Kết quả thi: </td>
            <td> <input type="text" name="kq" readonly value="<?php if (isset($ket_qua)) echo $ket_qua;?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Xem kết quả">
            </td>
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
    </table>
</form>

</body>
</html>