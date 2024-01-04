<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/viewModel.php";
$count = new ViewModel();
$data = $count->allClases();
$ocultar_div_permisos = 'hidden';

//var_dump($pors_Admin * 1000);
$rol = $_SESSION["user"]["Rol"];
$usuarios = $_SESSION["user"];
//var_dump($usuarios["Rol"]);
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
    <link rel="stylesheet" href="/views/style/.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="../css/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <title>Listas de clases</title>
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

    /* parte interactiva */

    .navbar-header {
        justify-content: space-between;
        gap: 1030px;
    }

    .desplegar {
        visibility: visible;
    }

    .logOutInteractive {
        margin-top: 20px;
        padding: 5px;
        color: #eb5757;
    }

    /* .nav-home {
    list-style: none;
    padding-top: 25px;
} */

    h4 {
        text-align: center;
    }

    .aTextInteractive {
        text-decoration: none;
        color: #4f4f4f;
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
        color: #eb5757;
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

    .name-page {
        justify-content: center;
        text-align: center;
        align-items: center;
        font-size: 2.5rem;
        padding-bottom: 4px;

    }

    .header-img {
        border-bottom: 1px solid #666;
        padding-bottom: 12px;
    }

    .name-container {
        margin-left: 20px;
        font-size: 2.5rem;
    }

    .admin {
        font-size: 1.5rem;
        padding-top: 22px;
        padding-bottom: 22px;
        border-bottom: 1px solid #666;
    }

    .nav-link {
        color: #fff;
    }

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
        margin-bottom: 20px;
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

    .content {
        flex: 1;
        background-color: rgb(245, 246, 249);
        width: 80%;
        max-height: 750px;
        overflow-y: auto;
    }

    .nav-name {
        color: #000;
    }
</style>

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1 class="name-page">Universidad</h1>
            <div class="flex justify-center header-img">
                <div class="">
                    <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 " src="../assets/logo.jpeg" alt="">
                    <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?= $user ?></p>
                </div>
            </div>

            <ul class="side-bar-side">
                <h4 class="admin">Menu <?= $rol ?>

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
                    <a href="clases">Clases</a>
                </li>
            </ul>
        </div>

        <!-- navbar principal -->
        <div class="content">
            <div class="navbar-header">
                <div class="burger-menu">&#9776; Home</div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-name dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <?= $rol ?>
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



            <h1 class="name-container">Listas de clases</h1>
            <div class="Dashboard">
                <div class="header-Dasbord">
                    <p>Información de clases</p>
                    <!-- <button onclick="mostrarFormulario()">Editar Permisos</button> -->
                </div>

                <!-- Contenedor sombreado (overlay) y formulario -->
                <div class="overlay" id="overlay">
                    <div class="modelos">
                        <h3>Editar clases</h3>

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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-secondary text-white">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">Copy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Excel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PDF</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <th class="border-table">clase</th>
                            <th class="border-table">Maestro</th>
                            <th class="border-table">Alumnos Inscrito</th>
                            <th class="border-table">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clases as $clase) {
                            switch ($clase['maestro_nombre']) {
                                case Null:
                                    $maestroAsignado = "Sin Asignacion";
                                    $estilo = "bg-orange-500 text-white rounded px-2 py-0.5";
                                    break;

                                default:
                                    $maestroAsignado = $clase["maestro_nombre"];
                                    $estilo = "";
                                    break;
                            }
                            switch ($clase["maestro_nombre"]) {
                                case 0:
                                    $alumnosInscritos = "Sin Alumnos";
                                    $estilo2 = "bg-orange-100 text-black text-bold rounded px-2 py-0.5";
                                    break;

                                default:
                                    $alumnosInscritos = $clase["maestro_nombre"];
                                    $estilo2 = "";
                                    break;
                            }
                        ?>
                            <tr>
                                <td class="border-table"><?= $clase['clase_id']  ?></td>
                                <td class="border-table"><?= $clase["clase_nombre"] ?></td>
                                <td class="border-table">
                                    <p class="<?= $estilo ?>"><?= $maestroAsignado ?></p>
                                </td>
                                <td class="border-table">
                                    <p class="<?= $estilo2 ?>"><?= $alumnosInscritos ?>
                                </td>
                                <td class="border-table-action">
                                    <a class="fa-solid fa-pen-to-square square" onclick="mostrarFormulario()"></a>
                                    <!-- <a href=""><i class="fa-solid fa-trash"></i></a> -->
                                </td>
                            </tr>


                        <?php } ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation ">
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