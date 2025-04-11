<?php
    include_once("Controller/cProduct.php");
    $p = new controlProduct();
    $categories = $p->getAllCategory();
?>
<h2>Chỉnh sửa sản phẩm</h2>
<form action="admin.php?act=edit_product&id=<?= $product['IDProduct'] ?>" method="post" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="ProductName" value="<?= $product['ProductName'] ?>" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="Price" value="<?= $product['Price'] ?>" required><br><br>

    <label>Ảnh hiện tại:</label><br>
    <img src="View/img/img_prod/<?= $product['Image'] ?>" width="100"><br><br>
    
    <label>Ảnh mới (nếu có):</label><br>
    <input type="file" name="Image"><br><br>
    <label>Danh mục:</label><br>
    <select name="category_id" required>
        <?php
        while ($row = $categories->fetch_assoc()) {
            $selected = ($row['category_id'] == $product['category_id']) ? "selected" : "";
            echo "<option value='{$row['category_id']}' $selected>{$row['name']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit" name="update">Cập nhật sản phẩm</button>
    <?php
        include_once("Controller/cUpload.php");
        $uploader = new controlUpload(); // Tạo đối tượng upload

        if (isset($_POST['update'])) {
            $ProductName = $_POST["ProductName"];
            $Price = $_POST["Price"];
            $category_id = $_POST["category_id"];

            // Giữ ảnh cũ nếu không có ảnh mới
            $image = $product['Image'];

            // Nếu có chọn ảnh mới thì xử lý upload
            if (isset($_FILES['Image']) && $_FILES['Image']['name'] != '') {
                $uploadResult = $uploader->uploadImage('Image');
                if ($uploadResult['success']) {
                    $image = $uploadResult['filename'];
                } else {
                    echo "<script>alert('{$uploadResult['message']}');</script>";
                }
            }

            // Gọi hàm cập nhật sản phẩm
            $p->updateProduct($_GET['id'], $ProductName, $Price, $image, $category_id);

            // ✅ Chuyển về danh sách sản phẩm sau khi cập nhật
            header("Location: admin.php?act=list_product");
            exit();
        }
    ?>
</form>
