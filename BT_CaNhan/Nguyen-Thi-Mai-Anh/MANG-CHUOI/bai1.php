<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form nhập và xử lý mảng số nguyên</title>
    <style>
        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Form nhập và xử lý mảng số nguyên</h2>

    <form method="POST" action="">
        <label for="number">Nhập n:</label>
        <input type="number" id="number" name="number" min="1" required>
        <input type="submit" value="Thực hiện">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["number"];

        if ($n > 0) {   // Tạo mảng ngẫu nhiên có n phần tử số nguyên
            $arr = array();
            for ($i = 0; $i < $n; $i++) {
                $arr[] = rand();
            }

            echo "<h3>Kết quả:</h3>";
            echo "<p>Mảng ngẫu nhiên có $n phần tử:</p>";
            echo "<table>";
            echo "<tr><th>Phần tử</th></tr>";
            foreach ($arr as $element) {
                echo "<tr><td>$element</td></tr>";
            }
            echo "</table>";

            $evenCount = 0;   // Đếm số phần tử là số chẵn
            foreach ($arr as $element) {
                if ($element % 2 == 0) {
                    $evenCount++;
                }
            }
            echo "<p>Số phần tử là số chẵn: $evenCount</p>";

            $lessThan100Count = 0;        // Đếm số phần tử nhỏ hơn 100
            foreach ($arr as $element) {
                if ($element < 100) {
                    $lessThan100Count++;
                }
            }
            echo "<p>Số phần tử nhỏ hơn 100: $lessThan100Count</p>";

            $negativeSum = 0;       // Tính tổng các phần tử âm
            foreach ($arr as $element) {
                if ($element < 0) {
                    $negativeSum += $element;
                }
            }
            echo "<p>Tổng các phần tử âm: $negativeSum</p>";

            $zeroIndices = array_keys($arr, 0);
            // Tìm vị trí các phần tử bằng 0
            if (count($zeroIndices) > 0) {
                echo "<p>Vị trí của các phần tử bằng 0: ";
                foreach ($zeroIndices as $index) {
                    echo "$index ";
                }
                echo "</p>";
            } else {
                echo "<p>Không có phần tử nào bằng 0 trong mảng.</p>";
            }

            // Sắp xếp mảng theo thứ tự tăng dần
            sort($arr);
            echo "<p>Mảng sau khi sắp xếp:</p>";
            echo "<table>";
            echo "<tr><th>Phần tử</th></tr>";
            foreach ($arr as $element) {
                echo "<tr><td>$element</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nhập n phải là số nguyên dương.</p>";
        }
    }
    ?>
</body>
</html>