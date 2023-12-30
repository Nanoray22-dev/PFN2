<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class LoginController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }
    
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/login.php";
    }

    public function login($correo, $pass)
    {
        //var_dump($correo, $pass);
        $usuario = $this->model->login("correo","password", "=", $correo, $pass);

        if (count($usuario) === 1) {
           
            session_start();
            $_SESSION["user"] = $usuario[0];

            header("Location: /dashboard");
        } else {
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Invalid login credentials",
                            footer: \'<a href="#">Why do I have this issue?</a>\'
                        });
                    });
                  </script>';

            header("Location: /views/login.php");
        }
    }

    public function dashboard()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "/views/Dashboard.php";
    }
}