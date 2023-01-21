<?php
class Dashboard extends Controller
{
    private $Product;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION))
            header("Location: /Login");
        $this->Product = $this->model("Product");
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->Product->createProduct($_POST["name"], $_POST["price"], $_POST["category"], $_FILES["image"]["name"], $_POST["description"]);
            echo "created post";
        }
    }

    public function editProduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->Product->editProduct($id, $_POST["name"], $_POST["price"], $_POST["category"], "", $_POST["description"]);
            echo "post updated";
        }
    }

    public function index()
    {
        $data = [
            "products" => $this->Product->getAllProduct(),
        ];
        $this->view("Dashboard", $data);
    }

    public function deleteProduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->Product->deleteProductById($id);
        }
    }

    public function findByCategory($category)
    {
        var_dump($this->Product->getProductByCategory($category));
    }

    public function findBySearch($search)
    {
        var_dump($this->Product->getProductBySearch($search));
    }
}
