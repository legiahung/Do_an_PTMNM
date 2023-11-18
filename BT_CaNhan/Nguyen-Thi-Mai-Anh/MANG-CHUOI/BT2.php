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
    if(isset($_POST['submit'])) {
        $dayso = $_POST['nhapso'];
        $mang = explode(",", $dayso);
        $tong = array_sum($mang);
    }
    ?>
    <form method="post" name="TINHDAYSO">
        <table style="background-color: #33FF66 ;" >
            <tr style="background-color: green;">
                <th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="nhapso" size="20" value="<?php if(isset($dayso)) echo $dayso; ?>"> <b style="color: red;">(*)</b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit"  style="background-color: yellow;"  value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td >Tổng dãy số:</td>
                <td>
                    <input type="text" name="dai" size="20" style="background-color:lime;" value="<?php if(isset($tong)) echo $tong; ?>">
                </td>
                <tr>
                    <td colspan="2"> 
                        <p style="color: red;">(*) Các số được nhập cách nhau bằng dấu , </p>
                </tr>
            </tr>
        </table>
    </form>
</body>
</html>