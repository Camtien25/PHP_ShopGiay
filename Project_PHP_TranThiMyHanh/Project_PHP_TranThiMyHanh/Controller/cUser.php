<?php
    include("Model/mUser.php");
    class controlUser{
        public function cLogin($userName, $password){
            $p = new modelUser();
            $password = md5($password);
            $tblUser = $p -> mLogin($userName, $password);
            if(!$tblUser){
                echo "<script>alert('Loi ket noi!')</script>";
            }else if ($tblUser && $tblUser->num_rows > 0) {
                $row = $tblUser->fetch_assoc();
                $_SESSION["Login"] = true;
                $_SESSION["UserName"] = $row["UserName"];
                $_SESSION["IDUser"] = $row["IDUser"];
                $_SESSION["IDRole"] = $row["IDRole"]; // 👈 Thêm dòng này
                echo "<script>alert('Đăng nhập thành công!')</script>";
                header("refresh:0.5; url=index.php");
            }else{
                echo "<script>alert('Sai thong tin dang nhap')</script>";
            }
            header("refresh:0.5; url=index.php");
        }
        public function cRegis($userName, $password){
            $p = new modelUser();
            $password = md5($password);// cách để mã hóa 
            $tblUser = $p->mRegis($userName, $password);
            if($tblUser == 2){
                echo "<script>alert('Tài khoản đã tồn tại!')</script>";
            } else if($tblUser == 5){
                echo "<script>alert('Lỗi kết nối!')</script>";
            }
            else if($tblUser == 3){
                echo "<script>alert('Đăng ký thành công!')</script>";
            } else {
                echo "<script>alert('Không thể thêm tài khoản!')</script>";
            }
            // header("refresh:0.5; url=index.php");
        }
    }
?>