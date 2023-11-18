<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng dãy số</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $ds = $_POST['ds'];
        $mang = explode(",",$ds);
        $tong = array_sum($mang);
    }
    ?>
    <form method="post" action="(bai2)tongdayso.php">
        <table align="center" style="background-color: #00FF99;">
        <tr style="background-color: green;">
            <th colspan="2" style="color: white;">Nhập và tính trên dãy số</th>
        </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="ds" size="20" require value="<?php if(isset($ds)) echo $ds; ?>"><b style="color: red;">(*)</b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit" readonly style="background-color: yellow;" value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td>
                    <input type="text" name="tong" size="20" readonly style="background:greenyellow " value="<?php if(isset($tong)) echo $tong; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="color: red;">(*)Các số được nhập cách nhau bằng dấu ","</p>                    
            </td>
            </tr>
        </table>
    </form>
</body>
</html>