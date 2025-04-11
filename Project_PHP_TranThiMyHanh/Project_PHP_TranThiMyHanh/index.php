<?php 
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Kiểm tra IDRole có tồn tại trước khi dùng
    if (isset($_SESSION['IDRole']) && ($_SESSION['IDRole'] == 1 || $_SESSION['IDRole'] == 2)) {
        header("Location: admin.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/style.css">
    <title>Fast Food</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="View/img/header1.jpg" alt="Header Image">
        </div>
        <div class="nav-top" style="display: flex; align-items: center;">
            <a href="index.php">Trang chủ</a>
            <?php
                if(isset($_SESSION["Login"])){
                    echo '<a href="?act=logout" onclick="return confirm(\'Bạn thật sự muốn thoát?\');">Đăng xuất</a>';
                } else {
                    echo '<a href="?act=regis">Đăng ký</a>';
                    echo '<a href="?act=login">Đăng nhập</a>';
                }
            ?>
        </div>
        <form action="index.php" method="get" style="display: flex; justify-content: flex-end; align-items: center; margin-right: 10px;padding-top: 5px;">
            <input type="hidden" name="act" value="search">
            <input type="text" name="keyword" placeholder="Tìm sản phẩm..." style="padding: 5px; border-radius: 5px; border: 1px solid #ccc; margin-right: 5px;">
            <button type="submit" style="background-color: #ff9800; border: none; border-radius: 5px; padding: 6px 12px; color: white;">Tìm</button>
        </form>
        <div class="main">
            <div class="nav-aside">
                <div class="categories">
                    <h3>Danh Mục Sản Phẩm</h3>
                    <ul>
                        <?php
                            include_once("Controller/cCategory.php");
                            $p = new controlCategory();
                            $tblCategory = $p->getAllCategory();

                            if($tblCategory->num_rows > 0) {
                                while($row = $tblCategory->fetch_assoc()) {
                                    echo "<li><a href=\"\">".$row['name']."</a></li>";
                                }
                            }else {
                                echo "Không có danh mục sản phẩm";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="content">
                <?php
                    if (isset($_GET["act"])) {
                        switch ($_GET["act"]) {
                            case "login":
                                include("View/login.php");
                                break;
                            case "regis":
                                include("View/register.php");
                                break;
                            case "logout":
                                include("View/logout.php");
                                break;
                            case "product":
                                include("View/product.php");
                                break;
                            case "search":
                                include("View/search.php");
                                break;
                        }
                    }else {
                        include("View/all_product.php"); // Trang chủ hiển thị tất cả sản phẩm
                    }
                ?>
            </div>
        </div>
        <div class="footer">Trần Thị Mỹ Hạnh - 22632991 - PHP</div>
    </div>
</body>
</html>