<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng dãy số</title>
</head>

<body>
    <?php
    function sapXepTangDan($mang)
    {
        sort($mang);
        return $mang;
    }

    function sapXepGiamDan($mang)
    {
        rsort($mang);
        return $mang;
    }

    if (isset($_POST['sapxep'])) {
        $ds = $_POST['ds'];
        $mang = explode(",", $ds);
        $mangTangDan = sapXepTangDan($mang);
        $mangGiamDan = sapXepGiamDan($mang);
    }
    ?>
    <form method="post" action="">
        <table align="center" style="background-color: #DDDDDD;">
            <tr style="background-color: #3399CC;">
                <th colspan="2" style="color: white;">Nhập và sắp xếp dãy số</th>
            </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="ds" size="20" required>
                    <b style="color: red;">(*)</b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="sapxep" style="background-color: whitesmoke;" value="Sắp xếp">
                </td>
            </tr>
                <tr style="background-color: #99FFFF;">
                    <td  style="color: red; ">Sau khi sắp xếp</td>
                    <td></td>
                </tr>
                <tr style="background-color: #99FFFF;">
                    <td>Dãy số tăng dần: </td>
                    <td>
                        <input type="text" name="tangdan" size="20" readonly style="background:#99CCFF " value="<?php echo implode(", ", $mangTangDan); ?>">
                    </td>
                </tr>
                <tr style="background-color: #99FFFF;">
                    <td>Dãy số giảm dần: </td>
                    <td>
                        <input type="text" name="giamdan" size="20" readonly style="background:#99CCFF " value="<?php echo implode(", ", $mangGiamDan); ?>">
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
