<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/list_css.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once("Controller/cProduct.php");
        $p = new controlProduct();
        $tblProduct = $p->getAllProduct();
    ?>
    <div class="adside" >
        <h2 style="flex: 1; text-align: center; margin: 0;">Danh sách sản phẩm</h2>
        <a class="add" href="admin.php?act=add_product" >Thêm sản phẩm</a>
    </div>
    <table class="table" border="1" cellpadding="5" cellspacing="0" >
        <tr style="background-color: #f0f0f0;">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Hành động</th>
        </tr>
        <?php
        if ($tblProduct && $tblProduct->num_rows > 0) {
            while ($row = $tblProduct->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='padding: 5px; vertical-align: middle;'>{$row['IDProduct']}</td>";
                echo "<td>{$row['ProductName']}</td>";
                echo "<td>" . number_format($row['Price'], 0, ',', '.') . " VND</td>";
                echo "<td><img src='{$row['Image']}' width='80'></td>";
                echo "<td>{$row['category_id']}</td>";
                echo "<td>
                        <a href='admin.php?act=edit_product&id={$row['IDProduct']}'>Sửa</a> |
                        <a href='admin.php?act=delete_product&id={$row['IDProduct']}' onclick=\"return confirm('Bạn có chắc muốn xóa sản phẩm này?');\">Xóa</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Không có sản phẩm nào.</td></tr>";
        }
        ?>
    </table>
</body>
</html>