<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class PermisoController{
    protected $model;

    public function __construct(){
        $this-> model = new User();
    }

    public function index(){
        $permisos = $this ->model->all();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/permisos_read.php";
    }
    public function edit($id){
        $permisos = $this ->model->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/permisos_edit.php";
    }
    public function update($resquest){
        $this->model->update($resquest);

        header("Location: /permisos");
    }
    public function store($request){
        $response = $this ->model->create($request);
        header("Location: /permisos");

    }
}
