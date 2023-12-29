<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/User.php';

class AlumnoController{
    protected $user;

    public function __construct(){
        $this->user = new User();
    }
    public function index(){
        $alumnos = $this->user->allAlumnos();
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_read.php';
    }
    public function create(){
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_create.php';
    }
    public function edit($id){
        $alumnos = $this->user->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . '/views/alumnos_edit.php';
        
    }

    public function update($request){
        $this->user->update($request);
        header('location : /alumnos');
    }
    public function store($request){
        $response = $this->user->create($request);
        header('location : /alumnos');
    }

    public function delete($id){
        $this ->user->delete($id);
        header('location : /alumnos');
    }
}
