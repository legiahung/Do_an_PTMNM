<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a{
            color: brown;
            font-weight: bold;
        }
        .a2{
            color: blue;
            font-weight: bold;
        }
        .nhapso{
            width: 200px;
        }
        .checkbox-container {
            display: inline-block;
            margin-right: 8px; /* Khoảng cách giữa các checkbox */
            color: brown;
        }
        /* Ẩn mặc định checkbox */
        .checkbox-container input[type="checkbox"] {
            display: none;
        }
        .custom-checkbox {
            width: 10px;
            height: 10px;
            border: 2px solid #333;
            border-radius: 50%; /* Tạo hình tròn */
            display: inline-block;
            vertical-align: middle; /* Canh giữa theo chiều dọc */
            cursor: pointer;
        }
        .checkbox-container input[type="checkbox"]:checked + .custom-checkbox {
            background-color: green;
            border-color: green; 
        }
    </style>
</head>
<body>
    <form action="bai6+.php" method="post">
        <table align="center">
            <tr>
                <td class="a2" colspan="2" align="center"><h2>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
            </tr>
            <tr>
                <TD class="a">Chọn phép tính</TD>
                <TD>
                    <label class="checkbox-container">
                        <input type="checkbox" name="operation" value="add">
                        <span class="custom-checkbox"></span> Cộng
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="operation" value="subtract">
                        <span class="custom-checkbox"></span> Trừ
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="operation" value="multiply">
                        <span class="custom-checkbox"></span> Nhân
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" name="operation" value="divide">
                        <span class="custom-checkbox"></span> Chia
                    </label>
                </TD>
            </tr>
            <tr>
                <td class="a2">Số thứ nhất: </td>
                <td><input type="text" name ="num1" value="" class="nhapso"></td>
            </tr>
            <tr>
                <td class="a2">Số thứ hai: </td>
                <td><input type="text" name ="num2" value="" class="nhapso"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="tinh" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>