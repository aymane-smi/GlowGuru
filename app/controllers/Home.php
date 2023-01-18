<?php
    class Home extends Controller{
        public function __construct(){}

        public function index(){
            $this->view("Home");
        }

        public function products(){
            $this->view("Products");
        }
    }
?>