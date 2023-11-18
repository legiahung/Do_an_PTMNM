<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormTinhToan</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            $chieuDai = $_POST["chieudai"];
            $chieuRong = $_POST["chieurong"];
    
            if (is_numeric($chieuDai) && is_numeric($chieuRong)) {
                $dienTich = $chieuDai * $chieuRong;
            }
        }else $mgs="Chỉ số cũ và chỉ số mới phải là số và không được để trống";
    ?>
    <form action="" method="post">
        <table align="center" bgcolor="faebd7">
            <tr>
            <td colspan="2" bgcolor="orange"><h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1></td>
            </tr>
            <TR>
                <td>Chiều dài</td>
                <td><input type="text" id="chieudai" name="chieudai" style="width:200px"
                value="<?php if (isset($chieuDai)) echo $chieuDai;?>"></td>
            </TR>
            <tr>
                <td>Chiều rộng</td>
                <td><input type="text" id="chieurong" name="chieurong" style="width:200px"
                value="<?php if (isset($chieuRong)) echo $chieuRong;?>"></td>
            </tr>
            <tr>
                <td>Diện tích</td>
                <td><input type="text" id="dientich" name="dientich" style="background-color: lightpink; width: 200px" readonly
                value="<?php if (isset($dienTich)) echo $dienTich;?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" name="submit">Tính</button>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
            </tr>
        </table>

    </form>
</body>
</html>