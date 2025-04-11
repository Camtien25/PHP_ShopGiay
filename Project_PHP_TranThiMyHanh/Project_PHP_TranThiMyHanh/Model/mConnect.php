<?php
    class clsConnect{
        public function mOpen(){
            $host = "localhost";
            $user = "NgocTien";
            $pass = "Tien250104";
            $db = "bangiay";
            return $conn = mysqli_connect($host, $user, $pass, $db);
        }
        public function mClose($conn){
            $conn->close();
        }        
    }
?>