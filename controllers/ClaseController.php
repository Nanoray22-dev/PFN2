<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/User.php';

class ClaseController {
    protected $model;

    public function __construct(){
        $this->model = new User();
    }
    public function index(){
        $clases = $this ->model->allClases();
        include $_SERVER["DOCUMENT_ROOT"] . '/views/clases_read.php';
    }
    public function create(){
        include $_SERVER["DOCUMENT_ROOT"] . '/views/clases/create.php';
    }
    public function edit(){
        include $_SERVER["DOCUMENT_ROOT"] . '/views/clases/edit.php';
    }
    public function update($request){
        $this ->model->update($request);
        header("location: /clases");
    }
    public function store($request){
        $response = $this->model->create($request);
        header("location: /clases");
    }
    public function delete($id){
        $this->model->delete($id);
        header("location: /clases");
    }

}