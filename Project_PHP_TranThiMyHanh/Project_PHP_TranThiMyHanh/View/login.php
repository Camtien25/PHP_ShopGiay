<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="View/css/main.css">
    <title>Đăng Nhập</title>
</head>
<body>
    <div class="login-container">
        <h2>ĐĂNG NHẬP</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="txtUserName">Tên đăng nhập:</label>
                <input type="text" name="txtUserName" required>
            </div>
            <div class="form-group">
                <label for="txtPassword">Mật khẩu:</label>
                <input type="password" name="txtPassword" required>
            </div>
            <button type="submit" class="btn" name="btnLogin">Đăng nhập</button>
            <button type="reset" class="btn" name="btnReset">Làm lại</button>
        </form>
    </div>


    <?php
        if(isset($_POST["btnLogin"])){
            include("Controller/cUser.php");
            $p = new controlUser();
            $p->cLogin($_POST["txtUserName"], $_POST["txtPassword"]);
        }       
    ?>
</body>
</html>
