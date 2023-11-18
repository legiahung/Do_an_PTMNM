<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Phép Tính</title>
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
            color:brown;
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

        a {
            color: #CC66FF; 
            text-decoration: none; 
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
function isValidInput($num1, $num2, $operation) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return false;
    }

    if ($operation === 'divide' && $num2 == 0) {
        return false;
    }

    return true;
}

if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
    $operation = $_POST['operation'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if (isValidInput($num1, $num2, $operation)) {
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                $operationText = 'Cộng';
                break;
            case 'subtract':
                $result = $num1 - $num2;
                $operationText = 'Trừ';
                break;
            case 'multiply':
                $result = $num1 * $num2;
                $operationText = 'Nhân';
                break;
            case 'divide':
                $result = $num1 / $num2;
                $operationText = 'Chia';
                break;
            default:
                $result = 'Phép tính không hợp lệ';
                $operationText = 'Không xác định';
        }
    } else {
        echo "<script>alert('Dữ liệu không hợp lệ hoặc phép chia cho 0. Vui lòng kiểm tra lại.');</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }
} else {
    echo "<p>Không có đủ thông tin để thực hiện phép tính.</p>";
}
?>
<form action="bai7.php" method="post">
    <table align="center">
        <tr>
            <td colspan="2"><h1>Kết quả phép tính</h1></td>
        </tr>
        <tr  style="color: brown;">
            <td>Phép tính đã chọn: </td>
            <td> <?php if (isset($operationText)) echo $operationText;?></td>
        </tr>
        <tr>
            <td style="color: blue;">Số thứ nhất: </td>
            <td><input type="text" name="num1" readonly value="<?php if (isset($num1)) echo $num1;?>"></td>
        </tr>
        <tr>
            <td style="color: blue;">Số thứ hai: </td>
            <td><input type="text" name="num2" readonly value="<?php if (isset($num2)) echo $num2;?>"></td>
        </tr>
        <tr>
            <td style="color: blue;">Kết quả: </td>
            <td><input type="text" readonly value="<?php if (isset($result)) echo $result;?>"></td>
        </tr>
        <tr>
            <td > <a style="color: #CC66FF" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
        </tr>
    </table>
</form>
</body>
</html>
