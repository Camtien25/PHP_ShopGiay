<?php
    include("Model/mCategory.php");
    class controlCategory{
        public function getAllCategory(){
            $p = new modelCategory();
            $tblCategory = $p->selectAllCategory();
            return $tblCategory;
        }
    }
?>