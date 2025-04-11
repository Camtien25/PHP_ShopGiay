<?php
    include("mConnect.php");
    class modelUser{
        public function mLogin($userName, $password){
            $strLogin = "Select * From User Where UserName = '$userName' and Password = '$password'";
            $p = new clsConnect();
            $conn = $p-> mOpen();
            if ($conn){
                return $conn->query($strLogin);
            } else{
                return false;
            }
            $p->mClose($conn);
        }
        public function mRegis($userName, $password){
            $p = new clsConnect();
            $conn = $p->mOpen();
            $checkName = "Select UserName from User where UserName = '$userName'";
            $resultCheck = $conn ->query($checkName);
            if($resultCheck->num_rows >0){
                return 2; // dl tôn tai
            }else{
                $strRegis = "Insert into User(UserName, Password) values('$userName', '$password')";
                if($conn){ 
                    $checkRegis = $conn->query($strRegis);
                    if($checkRegis){
                        return 3; // them ok
                    }else{
                        return 4; // kh them dc
                    }
                }else{
                    return 5; // loi ket noi
                }
                $p->mClose($conn);
            }
        }
    }
?>