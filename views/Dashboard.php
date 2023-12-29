


<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/viewModel.php";



if (isset($_SESSION['user'])) {
    $usuario = $_SESSION['user'];
    $alumnos = ['clases'];
    $noAdministador = ['clases', 'alumnos'];
    $Administador = ['Permisos','Maestros' , 'Alumnos', 'Clases'];

    if ($usuario['rol_id'] === 1) {
        $menu = $Administador;
    } else if ($usuario['rol_id'] === 2) {
        $menu = $noAdministador;
    } else if ($usuario['rol_id'] === 3) {
        $menu = $alumnos;
    }
}

$rol = $_SESSION["user"]["Rol"];
$usuarios = $_SESSION["user"];
$user = $_SESSION["user"]["nombre"];
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/0437d276a3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-FpGwFfDQVSAe0PxPIBJ1jpHzeIOVYlOQTprWqI6Vq5rUpv9vO8RQHwV8g/5URz1GJ9nrXypKOmPBc19m/+M+sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/Admin_maestro.css">
    <link href="../css/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar-header {
            background-color: rgb(255, 255, 255);
            padding-left: 25px;
            display: flex;
            justify-content: space-between;
            color: black;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .burger-menu {
            font-size: 24px;
            cursor: pointer;
        }

        .navbar-container {
            display: flex;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            padding-top: 20px;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            padding: 8px;
            margin-left: 12px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
        }

        .content {
            flex: 1;
            background-color: rgb(245, 246, 249);
        }

        .navbar-header {
            display: flex;
            gap: 1050px;

        }

        .header {
            justify-content: space-between;
            display: flex;
            padding-right: 200px;
        }

        h4 {
            text-align: center;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid gray;
        }

        .sidebar-header img {
            width: 40px;
            margin-right: 10px;

        }

        h1 {
            margin-left: 20px;
        }

        .Dashboard {
            background-color: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .Dashboard {
            color: #333;
            font-size: 24px;
            /* margin-bottom: 10px; */
        }

        .Dashboard {
            color: #666;
            font-size: 16px;
        }

        /* .header-Dasbord {

            display: flex;
            justify-content: space-between;
        } */

        /* .header-Dasbord>p {
            padding-top: 22px;
        } */

        .breadcrumbs {
            display: flex;
            justify-content: space-between;
        }

        ol.breadcrumb.bread {
            padding-right: 24px;
            padding-top: 14px;
            text-decoration: none;
        }

        .breadcrumb-item {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Universidad</h1>
            <div class="flex justify-center">
                <div class="">
                    <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4" src="../assets/logo.jpeg" alt="">
                    <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?php echo $user?></p>
                </div>
            </div>

            <ul class="side-bar-side">
                <h4 class="admin">Menu Administracion</h4>

                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">Home</i>
                    <a href="/dashboard">Home</a>
                </li>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">security</i>
                    <a href="/permisos">Permisos</a>
                </li>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined logOutText">group</i>
                    <a href="/maestros">Maestros</a>
                </li>

                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">school</i>
                    <a href="/alumnos">Alumnos</a>
                </li>

                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">book</i>
                    <a href="/clases">Clases</a>
                </li>

            </ul>
        </div>

        <!-- navbar principal -->
        <div class="content">
            <div class="navbar-header">
                    <div class="burger-menu">&#9776; Home</div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link link-user dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $rol; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard">Home</a></li>
                                <li><a class="dropdown-item" href="/index.php">Logout</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>

            </div>


            <nav aria-label="breadcrumb" class="breadcrumbs">
                <h1>Dashboard</h1>
                <ol class="breadcrumb bread">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>

            <div class="Dashboard">
                <div class="header-Dasbord">
                    <h5>Bievenido</h5>
                    <p>Seleciona la accion que quieras realizar en la pestaña de la izquierda</p>

                </div>

            </div>
        </div>
    </div>
</body>

</html>