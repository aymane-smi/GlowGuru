<?php
class Login extends Controller
{

    private $Admin;

    public function __construct()
    {
        $this->Admin = $this->model("Admin");
    }


    public function index()
    {
        $this->view("Login");
    }

    public function handleLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $row = $this->Admin->login($_POST["username"], $_POST["password"]);
            session_start();
            if ($row) {
                $_SESSION["user_id"] = $row->id;
                header("Location: /Dashboard");
            } else {
                $_SESSION["login_err"] = "mot de pass ou nom d'utilisateur est invalide!";
                header("Location: /Login");
            }
        }
    }

    public function createDefaultAdmin()
    {
        $this->Admin->signup("admin", "admin");
    }
}
