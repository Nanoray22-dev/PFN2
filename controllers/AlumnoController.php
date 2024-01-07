<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/User.php';

class AlumnoController{
    protected $model;

    public function __construct(){
        $this->model = new User();
    }
    public function index(){
        $alumnos = $this->model->allAlumnos();
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_read.php';
    }
    public function create(){
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_create.php';
    }
    public function edit($id){
        $alumnos = $this->model->find('id', $id);
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_edit.php';
        
    }

    public function update($request){


        $this->model->update($request);
        header('location: /alumnos');
    }
    public function store($request){
        $response = $this->model->create($request);
        header('location: /alumnos');
    }

    public function delete($id){

        $this ->model->delete($id);
        header('location: /alumnos');
    }
}

// $alumnosController = new AlumnoController();
// $alumnosController->delete(1);