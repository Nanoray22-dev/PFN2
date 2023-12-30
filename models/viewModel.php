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
    }

    public function find($id)
    {
        // Utiliza una sentencia preparada para evitar la inyección de SQL
        $stmt = $this->conexion->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        
        // Vincula el parámetro
        $stmt->bind_param("i", $id);
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Obtiene el resultado
        $result = $stmt->get_result();
        
        // Obtiene los datos como un array asociativo
        $data = $result->fetch_all(MYSQLI_ASSOC);
        
        // Cierra la sentencia preparada
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
        // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
        $updatePairs = [];

        foreach ($data as $key => $value) {
            $updatePairs[] = "$key = '$value'";
        }

        session_start();

        $query = "UPDATE `usuarios` SET `rol_id `= ? WHERE correo = ? ";

        try {
            $updateId = $this->conexion->prepare($query);
            $updateId->execute([$data]);
            $rs = $updateId->fetch(MYSQLI_ASSOC);
            return $rs;
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM usuarios WHERE id = $id";
        try {
            $data = $this ->conexion->prepare($query);
            $data -> execute([$id]);

        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function login($A, $B, $operator, $value, $password)
    {
        $query = "SELECT usuarios.id, usuarios.nombre, usuarios.correo, usuarios.password, roles.nombre AS Rol, usuarios.rol_id, usuarios.estatus FROM usuarios 
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
}
