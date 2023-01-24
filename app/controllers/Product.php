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
        $this->view("Products");
    }

    public function findByCategory($category)
    {
        echo json_encode($this->Product->getProductByCategory($category));
    }

    public function findBySearch($search)
    {
        echo json_encode($this->Product->getProductBySearch($search));
    }
}
