<?php
    include_once("mConnect.php");
    class modelCategory{
        public function selectAllCategory(){
            $p = new clsConnect();
            $conn = $p->mOpen();
            if ($conn) {
                $strCategory = "SELECT * FROM categogy";
                $tblCategory = $conn->query($strCategory);
                $p->mClose($conn);
                return $tblCategory;
            } else {
                return false;
            }
        }
    }
?>