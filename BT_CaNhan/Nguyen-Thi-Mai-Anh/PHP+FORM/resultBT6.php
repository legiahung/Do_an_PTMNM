<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Phép Tính</title>
</head>
<body>
    <?php
    if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
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
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    $operationText = 'Chia';
                } else {
                    $result = 'Không thể chia cho 0';
                    $operationText = 'Chia';
                }
                break;
            default:
                $result = 'Phép tính không hợp lệ';
                $operationText = 'Không xác định';
        }
    } else {
        echo "<p>Không có đủ thông tin để thực hiện phép tính.</p>";
    }
    ?>
    <form action="BT6.php" method="post">
        <table align="center">
            <tr>
                <td colspan="2"><h1>Kết quả phép tính</h1></td>
            </tr>
            <tr  style="color: red;">
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
                <td><input type="text"  readonly value="<?php if (isset($result)) echo $result;?>"></td>
            </tr>
            <tr>
               <td > <a style="color: #CC66FF" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>

</body>
</html>
