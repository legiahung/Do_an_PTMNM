<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?page=trangchu">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=gioithieu">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=tintuc">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=lienhe">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=diendan">Diễn đàn</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'trangchu':
                    include('trangchu.php');
                    break;
                case 'gioithieu':
                    include('gioithieu.php');
                    break;
                case 'tintuc':
                    include('tintuc.php');
                    break;
                case 'lienhe':
                    include('lienhe.php');
                    break;
                case 'diendan':
                    include('diendan.php');
                    break;
                default:
                    include('trangchu.php');
                    break;
            }
        } else {
            include('trangchu.php');
        }
        ?>
    </div>
</body>
</html>