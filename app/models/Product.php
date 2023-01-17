<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new DB();
        }

        public function createProduct($name, $price, $category, $image, $description){
            $this->db->query("INSERT INTO product(name, price, category, image, description) VALUES(:name, :price, :category, :image, :description)");
            $this->db->bind(":name", $name);
            $this->db->bind(":price", $price);
            $this->db->bind(":category", $category);
            $this->db->bind(":image", $image);
            $this->db->bind(":description", $description);
            $this->db->execute();
        }

        public function editProduct($id, $name, $price, $category, $image = "", $description){
            $this->db->query("UPDATE product SET name = :name, price = :price, description = :description, category = :category WHERE id = :id");
            $this->db->bind(":name", $name);
            $this->db->bind(":id", $id);
            $this->db->bind(":price", $price);
            $this->db->bind(":category", $category);
            //$this->db->bind(":image", $image);
            $this->db->bind(":description", $description);
            $this->db->execute();
            if($image !== ""){
                $this->db->query("UPDATE product SET image = :image WHERE id = :id");
                $this->db->bind(":image", $image);
                $this->db->bind(":id", $id);
                $this->db->execute();
            }
        }

        public function getAllProduct(){
            $this->db->query("SELECT * FROM product");
            return $this->db->resultSet();
        }

        public function deleteProductById($id){
            $this->db->query("DELETE product WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->execute();
        }

        public function getProductByCategory($category){
            $this->db->query("SELECT * FROM product WHERE category = :category");
            $this->db->bind(":category", $category);
            return $this->db->resultSet();
        }


        public function getProductBySearch($search){
            $this->db->query("SELECT * FROM product WHERE name LIKE CONCAT('%', :search, '%')");
            $this->db->bind(":search", $search);
            return $this->db->resultSet();
        }
    }
?>