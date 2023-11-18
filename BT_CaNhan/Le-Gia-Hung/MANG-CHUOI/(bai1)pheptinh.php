<!DOCTYPE html>
<html>
<head>
    <title>Form Nhập Số Nguyên N</title>
</head>
<body>
    <form method="post" action="(bai1)pheptinh.php">
        Nhập n: <input type="text" name="n">
        <input type="submit" name="submit" value="Thực hiện">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $n = $_POST["n"];

        // Kiểm tra n có phải là số nguyên dương
        if (is_numeric($n) && $n > 0 && $n == intval($n)) {
            // Khởi tạo mảng và điền giá trị ngẫu nhiên vào mảng
            $arr = [];
            for ($i = 0; $i < $n; $i++) {
                $arr[] = rand();
            }

            // Các công việc yêu cầu
            $evenCount = 0;
            $lessThan100Count = 0;
            $negativeSum = 0;
            $zeroIndexes = [];

            foreach ($arr as $key => $value) {
                if ($value % 2 == 0) {
                    $evenCount++;
                }

                if ($value < 100) {
                    $lessThan100Count++;
                }

                if ($value < 0) {
                    $negativeSum += $value;
                }

                if ($value == 0) {
                    $zeroIndexes[] = $key;
                }
            }

            // Sắp xếp mảng tăng dần
            sort($arr);

            // Hiển thị kết quả
            echo "Mảng ngẫu nhiên: " . implode(", ", $arr) . "<br>";
            echo "Số phần tử chẵn: $evenCount<br>";
            echo "Số phần tử nhỏ hơn 100: $lessThan100Count<br>";
            echo "Tổng các phần tử âm: $negativeSum<br>";
            echo "Vị trí các phần tử bằng 0: " . implode(", ", $zeroIndexes) . "<br>";
        } else {
            echo "Vui lòng nhập một số nguyên dương.";
        }
    }
    ?>
</body>
</html>
