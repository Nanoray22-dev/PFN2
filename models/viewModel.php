<?php

class ViewModel
{
    private $conexion;
    protected $table;

    public function __construct()
    {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

        try {
            $this->conexion = new mysqli(
                $config["db_host"],
                $config["db_username"],
                $config["db_password"],
                $config["db_name"],
                $config["db_port"]
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function all()
    {
        $rs = $this->conexion->query("SELECT * FROM {$this->table}");
        $data = $rs->fetch_All(MYSQLI_ASSOC);
        return $data;
    }

    public function allMaestro()
    {
        $sql = 'SELECT usuarios.id, usuarios.nombre AS nombre_maestro, usuarios.correo, 
        usuarios.direccion, usuarios.fecha_nac, usuarios.rol_id, usuarios.clase_id, 
        usuarios.estatus, clases.id AS id_clases, clases.nombre AS nombre_clase FROM 
        usuarios LEFT JOIN clases ON clases.id = usuarios.clase_id WHERE usuarios.rol_id = 2;';
        $rs = $this->conexion->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function allAdmin()
    {
        $rs = $this->conexion->query("SELECT count(*) FROM usuarios INNER JOIN roles 
        on usuarios.rol_id = roles.id WHERE roles.nombre = 'Admin' ");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function allClases()
    {
        $sql = "SELECT 
        clases.id AS clase_id,
        clases.nombre AS clase_nombre,
        usuarios.nombre AS maestro_nombre
    FROM
        clases 
    LEFT JOIN usuarios  ON
        usuarios.clase_id = clases.id
    GROUP BY
        clases.id,
        usuarios.nombre ";
        $rs = $this->conexion->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function allClasesCount(){
        $rs = $this->conexion->query("SELECT count(*) FROM clases");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function allAlumnos()
    {
        $sql = "SELECT usuarios.id, usuarios.dni, usuarios.nombre, usuarios.correo, usuarios.direccion, usuarios.fecha_nac, usuarios.rol_id, usuarios.clase_id, usuarios.estatus  FROM usuarios 
        WHERE usuarios.rol_id = 3 ";
        $rs = $this->conexion->query($sql);
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function allUser()
    {
        $rs = $this->conexion->query("SELECT count(*) FROM usuarios");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function allMaestroUser()
    {
        $rs = $this->conexion->query("SELECT count(*) FROM usuarios 
        INNER JOIN roles ON usuarios.rol_id = roles.id
        WHERE roles.nombre = 'Maestro'");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function allAlumnosUser()
    {
        $rs = $this->conexion->query("SELECT count(*) FROM usuarios 
        INNER JOIN roles on usuarios.rol_id = roles.id
        WHERE roles.nombre = 'Alumno'");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function find($id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        return $data;
    }


    public function create($data)
    {
        try {
            $clave = array_keys($data);
            $claveStrig = implode(", ", $clave);
            $value = array_values($data);
            $valuesString = implode("', '", $value);

            $query = "INSERT INTO {$this->table}($claveStrig) values ('$valuesString')";
            $rs = $this->conexion->query($query);

            if ($rs) {
                $ultimoId = $this->conexion->insert_id;
                $data = $this->find($ultimoId);
                return $data;
            } else {
                return "no se puede crear el registro";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

   public function update($data)
{

    try {
        if (!isset($data['id'])) {
            throw new Exception("Error: El índice 'id' es obligatorio para la actualización.");
        }


        $updatePairs = [];
        foreach ($data as $key => $value) {

            if ($key !== 'id') {
                $updatePairs[] = "$key = '$value'";
            }
        }


        if (empty($updatePairs)) {
            throw new Exception("Error: No hay campos para actualizar.");
        }


        $updateString = implode(', ', $updatePairs);


        $query = "UPDATE `usuarios` SET $updateString WHERE `id` = {$data['id']}";


        $updateId = $this->conexion->prepare($query);
        $updateId->execute();


        return true;
    } catch (Exception $e) {
        throw new Exception("Error al actualizar usuario: " . $e->getMessage());
    }

}

    
    public function delete($id)
    {
        $query = 'DELETE FROM usuarios WHERE id = ?';
       
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function login($A, $B, $operator, $value, $password)
    {
        $query = "SELECT usuarios.clase_id, usuarios.id, usuarios.nombre, usuarios.correo, usuarios.password, roles.nombre AS Rol, usuarios.rol_id, usuarios.estatus FROM usuarios 
            INNER JOIN roles  ON roles.id = usuarios.rol_id WHERE $A $operator '$value' and $B $operator '$password'";

        $rs = $this->conexion->query("$query");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function where($column, $operator, $value)
    {
        $res = $this->conexion->query("SELECT * FROM {$this->table} WHERE $column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function __toString()
    {
        return 'Output';
    }
    public function claseDeMaestro($id){
        $query = 'SELECT  * FROM clases WHERE  id = ?';
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        return $data;
    }
}