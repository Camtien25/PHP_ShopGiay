<?php
    class controlUpload{
        function uploadImage($fileInputName) {
            $uploadDir = "View/img/img_prod/";
            $maxSize = 5;
            if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
                return ["success" => false, "message" => "Không có file được tải lên."];
            }

            $file = $_FILES[$fileInputName];
            $fileName = basename($file["name"]);
            $fileSize = $file["size"];
            $fileTmp = $file["tmp_name"];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Danh sách đuôi file hợp lệ
            $allowed = ["jpg", "jpeg", "png", "gif", "webp"];

            // Kiểm tra đuôi
            if (!in_array($fileExt, $allowed)) {
                return ["success" => false, "message" => "Chỉ cho phép định dạng ảnh: jpg, jpeg, png, gif, webp."];
            }

            // Kiểm tra kích thước
            if ($fileSize > $maxSize * 1024 * 1024) {
                return ["success" => false, "message" => "Dung lượng ảnh không được vượt quá {$maxSize}MB."];
            }

            // Tạo tên mới để tránh trùng
            $newFileName = uniqid("img_") . "." . $fileExt;
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $destination)) {
                return ["success" => true, "filename" => $newFileName];
            } else {
                return ["success" => false, "message" => "Tải ảnh thất bại."];
            }
        }
    }
?>
