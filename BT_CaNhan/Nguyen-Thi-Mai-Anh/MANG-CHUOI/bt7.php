<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Năm Âm Lịch và Con Giáp</title>
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $namDuongLich = $_POST['nam'];
        $mang_can = array("Quý", "Giáp", "Át", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
        $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
        $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

        $nam_am = $namDuongLich - 3;
        $can = $nam_am % 10;
        $chi = $nam_am % 12;
        $nam_am_lich = $mang_can[$can] . " " . $mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = $hinh;
    }
    ?>
    <form method="post" action="">
        <table align="center" style="background-color: #33CCFF;">
            <tr style="background-color: darkblue;">
                <th colspan="2" style="color: white;">Nhập Năm Dương Lịch</th>
            </tr>
            <tr>
                <td>Năm Dương Lịch: </td>
                <td>
                    <input type="number" name="nam" required value="<?php if(isset($namDuongLich)) echo $namDuongLich; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" size="15" value="=>" /></td>
            </tr>
            <td>Năm âm lịch:</td>
            <td><input type="text" name="namAmLich" size="15" readonly style="background:lightgoldenrodyellow; color:red" value="<?php echo $nam_am_lich; ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <img src="12con_giap/<?php echo $hinh_anh ?>" width="200px" alt="">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>