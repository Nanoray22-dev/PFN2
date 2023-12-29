<?php
class HomeController{
    public function index(){
        include $_SERVER["DOCUMENT_ROOT"] . '/views/template/Dashboard.php';
    }
}