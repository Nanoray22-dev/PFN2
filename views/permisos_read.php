<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/viewModel.php";
$count = new ViewModel();
$data = $count->allUser();



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
    <link rel="stylesheet" href="./style/Admin_permisos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="../css/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <title>Lista de Permisos</title>
</head>
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
        /* padding-left: 25px; */
    }

    .user-info {
        text-align: right;
        padding-right: 25px;
    }

    .navbar-container {
        display: flex;
        /* height: 100%; */
    }

    .sidebar {
        height: 115vh;
        width: 250px;
        background-color: #333;
        padding-top: 20px;
        color: white;
    }

    .sidebar h1 {
        text-align: center;
        font-size: 2.5rem;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar li {
        padding: 8px;
        margin-left: 22px;
    }

    .sidebar a {
        text-decoration: none;
        color: white;
    }

    .side-bar-side a {
        padding-top: 25px;
        display: inline-flex;
        padding-left: 12px;
    }

    .content {
        flex: 1;
        background-color: rgb(245, 246, 249);
        width: 80%;

        /* margin: 50px auto; */
      /* border: 1px solid #ccc; */
        /* padding: 50px; */
        max-height: 750px;

        overflow-y: auto;
    }


    /* parte interactiva */

    .navbar-header {
        justify-content: space-between;
        gap: 1050px;
    }


    /* .nav-home {
    list-style: none;
    padding-top: 25px;
      } */

    h4 {
        text-align: center;
        font-size: 1.5rem;
    }

    .aTextInteractive {
        text-decoration: none;
        color: #4F4F4F;
        padding-top: 2px;
    }

    .myProfileInteractive {
        padding-top: 12px;
        padding-bottom: 12px;
        padding-right: 12px;
    }

    .myProfileInteractive:hover {
        background-color: #666;
    }

    .aTextInteractiveLog {
        text-decoration: none;
        color: #EB5757;

    }


    /* parte del logo */

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


    /* Dashboard */

    /* h1 {
        margin-left: 20px;
    } */

    .Dashboard {
        background-color: rgb(255, 255, 255);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .Dashboard h1 {
        color: #333;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .Dashboard p {
        color: #666;
        font-size: 16px;
    }

    .navbar-body {
        padding-top: 0px;
        padding-bottom: 14px;
        /* display: flex; */
    }

    .navbar.navbar-expand.navbar-body {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* margin-bottom: 10px; */
        justify-content: center;

    }

    .border-table {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;

    }

    .border-table-action {
        text-align: center;
        justify-content: center;
        align-items: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .dashboar-eyes {
        display: flex;
        justify-items: space-between;
        margin-left: 665px;
        gap: 25px;
    }

    .opcion {
        background-color: #333;
        padding: 5px;
        display: inline-flex;
        gap: 15px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 10px;

    }

    .opcion .option {
        color: white;
        /* font-size: 8px; */
        /* margin-bottom: 10px; */
    }

    .opcion .p {
        color: white;
        /* font-size: 16px; */
    }

    .buscador {
        margin-left: 665px;
    }

    .header-Dasbord {
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
    }

    .header-Dasbord>p {
        padding-top: 22px;
    }

    .header-Dasbord button {
        margin: 15px;
        padding: 5px;
        background-color: rgb(22, 128, 251);
        color: white;
        border: none;
        border-radius: 5px;
    }

    /*  */

    /* Estilo general del formulario */
    form {
        max-width: 400px;
        /* Ajusta el ancho según sea necesario */
        margin: auto;
        padding: 15px;
    }

    /* Estilo de las etiquetas dentro del formulario */
    /*  */

    /* Estilo de los campos de entrada */
    .insert-Container input {
        width: 100%;
        padding: 0.375rem 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    /* Estilo del botón de envío */
    form button {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    /* Estilo del botón de envío al pasar el ratón por encima */
    form button:hover {
        background-color: #0056b3;
        border-color: #004f9b;
    }

    .buscador {
        display: block;
        margin-bottom: 8px;
    }

    /* .search {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    } */

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .modelos {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        height: 300px;
        /* text-align: center; */
    }

    .head-search {
        display: flex;
        padding-left: 350px;
        gap: 2px;
    }

    .head-search>input {
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .square {
        text-decoration: none;
    }

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

    .user-navigation {
        display: flex;
        justify-content: space-between;
    }

    span.User {
        padding-top: 10px;
    }

    .name-page {
        margin-left: 20px;
        font-size: 2.5rem;
    }

    .admin {
        padding-top: 20px;
        border-bottom: 1px solid #666;
        padding-bottom: 20px;
    }

    .img {
        border-bottom: 1px solid #666;
        padding-top: 20px;
    }

    .central-img {
        padding-bottom: 12px;
    }
    .nav-link{
        color: #fff;
    }
    .nav-user{
        color: #000;
    }
   
</style>

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Universidad</h1>
            <div class="flex justify-center img">
                <div class="central-img">
                    <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4" src="../assets/logo.jpeg" alt="">
                    <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?php echo $user ?></p>
                </div>
            </div>

            <ul class="side-bar-side">
                <h4 class="admin">
                    Menu <?= $rol ?>
                    <?php
                    //var_dump($usuarios);
                    foreach ($permisos as $menu) {
                        switch ($menu["rol_id"]) {
                            case 1:
                                $rol = "Admin";
                                break;
                            case 2:
                                $rol = "Maestro";
                                break;
                            case 3:
                                $rol = "Alumno";
                                break;
                        } ?><?php } ?>
                </h4>
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
                        <a class="nav-link nav-user dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $rol ?>
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
                <h1 class="name-page">Lista de Permisos</h1>
                <ol class="breadcrumb bread">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permisos</li>
                </ol>
            </nav>


            <div class="Dashboard">
                <div class="header-Dasbord">
                    <p>Información de Permisos</p>
                    <!-- <button onclick="mostrarFormulario()">Editar Permisos</button> -->
                </div>

                <!-- Contenedor sombreado (overlay) y formulario -->
                <div class="overlay" id="overlay">
                    <div class="modelos">
                        <h3>Editar Permisos</h3>

                        <form d="formularioMaestro">
                            <div class="insert-Container">
                                <label for="Email" class="form-labe">Email del usuario</label>
                                <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="admin@admin.com">
                            </div>
                            <div class="insert-Container">
                                <label for="selectClases" class="form-labe">Rol de usuarios:</label>
                                <select class="form-select" id="selectClases" aria-label="Seleccione una clase">
                                    <option value="clase1">Clase 1</option>
                                    <option value="clase2">Clase 2</option>
                                    <option value="clase3">Clase 3</option>
                                </select>
                            </div>
                        </form>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Usuario Activo</label>
                        </div>
                        <button class="" onclick="cerrarFormulario()">Cerrar</button>
                        <button type="submit" class="">Submit</button>

                    </div>
                </div>

                <nav class="navbar navbar-expand  navbar-body">
                    <!-- <div class="container-fluid"> -->
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-secondary">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Copy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Excel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PDF</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Column Visibility
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="head-search">
                        <label for="search"></label>
                        <input type="search" placeholder="Search:">
                        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    </form>
                    <!-- </div> -->
                    <!-- </div> -->
                </nav>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-table">#</th>
                            <th class="border-table">Email/ usuario</th>
                            <th class="border-table">Permiso</th>
                            <th class="border-table">Estado</th>
                            <th class="border-table">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        //var_dump($usuarios);
                        foreach ($permisos as $permiso) {
                            switch ($permiso["rol_id"]) {
                                case 1:
                                    $rol = "Administrador";
                                    $estilo = "bg-yellow-500 text-gray-700 rounded px-2 py-0.5";
                                    break;
                                case 2:
                                    $rol = "Maestro";
                                    $estilo = "bg-blue-500 text-white rounded px-2 py-0.5";
                                    break;
                                case 3:
                                    $rol = "Alumno";
                                    $estilo = "bg-zinc-400 text-white rounded px-2 py-0.5";
                                    break;
                            }
                            $status = $permiso["estatus"] == 1 ? "Activo" : "Inactivo";

                        ?>
                            <tr>
                                <td class="px-4 py-2 whitespace-no-wrap text-md leading-5 border-table">
                                    <p><?= $permiso["id"] ?></p>
                                </td>
                                <td class="px-4 py-2 whitespace-no-wrap text-md leading-5 border-table">
                                    <p><?= $permiso["correo"] ?></p>
                                    <p class="text-xs text-gray-400"><?= $permiso["nombre"] ?></p>

                                </td>
                                <td class="px-4 py-4 whitespace-no-wrap text-center text-sm leading-5 border-table">
                                    <p class="<?= $estilo ?>"><?= $rol ?></p>
                                </td>
                                <td class="px-4 py-4 whitespace-no-wrap text-sm leading-5 border-table">
                                    <div class="flex text-green-500">
                                        <?php
                                        if ($permiso["estatus"] == 1) {

                                        ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="ml-2"><?= $status ?></p>

                                        <?php
                                        }
                                        if (($permiso["estatus"] == 0)) {
                                        ?>
                                            <svg width="24px" height="24px" viewBox="0 0 1024.00 1024.00" fill="#ff0000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000" stroke-width="20.48">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="6.144"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill=""></path>
                                                    <path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill=""></path>
                                                    <path d="M328 340.8l32-31.2 348 348-32 32z" fill=""></path>
                                                </g>
                                            </svg>
                                            <p class="ml-2 text-red-500 hover:text-red-600"><?= $status ?></p>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>

                                <td class="px-4 py-4 whitespace-no-wrap text-sm leading-5 border-table-action">
                                    <div class="space-x-4" id="open-btn">
                                        <a class="text-blue-500 hover:text-blue-600 justify-center text-center fa-solid fa-pen-to-square square" onclick="mostrarFormulario()" href="/permisos/edit?id=<?= $permiso["id"] ?>">
                                        </a>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


                <nav class="user-navigation" aria-label="Page navigation ">
                    <span class="User">
                        Showing
                        <?php echo (is_array($data) && isset($data[0]['count(*)'])) ? $data[0]['count(*)'] : 0; ?> to
                        <?php echo (is_array($data) && isset($data[0]['count(*)'])) ? $data[0]['count(*)'] : 0; ?> of entries

                    </span>

                    <ul class="pagination justify-content-end">
                        <li class="page-item ">
                            <a class="page-link disabled">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>




    <script>
        const li1 = document.querySelector('.liInteractive');
        const li3 = document.querySelector('.liInteractive3');

        li1.addEventListener('mouseover', function() {
            li1.classList.add('paintInteractive');
            li2.classList.remove('paintInteractive');
            li3.classList.remove('paintInteractive');
        })

        li3.addEventListener('mouseover', function() {
            li1.classList.remove('paintInteractive');
            li2.classList.remove('paintInteractive');
            li3.classList.add('paintInteractive');
        })

        const interactiveName = document.querySelector('.user-info');
        const interactive = document.querySelector('.opcion');
        const desplegarMenu = document.querySelector('.interactiveMenu');

        interactiveName.addEventListener('click', function() {
            desplegarMenu.classList.toggle('desplegar');
        })

        function mostrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'flex';
        }

        function cerrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }
    </script>
</body>

</html>