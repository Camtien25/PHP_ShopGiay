<?php
    session_start();
    $_SESSION = []; // Xóa tất cả biến session
    session_destroy(); // Hủy toàn bộ session
    header("Location: index.php");
    exit();
?>
