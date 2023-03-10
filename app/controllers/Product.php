<?php
class Product extends Controller
{

    private $Product;

    public function __construct()
    {
        $this->Product = $this->model("ProductModel");
    }


    public function index()
    {
        $data = [
            "products" => $this->Product->getAllProduct(),
        ];
        $this->view("Products", $data);
    }

    public function findByCategory($category)
    {
        if ($category === "all") {
            echo json_encode($this->Product->getAllProduct());
        } else {
            echo json_encode($this->Product->getProductByCategory($category));
        }
    }

    public function findBySearch($search)
    {
        echo json_encode($this->Product->getProductBySearch($search));
    }
}
