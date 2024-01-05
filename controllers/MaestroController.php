<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';

class MaestroController {
    protected $model;

    public function __construct(){
        $this->model = new User();
    }

    public function index(){
        $maestros = $this->model->allMaestro();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/maestro_read.php";
    }
    public function create(){
        include $_SERVER['DOCUMENT_ROOT'] . '/views/maestro_create.php';

    }
    public function edit($id){
        $maestros = $this->model->find($id);
        include $_SERVER['DOCUMENT_ROOT'] . '/views/maestro_edit.php';
    }
    public function update($request){
        print_r($request);
        //  $this->model->update($request);
        //  header("Location: /maestros");
    }
    public function store($request){
        $response = $this->model->create($request);
        header("Location: /maestros");
    }
    public function delete($id){
        $this->model->delete($id);
        header("Location: /maestros");
    }
        
}
