<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Trong Dãy Số</title>
</head>
<body>
    <?php
        function searchNumber($array, $number) {
            foreach ($array as $key => $value) {
                if ($value == $number) {
                    return $key;
                }
            }
            return -1;
        }

        if(isset($_POST['submit'])){
            $ds = $_POST['ds'];
            $timKiem = $_POST['timkiem'];

            if (is_numeric($timKiem) && $timKiem >= 0) {
                $mang = explode(",", $ds);
                $viTri = searchNumber($mang, $timKiem);

                if ($viTri != -1) {
                    $ketQua = "Đã tìm thấy $timKiem tại vị trí thứ $viTri của mảng.";
                } else {
                    $ketQua = "Không tìm thấy $timKiem trong mảng.";
                }
            } else {
                $ketQua = "Vui lòng nhập một số nguyên không âm.";
            }
        }
    ?>
    <form method="post" action="(bai4)mangtimkiem.php">
        <table align="center" style="background-color: #C1CDCD">
        <tr style="background-color: #5F9EA0;">
            <th colspan="2" style="color: white;">TÌM KIẾM</th>
        </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="ds" size="30" required value="<?php if(isset($ds)) echo $ds; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm: </td>
                <td>
                    <input type="text" name="timkiem" size="10" required value="<?php if(isset($timKiem)) echo $timKiem; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="submit" readonly style="background-color: lightblue;" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td>
                    <input type="text" name="ds" size="30" readonly  value="<?php if(isset($ds)) echo $ds; ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td>
                    <input type="text" name="ketqua" size="30" readonly style="background:#E0FFFF;  color:red;  " value="<?php if(isset($ketQua)) echo $ketQua; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="background-color: #5F9EA0;">
                    <p >(Các phần tử sẽ được cách nhau bằng dấu ",")</p>                    
            </td>
            </tr>
        </table>
    </form>
</body>
</html>
