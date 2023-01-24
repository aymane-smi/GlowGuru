<?php
class Dashboard extends Controller
{
    private $Product;
    private $Admin;

    public function __construct()
    {
        session_start();
        if (empty($_SESSION))
            header("Location: /Login");
        $this->Product = $this->model("ProductModel");
        $this->Admin = $this->model("Admin");
    }

    public function createDefaultAdmin()
    {
        $this->Admin->signup("admin", "admin");
    }

    public function editAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->Admin->edit($_POST["id"], $_POST["username"], $_POST["password"]);
        }
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST["names"] = json_decode($_POST["names"]);
            $_POST["prices"] = json_decode($_POST["prices"]);
            $_POST["descriptions"] = json_decode($_POST["descriptions"]);
            $_POST["categories"] = json_decode($_POST["categories"]);
            echo json_encode($_FILES);
            for ($i = 0; $i < count($_POST["names"]); $i++) {
                $this->Product->createProduct($_POST["names"][$i], $_POST["prices"][$i], $_POST["categories"][$i], $_FILES["images"]["name"][$i], $_POST["descriptions"][$i]);
                move_uploaded_file($_FILES['images']['tmp_name'][$i], "/var/www/html/public/src/images/" . $_FILES['images']['name'][$i]);
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
            "admin" => $this->Admin->getAdminById($_SESSION["user_id"]),
        ];
        $this->view("Dashboard", $data);
    }

    public function deleteProduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->Product->deleteProductById($id);
        }
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_destroy();
            header("Location: /Login");
        }
    }

    public function Product($id)
    {
        echo json_encode($this->Product->getProductById($id));
    }

    public function Products()
    {
        echo json_encode($this->Product->getAllProduct());
    }
}
