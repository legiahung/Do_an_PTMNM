<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Thế Dãy Số</title>
</head>
<body>
    <?php
    function convertStringToArray($inputString) {
        return explode(",", $inputString);
    }

    function replaceArrayValues($array, $valueToReplace, $replacementValue) {
        return array_map(function($element) use ($valueToReplace, $replacementValue) {
            return $element == $valueToReplace ? $replacementValue : $element;
        }, $array);
    }

    if(isset($_POST['replace'])){
        $ds = $_POST['ds'];
        $valueToReplace = $_POST['valueToReplace'];
        $replacementValue = $_POST['replacementValue'];

        $mangCu = convertStringToArray($ds);
        $mangMoi = replaceArrayValues($mangCu, $valueToReplace, $replacementValue);
    }
    ?>
    <form method="post" action=mang_thay_the.php>
        <table align="center">
            <tr style="background-color: #CC0099">
                <th colspan="2" style="color: white;">Thay Thế Dãy Số</th>
            </tr>
            <tr style="background-color: pink">
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="ds" size="20" required value="<?php if(isset($ds)) echo $ds; ?>"><b style="color: red;">(*)</b>
                </td>
            </tr>
            <tr style="background-color: pink">
                <td>Giá trị cần thay thế: </td>
                <td>
                    <input type="number" name="valueToReplace" required value="<?php if(isset($valueToReplace)) echo $valueToReplace; ?>">
                </td>
            </tr>
            <tr style="background-color: pink">
                <td>Giá trị thay thế: </td>
                <td>
                    <input type="number" name="replacementValue" required value="<?php if(isset($replacementValue)) echo $replacementValue; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <input type="submit" name="replace" readonly style="background-color: yellow;" value="Thay thế">
                </td>
            </tr>
            <?php if (isset($mangCu) && isset($mangMoi)): ?>
            <tr>
                <td>Mảng cũ: </td>
                <td>
                    <input type="text" name="mangCu" size="30" readonly style="background:#FFA07A" value="<?php echo implode(", ", $mangCu); ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng mới: </td>
                <td>
                    <input type="text" name="mangMoi" size="30" readonly style="background:#FFA07A" value="<?php echo implode(", ", $mangMoi); ?>">
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2">
                    <p>(<span style="color: red;">Ghi chú:</span>Các phần tử sẽ được cách nhau bằng dấu ",")</p>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
