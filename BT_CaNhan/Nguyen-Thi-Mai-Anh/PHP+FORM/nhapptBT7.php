<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phép Tính</title>
    <style>
        body {
            background-color: #888888; 
            color: #FFFFFF; 
            font-family: Arial, sans-serif;
        }

        table {
            background-color: #6699FF; 
            border-radius: 10px; 
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            color: #FFFFFF; 
        }

        td {
            padding: 10px;
        }

        input[type="text"], input[type="submit"] {
            width: 150px;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #0099CC; 
            color: #FFFFFF;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #006699;
        }
    </style>
</head>
<body>
    <form action="resultBT7.php" method="post">
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
