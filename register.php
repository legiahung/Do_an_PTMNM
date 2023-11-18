<?php

@include 'config.php';

if(isset($_POST['register'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn,($_POST['password']));
   $cpass = mysqli_real_escape_string($conn,($_POST['password']));
   $type_user = $_POST['type_user'];

   $select = " SELECT * FROM users WHERE EMAIL = '$email' && PASS = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Tài khoản đã tồn tại!';

   }else{

      if($pass != $cpass){
         $error[] = 'Mật khẩu không trùng khớp!';
      }else{
        $insert = "INSERT INTO users(NAME, EMAIL, PASS, TYPE_USER) VALUES('$name','$email','$pass','$type_user')";
        mysqli_query($conn, $insert);
        header('location: login.php');
      }
   }

};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif !important;
            background-color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .header {
            width: 100%;
            background-color: #ffffff;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 15px;
        }
        .footer {
            background-color: #ffcccb;
            color: #000;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
        .logo {
            margin-right: 20px;
            padding-left: 25px;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 80px;
            margin-bottom: 175px;
            width: 100%;
        }

        input[type="text"], input[type="email"], input[type="password"]{
            width: 383px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 405px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        a {
            font-size: 12px;
            height: 50px;
            padding: 0px 0px;
            margin-bottom: 10px;
        }

        input[type="submit"],
        button {
            width: 404px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #222222;
            color: #fff;
            font-size: 16px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #333333;
        }

        button {
            background-color: #4267b2;
            width: 200px;
        }

        button:last-child {
            margin-top: 10px;
        }

        @media only screen and (max-width: 650px) {
            .header {
                justify-content: center;
            }

        }
        /* Loại bỏ gạch chân cho các liên kết */
        a,a:hover {
            text-decoration: none;
            color: black;
        }
        #togglePassword:hover {
            color: #4285f4;
        }
        #togglecPassword:hover {
            color: #4285f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="/">
                <img class="dt-width-auto" width="170" height="35"
                    src="https://file.hstatic.net/200000103143/file/pandora_acf7bd54e6534a07be748b51c51c637c.svg"
                    alt="Pandora Việt Nam" />
            </a>
        </div>
    </div>
    <div class="register-form">
        <h2>Đăng ký</h2>
        <form action="" method="post">
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
        ?>
            <div>
                <input type="text" name="name" required placeholder="Tên tài khoản">
            </div>
            <div>
                <input type="email" name="email" required placeholder="Email">
            </div>
            <div>
                <input type="password" name="password" required placeholder="Mật khẩu">
                <span id="togglePassword" onclick="togglePasswordVisibility()">&#128065;</span>
            </div>
            <div>
                <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
                <span id="togglecPassword" onclick="togglePasswordVisibility2()">&#128065;</span>
            </div>
            <div>
                <select name="type_user" required>
                    <option value="Customer">Customer</option>
                </select>
            </div>
            <div>
                <input type="submit" name="register" value="Đăng ký">
            </div>
            <div align="center">
                <p style="font-size: 12px">Bạn đã có tài khoản? <a style="color: #DC143C;" href="login.php">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
    <div class="footer">
        &copy; 2023 Tên Công Ty Của Bạn. Đã đăng ký bản quyền.
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.querySelector("input[name='password']");
            var toggleIcon = document.getElementById("togglePassword"); // Sửa thành "togglePassword"

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.innerHTML = "&#128064;"; // Mã Unicode cho biểu tượng mắt đóng
            } else {
                passwordInput.type = "password";
                toggleIcon.innerHTML = "&#128065;"; // Mã Unicode cho biểu tượng mắt mở
            }
        }
        function togglePasswordVisibility2() {
            var passwordInput = document.querySelector("input[name='cpassword']");
            var toggleIcon = document.getElementById("togglecPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.innerHTML = "&#128064;"; // Mã Unicode cho biểu tượng mắt đóng
            } else {
                passwordInput.type = "password";
                toggleIcon.innerHTML = "&#128065;"; // Mã Unicode cho biểu tượng mắt mở
            }
        }
    </script>
</body>
</html>