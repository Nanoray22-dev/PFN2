<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/LoginController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/HomeController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/PermisoController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/MaestroController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/ClaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/controllers/AlumnoController.php");

$loginEnrutador = new LoginController();
$homeEnrutador = new HomeController();
$permisoEnrutador = new PermisoController();
$maestroEnrutador = new MaestroController();
$clasesEnrutador = new ClaseController();
$alumnosEnrutador = new AlumnoController();

$route = explode("?", $_SERVER["REQUEST_URI"]);
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    switch ($route[0]) {
        case '/login':
            $loginEnrutador->login($_POST["email"], $_POST["password"]);
            break;
        case '/permisos/create':
            $permisoEnrutador->store($_POST);
            break;

        case '/permisos/update':
            $permisoEnrutador->update($_POST);
            break;
        case '/maestros/create';
            $maestroEnrutador->store($_POST);
            break;
        case '/maestros/edit';
            $maestroEnrutador->update($_POST);
            break;
            case '/maestros/update';
            $maestroEnrutador->update($_POST);
        case '/maestros/delete';
            $maestroEnrutador->delete($_POST["$id"]);
        case '/clases/delete';
            $clasesEnrutador->delete($_POST["$id"]);
            break;
        case '/clases/create';
            $clasesEnrutador->store($_POST);
            break;
        case '/clases/update':
            $clasesEnrutador->update($_POST);
            break;
        case '/alumnos/delete':
            $alumnosEnrutador->delete($_POST["id"]);
            break;

        case '/alumnos/create':
            $alumnosEnrutador->store($_POST);
            break;

        case '/alumnos/update':
            $alumnosEnrutador->update($_POST);
            break;


        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route[0]) {
        case '/index.php':
            $loginEnrutador->index();
            break;
        case '/dashboard':
            $loginEnrutador->dashboard();
            break;
        case '/permisos':
            $permisoEnrutador->index();
            break;
        case '/permisos/edit':
            $permisoEnrutador->edit($_GET["id"]);
            break;
        case '/maestros';
            $maestroEnrutador->index();
            break;
        case '/maestros/create';
            $maestroEnrutador->create();
            break;
        case '/maestros/edit';
            $maestroEnrutador->edit($_GET["id"]);
        case '/clases';
            $clasesEnrutador->index();
            break;
        case 'clases/create';
            $clasesEnrutador->create();
            break;
        case 'clases/edit';
            $clasesEnrutador->edit($_GET["id"]);
        case '/alumnos';
            $alumnosEnrutador->index();
            break;
        case '/alumnos/edit';
            $alumnosEnrutador->edit($_GET["id"]);
            break;
        case '/alumnos/create';
            $alumnosEnrutador->create();
            break;
        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

// session_start();

if (isset($_SESSION['user'])) {
    $usuario = $_SESSION['user'];
    $alumnos = ['clases' => 'index.php?'];
    $noAdministador = ['clases' => 'index.php?', 'alumnos' => 'index.php?',];
    $Administador = ['Permisos' => 'index.php?', 'Maestros' => 'index.php?', 'Alumnos' => 'index.php?', 'Clases' => 'index.php?',];

    if ($usuario['rol_id'] === 1) {
        $menu = $Administador;
    } else if ($usuario['rol_id'] === 2) {
        $menu = $noAdministador;
    } else if ($usuario['rol_id'] === 3) {
        $menu = $alumnos;
    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>University</title>
</head>

<body>


</body>

</html>