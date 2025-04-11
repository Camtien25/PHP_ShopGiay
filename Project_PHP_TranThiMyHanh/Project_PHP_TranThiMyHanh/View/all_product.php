<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tất Cả Sản Phẩm</title>
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
        $p = new controlProduct();
        $products = $p->getAllProduct();
    ?>
    <h2 style="text-align: center;">Chào mừng đến với Fast Food!</h2>
<div class="product-list">
    <?php
    if ($products && $products->num_rows > 0) {
        while ($row = $products->fetch_assoc()) {
            echo '<div class="product-item">';                     
            echo '<img src="View/img/img_prod/' . $row["Image"] . '" alt="' . $row["ProductName"] . '" style="width: 170px; height: 150px; border-radius: 5px;">';
            echo '<h3 style="margin: 10px 0; color: #333; font-size: 18px;">' . $row["ProductName"] . '</h3>';
            echo '<p style="color: black; font-size: 16px;"><b>' . number_format($row["Price"], 0, ',', '.') . '.000 VND</b></p>';
            echo '</div>';
        }
    } else {
        echo "<p>Không có sản phẩm nào.</p>";
    }
    ?>
</div>
</body>
</html>
