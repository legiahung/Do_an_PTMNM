<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $dongia=2000;
    if(isset($_POST['submit'])){
        $name = $_POST['chuho'];
        $oldnb = $_POST['socu'];
        $newnb = $_POST['somoi'];
        if(is_numeric($oldnb) and is_numeric($newnb))
            if($oldnb<$newnb){
                $thanhToan = ($newnb - $oldnb)*$dongia; 
            }
            else $mgs="Chỉ số cũ phải nhỏ hơn chỉ số mới!";
        else $mgs="Chỉ số cũ và chỉ số mới phải là số và không được để trống";
    }
    ?>
    <form action="" method="post">
        <table align="center" bgcolor="faebd7">
            <tr>
                <td colspan="2" bgcolor="orange">THANH TOÁN TIỀN ĐIỆN</td>
            </tr>
            <tr>
                <td>Tên chủ hộ</td>
                <td><input type="text" id="chuho" name="chuho" style="width:200px"
                value="<?php if (isset($name)) echo $name;?>"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ</td>
                <td><input type="text" id="socu" name="socu" style="width:200px"
                value="<?php if (isset($oldnb)) echo $oldnb;?>"><b>(kw)</b></td>
            </tr>
            <tr>
                <td>Chỉ số mới</td>
                <td><input type="text" id="somoi" name="somoi" style="width:200px"
                value="<?php if (isset($newnb)) echo $newnb;?>"><b>(kw)</b></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" id="dongia" name="dongia" style="width:200px"
                value="<?php if (isset($dongia)) echo $dongia;?>"><b>(VND)</b></td>
            </tr>
                <tr><td>Số tiền thanh toán</td>
                <td><input type="text" id="thanhtoan" name="thanhtoan" style="background-color: lightpink; width:200px"
                value="<?php if (isset($thanhToan)) echo $thanhToan;?>" readonly><b>(VND)</b></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit" name="submit">Tính</button></td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
            </tr>
        </table>
    </form>
</body>
</html>