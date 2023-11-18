<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <?php
        $dc=20;
        if(isset($_POST['submit'])){
            $toan = $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $dc = $_POST['diemchuan'];
            if(is_numeric($toan) && $toan > 0 && $toan <= 10 &&
            is_numeric($ly) && $ly > 0 && $ly <= 10 &&
            is_numeric($hoa) && $hoa > 0 && $hoa <= 10){
                $tongDiem = $toan + $ly +$hoa;
                if ($toan != 0 && $ly != 0 && $hoa != 0 && $tongDiem >= $dc) 
                    $ketqua = "Đậu";
                else $ketqua = "Rớt";
            }
            else $mgs="Điểm toán lý hóa phải là số hoặc nhập sai giá trị ";
        }
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#FFCCFF">
        <tr>
            <td colspan="2" bgcolor="#FF0099"><h1>KẾT QUẢ THI ĐẠI HỌC</h1></td>
        </tr>
        <tr>
            <td>Toán: </td>
            <td> <input type="text" name="toan" value="<?php if (isset($t)) echo $t;?>"></td>
        </tr>
        <tr>
            <td>Lý: </td>
            <td> <input type="text" name="ly" value="<?php if (isset($l)) echo $l;?>"></td>
        </tr>
        <tr>
            <td>Hóa: </td>
            <td> <input type="text" name="hoa" value="<?php if (isset($h)) echo $h;?>"></td>
        </tr>
        <tr>
            <td>Điểm chuẩn: </td>
            <td> <input type="text" name="diemchuan" style="color: red;" value="<?php if (isset($dc)) echo $dc;?>"></td>
        </tr>
        <tr>
            <td>Tổng điểm: </td>
            <td> <input type="text" name="tongdiem"readonly style="background-color: #FFFFCC;" value="<?php if (isset($tongDiem)) echo $tongDiem;?>"></td>
        </tr>
        <tr>
            <td>Kết quả thi: </td>
            <td> <input type="text" name="ketqua" readonly style="background-color: #FFFFCC;" value="<?php if (isset($ketqua)) echo $ketqua;?>"></td>
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