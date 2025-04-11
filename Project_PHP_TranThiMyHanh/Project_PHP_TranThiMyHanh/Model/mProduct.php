<?php
    include("mConnect.php");

    class modelProduct {
        public function selectAllProduct() {
            $p = new clsConnect();
            $conn = $p->mOpen();
            if ($conn) {
                $strProduct = "SELECT * FROM product";
                $tblProduct = $conn->query($strProduct);
                $p->mClose($conn);
                return $tblProduct;
            } else {
                return false;
            }
        }
        public function selectProductByCategory($category_id) {
            $p = new clsConnect();
            $conn = $p->mOpen();
            if ($conn) {
                $strProductByID = "SELECT * FROM product WHERE category_id = '$category_id'";
                $tblProductByID = $conn->query($strProductByID);
                $p->mClose($conn);
                return $tblProductByID;
            } else {
                return false;
            }
        }  
        public function searchProductByName($productName) {
            $p = new clsConnect();
            $conn = $p->mOpen();
            $productName = $conn->real_escape_string($productName);
            $sql = "SELECT * FROM product WHERE ProductName LIKE '%$productName%'";
            $result = $conn->query($sql);
            $p->mClose($conn);
            return $result;
        } 
        public function selectAllCategory() {
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
        public function selectProductById($id) {
            $conn = (new clsConnect())->mOpen();
            $sql = "SELECT * FROM product WHERE IDProduct = '$id'";
            return $conn->query($sql);
        }
        public function updateProduct($id, $name, $price, $image, $category_id) {
            $conn = (new clsConnect())->mOpen();
            $sql = "UPDATE product SET ProductName='$name', Price='$price', Image='$image', category_id='$category_id' WHERE IDProduct='$id'";
            return $conn->query($sql);
        }
        public function deleteProductById($id) {
            $conn = (new clsConnect())->mOpen();
            $sql = "DELETE FROM product WHERE IDProduct = '$id'";
            return $conn->query($sql);
        }
        public function insertProduct($name, $price, $image, $category_id) {
            $conn = (new clsConnect())->mOpen();
            $sql = "INSERT INTO product(ProductName, Price, Image, category_id) VALUES ('$name', '$price', '$image', '$category_id')";
            return $conn->query($sql);
        }
    }
?>
