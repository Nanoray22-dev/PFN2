<?php

require_once $_SERVER ['DOCUMENT_ROOT'] . '/models/viewModel.php';

class User extends ViewModel{
    protected $table = "usuarios";
    private $conexion;
    public function getUserByCorreo($correo)
    {
        $query = "SELECT * FROM `usuarios` WHERE `correo` = :correo LIMIT 1";
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(':correo', $correo, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>