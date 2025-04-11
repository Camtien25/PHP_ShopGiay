<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
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
    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    $p = new controlProduct();
    $products = $p->searchProducts($keyword);
?>
<h2>Kết quả tìm kiếm cho: <i><?= htmlspecialchars($keyword) ?></i></h2>
<div class="product-list">
    <?php
    if ($products && $products->num_rows > 0) {
        while ($row = $products->fetch_assoc()) {
            echo '<div class="product-item">';                     
            echo '<img src="View/img/img_prod/' . $row["Image"] . '" alt="' . $row["ProductName"] . '" style="width: 170px; height: 150px; border-radius: 5px;">';
            echo '<h3>' . $row["ProductName"] . '</h3>';
            echo '<p><b>' . number_format($row["Price"], 0, ',', '.') . '.000 VND</b></p>';
            echo '</div>';
        }
    } else {
        echo "<p>Không tìm thấy sản phẩm phù hợp.</p>";
    }
    ?>
</div>
</body>
</html>
