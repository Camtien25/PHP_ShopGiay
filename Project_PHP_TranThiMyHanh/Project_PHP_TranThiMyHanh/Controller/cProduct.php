<?php
    include("Model/mProduct.php"); 
    class controlProduct {  
        public function getAllProduct() {
            $p = new modelProduct();
            return $p->selectAllProduct();
        }        
        public function getAllProductByCategory($category_id) {
            $p = new modelProduct();
            return $p->selectProductByCategory($category_id);
        }  
        public function searchProducts($productName) {
            $p = new modelProduct();
            return $p->searchProductByName($productName);
        }
        public function getAllCategory() {
            $p = new modelProduct();
            return $p->selectAllCategory();
        } 
        public function getProductById($id) {
            $p = new modelProduct();
            return $p->selectProductById($id);
        }
        public function updateProduct($id, $name, $price, $image, $category_id) {
            $p = new modelProduct();
            return $p->updateProduct($id, $name, $price, $image, $category_id);
        }
        public function deleteProduct($id) {
            $p = new modelProduct();
            return $p->deleteProductById($id);
        }  
        public function addProduct($name, $price, $image, $category_id) {
            $p = new modelProduct();
            return $p->insertProduct($name, $price, $image, $category_id);
        }     
    }
?>
