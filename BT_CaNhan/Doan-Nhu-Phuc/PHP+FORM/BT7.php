<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép Tính</title>
    <style>
        body {
            color: #FFFFFF; 
            font-family: Arial, sans-serif;
        }

        table {
            border-radius: 10px; 
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            color: brown; 
        }

        td {
            padding: 10px;
        }

        input[type="text"], input[type="submit"] {
            width: 150px;
            padding: 5px;
        }

        input[type="submit"] {
            cursor: pointer;
        }

    </style>
</head>
<body>
    <form action="bai7+.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Phép tính trên hai số</h1></td>
            </tr>
            <tr  style="color: brown;">
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
