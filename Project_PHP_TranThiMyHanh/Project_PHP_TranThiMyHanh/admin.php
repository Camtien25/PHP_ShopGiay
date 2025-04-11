<?php 
    session_start(); 
    if (!isset($_SESSION['Login']) || ($_SESSION['IDRole'] != 1 && $_SESSION['IDRole'] != 2)) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="View/css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="View/img/header1.jpg" alt="Header Image" style="width:100%; height:auto;">
        </div>
        <div class="nav-top">
            <a href="index.php">Trang chủ</a>
            <a href="admin.php">Quản lý</a>
            <a href="?act=logout" onclick="return confirm('Bạn thật sự muốn thoát?');">Đăng xuất</a>
        </div>
        <div class="main">
            <div class="nav-aside">
                <div class="categories">
                    <ul>
                        <li><a href="admin.php?act=list_product">Quản lý sản phẩm</a></li>
                        <li><a href="admin.php?act=list_user">Quản lý tài khoản</a></li>
                        <li><a href="admin.php?act=list_category">Quản lý danh mục</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <?php
                if (isset($_GET["act"])) {
                    switch ($_GET["act"]) {
                        case "list_product":
                            include("View/list_prod.php");
                            break;
                        case "add_product":
                            include("View/add_prod.php");
                            break;
                        case "edit_product":
                            if (isset($_GET['id'])) {
                                include_once("Controller/cProduct.php");
                                $p = new controlProduct();
                                $result = $p->getProductById($_GET['id']);
                                if ($result) {
                                    $product = $result->fetch_assoc(); // gán cho biến $product
                                }
                            }
                            include("View/edit_prod.php");
                            break;
                        case 'delete_product':
                            if (isset($_GET['id'])) {
                                include_once("Controller/cProduct.php");
                                $p = new controlProduct();
                                $p->deleteProduct($_GET['id']);
                            }
                            header("Location: admin.php?act=list_product");
                            exit();
                            break;

                        case "list_user":
                            include("View/list_user.php");
                            break;
                        case "list_category":
                            include("View/list_category.php");
                            break;

                        case "logout":
                            include("View/logout.php");
                            break;

                        default:
                            echo "<p>Chức năng không tồn tại!</p>";
                    }
                } 
                ?>
            </div>
        </div>
        <div class="footer">
            Trang quản trị - Admin
        </div>
    </div>
</body>
</html>
