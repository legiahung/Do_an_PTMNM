<?php
    session_start();
    include ("config.php");
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page if not logged in
        header('location: login.php');
        exit();
    }

    // Access user information from the session
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_type = $_SESSION['user_type'];
?>
<?php
  include 'action_order.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>General</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
    <script src='main.js'></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            width: 100%;
             height: 100%;
             margin: 0;
                 padding: 0;
            background-color: white;
        }

        .container {
    /* background: url(images/Pandora-logo-history.jpg) center no-repeat; */
    margin-top: 5rem;
    height: 100%;
    background-size: cover;
    position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
h2 {
    margin-top: 2rem; /* Thêm khoảng cách 2rem cho phần tử h2 bên dưới header */
}

.header {
    height: 5rem;
    display: grid;
    background: white;
    background-size: cover;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
    border-bottom: 2px solid pink;
}

        nav {
            width: 80%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            color: #fff;
            margin: auto;
        }

        .left-section img {
            width: 140px;
            cursor: pointer;
            position: relative;
            left: -100%;
        }

        .right-section {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            list-style: none;
            cursor: pointer;
            font-size: 14px;
            position: relative;
        }
        .nav-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: pink;
    padding: 10px;
    display: none;
    z-index: 999;

}

        .nav-link:hover .nav-dropdown {
            display: block;
        }

        .nav-dropdown-item {
            padding: 5px 0;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            position: relative;
        }

        .compact-tbody {
    font-size: 14px;
}

.compact-tbody td, .compact-tbody th {
    padding: 0.5rem;
}
        a:hover {
            color: #00bfff;
        }

        a::before {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px;
            margin: auto;
            width: 0%;
            content: '';
            color: transparent;
            background: linear-gradient(45deg, #e1d5f5, #63a9fe);
            height: 1px;
            transition: all 0.3s;
        }
/* 
        a:hover::before {
            width: 100%;
        } */
        .add-product-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }

  .add-product-form {
    display: none;
    margin-top: 20px;
  }
  .account-list {
  max-height: 500px; /* Đặt độ cao tối đa cho phần tử chứa danh sách tài khoản */
  overflow-y: scroll; /* Cho phép cuộn nội dung khi vượt quá độ cao tối đa */
  width: 1400px;
}
.action a {
        color: black; /* Đổi màu chữ thành màu đen */
        margin-top: 50px; /* Tăng khoảng cách lề trên lên 50px */
        }
    </style>
    
</head>
<body>
    <div class="container">
            <header class="header">
                <nav>
                <div class="left-section">
        <a href="TrangchuAdmin.php">
        <img src="images/images/logo.jpg" href="/QLTS/TrangchuAdmin.php"width="100px" height="70" alt="logo">
        </a>
    </div>
                <div class="right-section">
                    <ul class="nav-links">
                    <li class="nav-link">
                            <a href="#" style="color: black">Tài khoản user</a>
                            <div class="nav-dropdown">
                                <div class="nav-dropdown-item">
                                    <a href="general1.php">General</a>
                                </div>
                                <div class="nav-dropdown-item">
                                    <a href="info_cus.php">Thông tin khách hàng</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-link">
                            <a href="#" style="color: black">Sản phẩm</a>
                            <div class="nav-dropdown">
                            <div class="nav-dropdown-item">
                                    <a href="loaits.php">Loại trang sức</a>
                                </div>
                                <div class="nav-dropdown-item">
                                    <a href="sanpham.php">Danh sách sản phẩm</a>
                              </div>
                                <div class="nav-dropdown-item">
                                    <a href="NCC.php">Nhà cung cấp</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-link">
                            <a href="#" style="color: black">Quản lý nhân sự</a>
                            <div class="nav-dropdown">
                            <div class="nav-dropdown-item">
                                    <a href="department.php">Phòng ban</a>
                                </div>
                                <div class="nav-dropdown-item">
                                    <a href="position.php">Vị trí</a>
                              </div>
                                <div class="nav-dropdown-item">
                                    <a href="info_NV.php">Thông tin nhân viên</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-link">
                            <a href="order.php" style="color: black">Quản lý đơn hàng</a>
                        </li>
                    </ul>
                    <div class="action">
                    <a href="information_details_admin.php">
                        <i class="fas fa-user"></i>
                        <span><?php echo $_SESSION['user_name'] ?></span>
                    </a>
                    </div>
                </div>
            </nav>
        </header>
        <br>

  <div class="container-fluid">
    <div class="row justify-content-center" style="position:relative">

    <h3>Danh sách các đơn đặt hàng</h3>
      <div class="col-md-10">
        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT HOADON.ID_CUS, USERS_CUS.FIRSTNAME_CUS, USERS_CUS.LASTNAME_CUS, HOADON.ID_TS,  SANPHAM.TENTS, HOADON.DIACHINHAN, HOADON.SDTNHAN,
          CTHD.ID_CTHD, CTHD.ID_HD, CTHD.SOLUONGSP, CTHD.MOTA, CTHD.TINHTRANG, CTHD.DONGIA, CTHD.TONGTIENHD
            FROM HOADON
            JOIN CTHD ON HOADON.ID_HD = CTHD.ID_HD
            JOIN USERS_CUS ON HOADON.ID_CUS = USERS_CUS.ID_CUS
            JOIN SANPHAM ON HOADON.ID_TS = SANPHAM.ID_TS';
           $stmt = $conn->prepare($query);
           $stmt->execute();
           $result = $stmt->get_result();
        ?>
        <div class="account-list">
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
            <th>ID</th>
              <th>ID HĐ</th>
              <th>Họ KH</th>
              <th>Tên KH </th>
              <th>Tên trang sức</th>
              <th>Địa chỉ</th>
              <th>SĐT</th>
              <th>Mô tả</th>
              <th>Số lượng</th>
              <th>Đơn giá(VNĐ)</th>
              <th>Tổng đơn hàng</th>
              <th>Tình trạng</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['ID_CTHD']; ?></td>
              <td><?= $row['ID_HD']; ?></td>
              <td><?= $row['FIRSTNAME_CUS']; ?></td>
              <td><?= $row['LASTNAME_CUS']; ?></td>
              <td><?= $row['TENTS']; ?></td>
              <td><?= $row['DIACHINHAN']; ?></td>
              <td><?= $row['SDTNHAN']; ?></td>
              <td><?= $row['MOTA']; ?></td>
              <td><?= $row['SOLUONGSP']; ?></td>
              <td><?= $row['DONGIA']; ?></td>
              <td><?= $row['TONGTIENHD']; ?></td>
              <td><?= $row['TINHTRANG']; ?></td>
              <td>
                <a href="details_order.php?details=<?= $row['ID_CTHD']; ?>" class="badge badge-primary p-2">Xem chi tiết</a> |
                <a href="action_order.php?delete=<?= $row['ID_CTHD']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Xóa</a> |
                <a href="edit_order.php?edit=<?= $row['ID_CTHD']; ?>" class="badge badge-success p-2">Chỉnh sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
</body>

</html>