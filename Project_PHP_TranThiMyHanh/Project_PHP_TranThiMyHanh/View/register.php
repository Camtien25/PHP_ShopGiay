<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="View/css/main.css">
    <title>Đăng Ký</title>
</head>
<body>
    <div class="login-container">
        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
        <form action="#" method="POST" name="form-register">
            <div class="form-group">
                <label for="txtUserName">Tên đăng nhập:</label>
                <input type="text" name="txtUserName" required>
            </div>
            <div class="form-group">
                <label for="txtPassword">Mật khẩu:</label>
                <input type="password" id="password" name="txtPassword" required>
            </div>
            <div class="form-group">
                <label class="txtPassword">Xác nhận mật khẩu:</label>
                <input type="password" id="repassword" name="txtRePassword" placeholder="Nhập lại mật khẩu" required>
            </div>
            <button type="submit" class="btn" name="btnRegis">Đăng ký</button>
            <button type="reset" class="btn" name="btnReset">Làm lại</button>
        </form>
    </div>

    <Script>
        document.querySelector("form").addEventListener("submit", function(e) {
            let password = document.getElementById("password").value;
            let repassword = document.getElementById("repassword").value;

            if (password !== repassword) {
                e.preventDefault();
                alert("Mật khẩu và xác nhận mật khẩu phải giống nhau!");
            }
        });
</script>

    </Script>

    <?php
        if(isset($_POST["btnRegis"])){
            include("Controller/cUser.php");
            $p = new controlUser();
            $p->cRegis($_POST["txtUserName"], $_POST["txtPassword"]);
        }
    ?>
</body>
</html>
