<?php
    include_once("Controller/cProduct.php");
    include_once("Controller/cUpload.php");

    $p = new controlProduct();
    $uploader = new controlUpload();
    $categories = $p->getAllCategory(); // Lấy danh mục từ DB

    if (isset($_POST['add'])) {
        $name = $_POST["ProductName"];
        $price = $_POST["Price"];
        $category_id = $_POST["category_id"];

        $image = '';
        if (isset($_FILES['Image']) && $_FILES['Image']['name'] != '') {
            $uploadResult = $uploader->uploadImage('Image');
            if ($uploadResult['success']) {
                $image = $uploadResult['filename'];
            } else {
                echo "<script>alert('{$uploadResult['message']}');</script>";
            }
        }

        $addProd = $p->addProduct($name, $price, $image, $category_id);
        if ($addProd) {
            header("Location: admin.php?act=list_product");
            exit;
        } else {
            echo "<script>alert('Thêm sản phẩm thất bại!');</script>";
        }
    }
?>

<!-- Giao diện form thêm -->
<h2 style="text-align: center;">Thêm sản phẩm mới</h2>
<form action="admin.php?act=add_product" method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="ProductName" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="Price" required><br><br>

    <label>Ảnh:</label><br>
    <input type="file" name="Image" required><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        <?php
            while ($row = $categories->fetch_assoc()) {
                echo "<option value='{$row['category_id']}'>{$row['name']}</option>";
            }
        ?>
    </select><br><br>

    <button type="submit" name="add">Thêm sản phẩm</button>
</form>
