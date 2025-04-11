<?php
    // if (!isset($_SESSION["Login"]) || $_SESSION["Login"] !== true) {
    //     echo "<script>alert('Bạn cần đăng nhập để xem sản phẩm!'); window.location.href='index.php?act=login';</script>";
    //     exit();
    // }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-item {
            padding: 20px;
            border-radius: 10px;
            text-align: center;  
            transition: transform 0.3s ease-in-out;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }
        .product-item:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <?php
        include(__DIR__ . "/../Controller/cProduct.php");
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $p = new controlProduct();
            $products = $p->getAllProductByCategory($category_id);
        } else {
            $products = false;
        }
        ?>
        <div class="product-list">
            <?php
            if ($products && $products->num_rows > 0) {
                while ($row = $products->fetch_assoc()) {
                    echo '<div class="product-item">';                     
                    echo '<img src="' . $row["Image"] . '" alt="' . $row["ProductName"] . '" style="width: 170px; height: 150px; border-radius: 5px;">';
                    echo '<h3 style="margin: 10px 0; color: #333; font-size: 18px;">' . $row["ProductName"] . '</h3>';
                    echo '<p style="color: black; font-size: 16px;"><b>' . number_format($row["Price"], 0, ',', '.') . ' VND</b></p>';
                    echo '</div>';
                }
            } else {
                echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
            }
            ?>
        </div>
</body>
</html>
