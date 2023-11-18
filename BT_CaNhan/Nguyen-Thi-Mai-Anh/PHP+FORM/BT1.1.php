<!DOCTYPE html>
<html>
<head>
    <title>Tính diện tích hình chữ nhật</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tính diện tích hình chữ nhật</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="chieudai">Chiều dài:</label>
                <input type="text" name="chieudai" id="chieudai" required>
            </div>
            <div class="form-group">
                <label for="chieurong">Chiều rộng:</label>
                <input type="text" name="chieurong" id="chieurong" required>
            </div>
            <button type="submit" name="submit">Tính</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $chieudai = $_POST['chieudai'];
            $chieurong = $_POST['chieurong'];
            $dientich = $chieudai * $chieurong;

            echo "<div class='form-group'>";
            echo "<label for='dientich'>Diện tích:</label>";
            echo "<input type='text' name='dientich' id='dientich' value='$dientich' readonly>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>