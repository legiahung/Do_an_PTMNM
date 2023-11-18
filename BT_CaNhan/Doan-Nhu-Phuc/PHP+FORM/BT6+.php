<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Phép Tính</title>
    <style>
        /* Import styles from bai6.php */
        .a {
            font-weight: bold;
            color: blue;
        }

        .a2 {
            color: brown;
            font-weight: bold;
        }

        .nhapso {
            width: 200px;
        }

        .checkbox-container {
            display: inline-block;
            margin-right: 8px;
            color: brown;
        }

        .checkbox-container input[type="checkbox"] {
            display: none;
        }

        .custom-checkbox {
            width: 10px;
            height: 10px;
            border: 2px solid #333;
            border-radius: 50%;
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
        }

        .checkbox-container input[type="checkbox"]:checked + .custom-checkbox {
            background-color: green;
            border-color: green;
        }
    </style>
</head>
<body>
<?php
    if (isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        // Kiểm tra dữ liệu nhập vào
        if (is_numeric($num1) && is_numeric($num2)) {
            if (($operation == "divide" && $num2 == 0) || ($operation == "divide" && $num1 == 0)) {
                echo "<p>Dữ liệu không hợp lệ. Không thể chia cho 0.</p>";
            } else {
                // Xử lý phép tính tương tự như trước
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        $result = $num1 / $num2;
                        break;
                    default:
                        echo "<p>Phép tính không hợp lệ.</p>";
                        break;
                }

                // Hiển thị kết quả
                $operationText = '';
                switch ($operation) {
                    case 'add':
                        $operationText = 'Cộng';
                        break;
                    case 'subtract':
                        $operationText = 'Trừ';
                        break;
                    case 'multiply':
                        $operationText = 'Nhân';
                        break;
                    case 'divide':
                        $operationText = 'Chia';
                        break;
                }
            }
        } else {
            echo "<p>Dữ liệu không hợp lệ. Vui lòng nhập số.</p>";
        }
    } else {
        echo "<p>Không có đủ thông tin để thực hiện phép tính.</p>";
    }
?>
<!-- Rest of your HTML code -->

    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" class="a2" align="center"><h2>PHÉP TÍNH TRÊN HAI SỐ</h2></td>
            </tr>
            <tr class="a">
                <td>Chọn phép tính: </td>
                <td> <?php if (isset($operationText)) echo $operationText;?></td>
            </tr>
            <tr class="a2">
                <td>Số 1: </td>
                <td><input type="text" name="num1" readonly value="<?php if (isset($num1)) echo $num1;?>" class="nhapso"></td>
            </tr>
            <tr class="a2">
                <td>Số 2: </td>
                <td><input type="text" name="num2" readonly value="<?php if (isset($num2)) echo $num2;?>" class="nhapso"></td>
            </tr>
            <tr class="a2">
                <td>Kết quả: </td>
                <td><input type="text" readonly value="<?php if (isset($result)) echo $result;?>" class="nhapso"></td>
            </tr>
            <tr class="a2">
                <td align="center"><a style="color: #CC66FF" href="javascript:window.history.back(-1);">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
