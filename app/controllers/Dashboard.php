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
            $_POST["names"] = json_decode($_POST["names"]);
            $_POST["prices"] = json_decode($_POST["prices"]);
            $_POST["descriptions"] = json_decode($_POST["descriptions"]);
            $_POST["categories"] = json_decode($_POST["categories"]);
            for ($i = 0; $i < count($_POST["names"]); $i++) {
                $this->Product->createProduct($_POST["names"][$i], $_POST["prices"][$i], $_POST["categories"][$i], $_FILES["images"]["name"][$i], $_POST["descriptions"][$i]);
                move_uploaded_file($_FILES['images']['tmp_name'][$i], "/var/www/html/public/src/images" . $_FILES['images']['name'][$i]);
            }
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
