<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép Tính</title>
</head>
<body>
    <form action="(bai6)ketquapheptinh.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Phép tính trên hai số</h1></td>
            </tr>
            <tr  style="color: red;">
                <td>Chọn phép tính: </td>
                <td>
                    <input type="radio" name="operation" value="add"> Cộng
                    <input type="radio" name="operation" value="subtract"> Trừ
                    <input type="radio" name="operation" value="multiply"> Nhân
                    <input type="radio" name="operation" value="divide"> Chia
                </td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ nhất: </td>
                <td><input type="text" name="num1"></td>
            </tr>
            <tr>
                <td style="color: blue;">Số thứ hai: </td>
                <td><input type="text" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>
