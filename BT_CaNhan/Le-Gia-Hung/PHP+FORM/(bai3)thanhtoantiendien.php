<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <title>Thanh Toán Tiền Điện</title>
</head>
<body>
    <?php
    $dongia = 20000;
    if(isset($_POST['submit'])){
        $name = $_POST['ten'];
        $oldnb = $_POST['socu'];
        $newnb = $_POST['somoi'];
        if(is_numeric($oldnb) and is_numeric($newnb))
            if($oldnb<$newnb)
                $tientt = ($newnb - $oldnb)*$dongia;       
            else $mgs="Chỉ số cũ phải nhỏ hơn chỉ số mới!";
        else $mgs="Chỉ số cũ và chỉ số mới phải là số và không được để trống";
    }
    ?>
<form action="thanhtoantiendien" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>Thanh toán tiền điện</h1></td>
        </tr>
        <tr>
            <td>Tên chủ hộ: </td>
            <td> <input type="text" name="ten" value="<?php if (isset($name)) echo $name;?>"></td>
        </tr>
        <tr>
            <td>Chỉ số cũ: </td>
            <td> <input type="text" name="socu" value="<?php if (isset($oldnb)) echo $oldnb;?>"><b>(Kw)</b></td>
        </tr>
        <tr>
            <td>Chỉ số mới: </td>
            <td> <input type="text" name="somoi" value="<?php if (isset($newnb)) echo $newnb;?>"><b>(Kw)</b></td>
        </tr>
        <tr>
            <td>Đơn giá: </td>
            <td> <input type="text" name="dongia" value="<?php if (isset($dongia)) echo $dongia;?>"><b>(VNĐ)</b></td>
        </tr>
        <tr>
            <td>Số tiền thanh toán: </td>
            <td> <input type="text" name="tientt" style="background-color: lightpink" readonly
                        value="<?php if (isset($tientt)) echo $tientt;echo "";?>"><b>(VNĐ)</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính">
            </td>
        </tr>
        <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
         </tr>
    </table>
</form>

</body>
</html>