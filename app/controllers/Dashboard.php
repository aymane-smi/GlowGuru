<?php
    class Dashboard extends Controller{
        private $Product;

        public function __construct(){
            $this->Product = $this->model("Product");
        }

        public function addProduct(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->Product->createProduct($_POST["name"], $_POST["price"], $_POST["category"], $_FILES["image"]["name"], $_POST["description"]);
                echo "created post";
            }
        }
    }
?>