<?php
    include 'config.php';

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $error="";
    session_start();
    if (isset($_SESSION['user_id'])) {
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM USERS_CUS WHERE ID_USER = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Hiển thị thông tin người dùng
            $row = $result->fetch_assoc();
            $name = $row["FIRSTNAME_CUS"] . " " . $row["LASTNAME_CUS"];
            $email = $row["EMAIL_CUS"];
            $phone = $row["PHONE_CUS"];
            $address = $row["ADDRESS_CUS"];
        } else {
            echo $error = "Không tìm thấy thông tin người dùng";
        }
    } else {
        // Người dùng chưa đăng nhập, thực hiện các hành động khác (ví dụ: chuyển hướng đến trang đăng nhập)
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif !important;
            background-color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        main{
            flex: 1;
        }

        .left-links a {
            color: #000;
            text-decoration: none;
            padding: 14px 16px;
            margin-right: 20px;
        }

        .right-icons {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .right-icons i {
            font-size: 24px;
            margin-left: 20px;
            cursor: pointer;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease;
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product:hover {
            background-color: #ffcccb;
            
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .details-button {
            display: inline-block;
            background-color: pink;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .details-button:hover {
            background-color: #333;
            color: pink;
        }

        .footer {
            background-color: #ffcccb;
            color: #000;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

        
    /*-------------------------------------*/
        .form-group {
            display: flex;
            align-items: center;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            /* Thêm các thuộc tính CSS cần thiết cho input */
        }

        .btn {
            
            background-color: pink;
            color: black;
            padding: 5px 10px;

        }
        /*--------------------------------------------------------------------------------------------------*/
        /* Navbar menu list */
        .header {
            background-color: #ffcccb;
            color: #000;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
        }

        .new-header-top-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .new-header-top-logo {
            margin-right: auto; /* Đẩy new-header-top-logo về bên trái */
            margin-left: 20px;
            margin-bottom: 10px;
        }

        .new-header-top-actions {
            margin-left: auto; /* Đẩy new-header-top-actions về bên phải */
        }

        .new-header-top-actions-list ul {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .new-header-top-actions-list ul li {
            margin-right: 20px; /* Khoảng cách giữa các mục trong danh sách */
        }
        .new-header-top-actions {
            display: flex; /* Sử dụng Flexbox để sắp xếp các đối tượng trên một hàng ngang */
            align-items: center; /* Canh giữa các đối tượng theo chiều dọc */
        }

        .new-header-search,
        .new-header-top-actions-list {
            margin-right: 20px; /* Khoảng cách giữa các đối tượng */
        }

        .new-header-search form,
        .new-header-search-ovl,
        .new-header-top-actions-account,
        .new-header-top-actions-cart {
            display: flex; /* Sử dụng Flexbox để sắp xếp các phần tử con trên một hàng ngang */
            align-items: center; /* Canh giữa các phần tử con theo chiều dọc */
        }
        
        .new-header-menu-list {
        list-style: none;
        padding: 0;
        display: flex;
        align-items: center;
        background-color: #ffcad4; /* Màu nền hồng */
        padding: 10px 20px; /* Khoảng cách giữa các box và độ rộng của background */
        }

        .new-header-menu-list-item {
            margin-right: 20px; /* Khoảng cách giữa các mục menu */
            position: relative;
        }

        .new-header-menu-mega,
        .new-header-menu-mega-sub {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            background-color: #fff;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
            z-index: 1;
            width: 200px; /* Độ rộng của dropdown menu và submenu */
            padding: 10px;
            border: 1px solid #ccc; /* Border cho dropdown menu và submenu */
        }

        .new-header-menu-list-item:hover .new-header-menu-mega,
        .new-header-menu-mega-item:hover .new-header-menu-mega-sub {
            display: block;
        }

        .new-header-menu-mega-list,
        .new-header-menu-mega-sub-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column; /* Hiển thị submenu theo chiều dọc */
        }

        .new-header-menu-mega-item,
        .new-header-menu-mega-sub-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .new-header-menu-mega-item:last-child,
        .new-header-menu-mega-sub-item:last-child {
            border-bottom: none;
        }

        /* Loại bỏ gạch chân cho các liên kết */
        a,a:hover {
            text-decoration: none;
            color: black;
        }
        /*-------------------------------------------------------------- */
        .new-index-item2-wrap {
                padding: 20px;
            }
        .new-index-item2-item {
            margin-bottom: 20px;
        }

        .new-index-item2-item img {
            width: 100%;
            height: auto;
        }

        .new-index-item2-item .content {
            background-color: white;
            color: black;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        .new-index-item2-item .content span {
            text-decoration: underline pink;
            text-decoration-thickness: 2px;
            text-underline-offset: 5px;
        }
        /*-------------------------------------------------------------- */
        .new-index-item1-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            flex-direction: row;
        }

        .new-index-item1-item {
            text-align: center;
            margin: 0 15px;
        }

        .new-index-item1-item img {
            width: 130px;
            height: 130px;
        }
        @media (max-width: 768px) {
        .new-index-item1-wrap {
        flex-direction: column;
        align-items: flex-start;
            }
        }
        .new-index-item1-item .card-body span {
            text-decoration: underline pink;
            text-decoration-thickness: 2px;
            text-underline-offset: 5px;
        }
        .title_account{
            max-width: 400px;
            margin: 20px auto;
        }
        .profile form {
            max-width: 400px;
            margin: 20px auto;
            margin-bottom: 98px;
        }
        .profile label, input, span{
            display: block;
            margin-bottom: 10px;
        }
        .profile input{
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header id="new-header" class="stickystack">
        <div class="new-header-top">
            <div class="new-container">
                <div class="new-header-top-wrap"> 
                    <div class="new-header-top-logo">
                        <a href="/">
                            <img class="dt-width-auto" width="170" height="35" src="https://file.hstatic.net/200000103143/file/pandora_acf7bd54e6534a07be748b51c51c637c.svg" alt="Pandora Việt Nam"/>
                        </a>
                    </div>
                    <div class="new-header-top-actions">
                        <div class="new-header-search">
                            <form action="/search">
                                <input type="hidden" name="type" value="product">
                                <div class="form-group search-input-wrap">
                                    <input type="text" class="form-control js-search-input" name="q" placeholder="Tìm sản phẩm..." autocomplete="off" required>
                                    <button type="submit" class="btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <div class="search-suggest">
                                    </div>
                                </div> 
                            </form>
                            <a href="#" class="new-header-search-ovl">
                            </a>
                        </div>
                        <div class="new-header-top-actions-list">
                        
                            <ul>
                                <li class="new-header-top-actions-account">
                                    <a href="information_details.php">
                                        <i class="fas fa-user"></i>
                                    </a>
                                </li>
                                <li class="new-header-top-actions-cart">
                                    <a href="#">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                    <div class="popupCart"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="new-header-bottom">
            <div class="new-container">
                <div class="new-header-menu">
                    <ul class="new-header-menu-list">
                        
                        <li class="new-header-menu-list-item ">
                            <a href="/collections/khuyen-mai">
                                <span>KHUYẾN MÃI</span>
                            </a>
                        </li>
                        <li class="new-header-menu-list-item has-child">
                        <a href="/collections/new-collection">
                            <span>Bộ sưu tập mới</span>
                        </a>
                            <div class="new-header-menu-mega">
                                <ul class="new-header-menu-mega-list"> 
                                    <li class="new-header-menu-mega-item">
                                        <a href="/">
                                            <span>Bộ sưu tập</span>								
                                        </a>									
                                        <ul class="new-header-menu-mega-sub">								
                                            <li><a href="/collections/new-collection">New Arrivals</a></li>										
                                            <li><a href="/collections/pandora-moments">Pandora Moments</a></li>										
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/">
                                            <span>Chủ đề</span>							
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/gia-dinh">Gia đình</a></li>									
                                            <li><a href="/collections/tinh-yeu">Tình yêu</a></li>									
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/cung-hoang-dao">
                                            <span>Theo Cung - mệnh</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/cung-hoang-dao-1">Cung Hoàng đạo</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="new-header-menu-list-item has-child">
                            <a href="/collections/trang-suc">
                                <span>Trang sức</span>
                            </a>                           
                            <div class="new-header-menu-mega">
                                <ul class="new-header-menu-mega-list">                                    
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/charms">
                                            <span>Charms</span>                                           
                                        </a>                                        
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/charms">Tất cả</a></li>                                            
                                            <li><a href="/collections/charm-chan">Charm chặn</a></li>
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/vongtaypandora">
                                            <span>Vòng</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/vongtaypandora">Tất cả</a></li>
                                            <li><a href="/collections/vong-mem">Vòng mềm</a></li>
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/day-chuyen-1">
                                            <span>Dây Chuyền</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/day-chuyen-1">Tất cả</a></li>
                                            <li><a href="/collections/day-chuyen-1">Dây chuyền</a></li>
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/hoataipandora">
                                            <span>Hoa Tai</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/hoataipandora">Tất cả</a></li>
                                            <li><a href="/collections/kieu-tron">Kiểu tròn</a></li>
                                            <li><a href="/collections/bong-tai-nu">Bông tai nụ</a></li>
                                            <li><a href="/collections/kieu-roi">Kiểu rơi</a></li>
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/nhan-pandora">
                                            <span>Nhẫn</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li><a href="/collections/nhan-pandora">Tất cả</a></li>
                                            <li><a href="/collections/nhan-bac">Nhẫn bạc</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="new-header-menu-list-item has-child">
                            <a href="/collections/charms-va-vong">
                                <span>Vòng & Charm</span>
                            </a>
                            <div class="new-header-menu-mega">
                                <ul class="new-header-menu-mega-list"> 
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/pandora-moments">
                                            <span>Pandora Moments</span>
                                        </a>
                                        <ul class="new-header-menu-mega-sub">
                                            <li class="back-menu">
                                                <a href="#">
                                                    <span>Pandora Moments</span>
                                                </a>
                                            </li>
                                            <li><a href="/collections/charms">Charms</a></li>
                                            <li><a href="/collections/vong-pandora-moments">Vòng</a></li>
                                            <li><a href="/collections/phu-kien-pandora">Phụ kiện</a></li>
                                        </ul>
                                    </li>
                                    <li class="new-header-menu-mega-item">
                                        <a href="/collections/pandora-reflexions">
                                            <span>Pandora Reflexions</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>	
                        </li>	
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="profile">
        <div align="center" class="title_account">
            <h2>THÔNG TIN TÀI KHOẢN</h2>
        </div>
        <form action="" method="post">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="phone">Số điện thoại:</label>
            <input type="number" id="phone" name="phone" value="<?php echo $phone; ?>">

            <label for="address">Địa Chỉ:</label>
            <input id="address" name="address" value="<?php echo $address; ?>">
            <label><?php echo $error; ?></label>
            <div align="center">
                <a href="logout.php" class="btn">Đăng xuất</a>
            </div>
        </form>
    </div>
    <div class="footer">
        <div>
            &copy; 2023 Tên Công Ty Của Bạn. Đã đăng ký bản quyền.
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>