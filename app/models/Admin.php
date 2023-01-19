<?php
class Admin
{
    private $db;
    public function __construct()
    {
        $this->db  = new DB();
    }

    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM admin WHERE username = :username");
        $this->db->bind(":username", $username);
        $row = $this->db->single();
        if (password_verify($password, $row->password))
            return $row;
        else
            return false;
    }

    public function signup($username, $password)
    {
        $option = [
            "cost" => 12,
        ];
        $this->db->query("INSERT INTO admin(username, password) VALUES(:username, :password)");
        $this->db->bind(":username", $username);
        $this->db->bind(":password", password_hash($password, PASSWORD_BCRYPT, $option));
        $this->db->execute();
    }

    public function edit($id, $username, $password = "")
    {
        $this->db->query("UPDATE admin SET username = :username WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":username", $username);
        $this->db->execute();
        if ($password === "") {
            $this->db->query("UPDATE admin SET password = :password WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->bind(":password", $password);
            $this->db->execute();
        }
    }
}
