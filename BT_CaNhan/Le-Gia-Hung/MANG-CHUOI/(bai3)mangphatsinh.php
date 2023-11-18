<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHÁT SINH MẢNG VÀ TÍNH TOÁN</title>
</head>
<body>
    <?php
    function generateArray($size) {
        $array = [];
        for ($i = 0; $i < $size; $i++) {
            $array[] = rand(0, 20);
        }
        return $array;
    }

    function printArray($array) {
        echo implode(", ", $array);
    }

    function calculateSum($array) {
        return array_sum($array);
    }

    function findMin($array) {
        return min($array);
    }

    function findMax($array) {
        return max($array);
    }

    $size = 0;
    $array = [];
    $sum = 0;
    $min = 0;
    $max = 0;
    $error = "";

    if(isset($_POST['generate'])){
        $size = $_POST['size'];

        if ($size >= 1 && $size <= 20) {
            $array = generateArray($size);
            $sum = calculateSum($array);
            $min = findMin($array);
            $max = findMax($array);
        } else {
            $error = "Số phần tử phải nằm trong khoảng từ 1 đến 20.";
        }
    }
    ?>
    <form method="post" action="(bai3)mangphatsinh.php">
        <table align="center">
            <tr style="background-color: #8B2252;">
                <th colspan="2" style="color: white;">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
            </tr>
            <tr style="background-color: #FFC0CB;">
                <td>Số phần tử: </td>
                <td>
                    <input type="number" name="size" size="20" value="<?php echo $size; ?>">
                </td>
            </tr>
            <tr style="background-color: #FFC0CB;">
                <td></td>
                <td colspan="2">
                    <input type="submit" name="generate" readonly style="background-color: lightyellow;" value="Phát sinh và tính toán">
                </td>
            </tr>
            <?php if ($error): ?>
            <tr>
                <td colspan="2" style="color: red;"><?php echo $error; ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td>Mảng: </td>
                <td>
                    <input type="text" name="array" size="20" readonly style="background:#FFA07A" value="<?php printArray($array); ?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị nhỏ nhất: </td>
                <td>
                    <input type="number" name="min" size="20" readonly style="background:#FFA07A  " value="<?php echo $min; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá trị lớn nhất: </td>
                <td>
                    <input type="number" name="max" size="20" readonly style="background:#FFA07A; " value="<?php echo $max; ?>">
                </td>
            </tr>
            <tr>
                <td>Tổng: </td>
                <td>
                    <input type="number" name="sum" size="20" readonly style="background:#FFA07A;  " value="<?php echo $sum; ?>">
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2" style="color: red;"><?php if(isset($mgs)) echo $mgs;?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>(<span style="color: red;">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</p>                    
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
