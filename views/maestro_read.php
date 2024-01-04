<!DOCTYPE html>
<html x-data="data('bienvenido')" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!--CSS TailWindcss CLI-->
    <link href="../css/output.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body>

<?php
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/models/viewModel.php";
    !isset($maestros) && header("Location: /maestros");

    $count = new ViewModel();
    $data = $count->allMaestroUser();
    $ocultar_div_permisos = 'hidden';

    //var_dump($pors_Admin * 1000);
    $rol = $_SESSION["user"]["Rol"];
    $usuarios = $_SESSION["user"];
    //var_dump($usuarios["Rol"]);
    $user = $_SESSION["user"]["nombre"];

    // if (isset($maestros['id'])) {
    //     $maestroId = $maestros['id'];

    //     // The rest of your code that uses $maestroId
    //     // ...
    // } else {
    //     // Handle the case where 'id' key is not present in the array
    //     echo "The 'id' key is not present in the \$maestros array.";
    // }
    ?>

  
</body>

</html>


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
    <link rel="stylesheet" href="/style/Admin_maestro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <title>Listas de Maestros</title>
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
        color: #EB5757;

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

    .nav-link {
        color: #fff;
    }

    .nav-user {
        color: #000;
    }

    .header-img {
        border-bottom: 1px solid #666;

    }

    .admin {
        padding: 12px;
        border-bottom: 1px solid #666;
        padding-bottom: 22px;
        padding-top: 22px;
    }

    .side-bar-inside {
        padding-top: 22px;
    }

    .user-navigation {
        display: flex;
        justify-content: space-between;
    }

    span.User {
        padding-top: 10px;
    }
</style>

<body>
   
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Universidad</h1>
            <div class="flex justify-center header-img">
                <div class="">
                    <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 " src="../assets/logo.jpeg" alt="">
                    <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?= $user ?></p>
                </div>
            </div>
            <ul class="side-bar-side">
                <h4 class="admin">Menu <?=$rol?></h4>
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
                        <a class="nav-link nav-user link-user dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $rol ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/views/template/Dashboard.php">Home</a></li>
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
                <h1>Listas de Maestros</h1>
                <ol class="breadcrumb bread">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Meastro</li>
                </ol>
            </nav>

            <div class="Dashboard">
                <div class="header-Dasbord">
                    <p>Información de Maestro</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Agregar Maestro
                    </button>
                </div>

                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

                                <div class="fixed z-10 inset-0 overflow-y-auto">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                                            <h2 class="text-2xl font-bold mb-8">Nuevos Maestros</h2>
                                            <form id="editPermisos" action="/maestros/create" method="post">
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                                                    <input type="text" id="correo" name="correo" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                                                    <input type="text" id="nombre" name="nombre" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nombre">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">DNI:</label>
                                                    <input type="text" id="dni" name="dni" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="DNI">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección:</label>
                                                    <input type="text" id="direccion" name="direccion" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Direccion">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nac">Fecha Nacimiento:</label>
                                                    <input type="date" id="fecha_nac" name="fecha_nac" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                                                </div>
                                                <div class="hidden mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rol_id">Rol_id:</label>
                                                    <input type="text" id="rol_id" name="rol_id" value="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Rol">
                                                </div>
                                                <div class="hidden mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                                                    <input type="text" id="estatus" name="estatus" value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Activo o Inactivo">
                                                </div>
                                                <div class="hidden mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                                                    <input type="password" id="password" name="password" value="maestro" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Password">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="clase_id">Clase Asignada:</label>
                                                    <div class="flex col-span-3 sm:col-span-1">
                                                        <input id="clase_id" name="" disabled value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Rol del Usuario">

                                                        <select id="rolesUsuarios" name="clase_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value='' selected disabled>Seleccione una Clase</option>
                                                            <option value='NULL'>--Ninguno--</option>
                                                            <option value='1'>Español</option>
                                                            <option value='2'>Algebra</option>
                                                            <option value='3'>Contabilidad 1</option>
                                                            <option value='4'>Ecuaciones Diferenciales</option>
                                                            <option value='5'>PHP</option>
                                                            <option value='6'>Laravel</option>
                                                            <option value='7'>Programación de Bases de Datos</option>
                                                            <option value='8'>React</option>
                                                            <option value='9'>JavaScript</option>
                                                            <option value='10'>HTML CSS</option>
                                                            <option value='11'>Bootstrap Tailwindcss</option>
                                                            <option value='12'>MVC POO</option>
                                                            <option value='13'>Git Github</option>
                                                            <option value='14'>Valores</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="flex items-center justify-between">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                                        Guardar cambios
                                                    </button>
                                                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                                                        <a href="/maestros">Cerrar</a>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- Editor en la tablas -->


                <!-- Modal -->
                <div class="modal fade" id="x" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

                                <div class="fixed z-10 inset-0 overflow-y-auto">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                                            <h2 class="text-2xl font-bold mb-8">Editar Maestros</h2>
                                            <form id="editPermisos" action="/maestros/update" method="post">
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                                                    <input type="text" id="correo" name="correo" disabled value="<?= $maestro["correo"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                                                    <input type="text" id="nombre" name="nombre" value="<?= $maestro["nombre_maestro"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección:</label>
                                                    <input type="text" id="direccion" name="direccion" value="<?= $maestro["direccion"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nac">Fecha Nacimiento:</label>
                                                    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= $maestro["fecha_nac"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="clase_id">Clase Asignada:</label>
                                                    <div class="flex col-span-3 sm:col-span-1">
                                                        <input id="clase_id" name="" disabled value="<?= $maestro["clase_id"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Rol del Usuario">

                                                        <select id="rolesUsuarios" name="clase_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value='' selected disabled>Seleccione una Clase</option>
                                                            <option value='NULL'>--Ninguno--</option>
                                                            <option value='1'>Español</option>
                                                            <option value='2'>Algebra</option>
                                                            <option value='3'>Contabilidad 1</option>
                                                            <option value='4'>Ecuaciones Diferenciales</option>
                                                            <option value='5'>PHP</option>
                                                            <option value='6'>Laravel</option>
                                                            <option value='7'>Programación de Bases de Datos</option>
                                                            <option value='8'>React</option>
                                                            <option value='9'>JavaScript</option>
                                                            <option value='10'>HTML CSS</option>
                                                            <option value='11'>Bootstrap Tailwindcss</option>
                                                            <option value='12'>MVC POO</option>
                                                            <option value='13'>Git Github</option>
                                                            <option value='14'>Valores</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                                                    <div class="flex col-span-2 sm:col-span-1">
                                                        <input type="text" id="estatus" disabled name="" value="<?= $maestro["estatus"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Estatus del Usuario">

                                                        <select id="estatusUsuarios" name="estatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value='' selected disabled>Seleccione un Estatus</option>
                                                            <option value='1'>Activo</option>
                                                            <option value='0'>Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="flex items-center justify-between">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                                        Guardar cambios
                                                    </button>
                                                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                                                        <a href="/maestros">Cerrar</a>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cambiando los roles del menú desplegable -->
                            <script type="text/javascript">
                                // Actualizar el valor del input cuando cambia el valor del select
                                document.getElementById('rolesUsuarios').addEventListener('change', function() {
                                    var valorSeleccionadoRol = this.value;
                                    document.getElementById('clase_id').value = valorSeleccionadoRol;
                                    //$asignatura = valorSeleccionadoRol;
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <!-- Editor en la tablas -->

                <nav class="navbar navbar-expand  navbar-body">
                    <!-- <div class="container-fluid"> -->
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  text-bg-secondary">
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
                    </form>
                </nav>

                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th class="border-table">#</th>
                            <th class="border-table">Nombres</th>
                            <th class="border-table">Email</th>
                            <th class="border-table">Dirección</th>
                            <th class="border-table">Fec.de Nacimiento</th>
                            <th class="border-table">Clase Asignadas</th>
                            <th class="border-table">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($maestros as $maestro) {
                            switch ($maestro["clase_id"]) {
                                case Null:
                                    $claseAsignada = "Sin Asignación";
                                    $btn_delete = true;
                                    $estilo = "bg-yellow-500 text-white rounded px-2 py-0.5";
                                    break;

                                default:
                                    $claseAsignada = $maestro["nombre_clase"];
                                    $btn_delete = false;
                                    $estilo = "";
                                    break;
                            }


                        ?>
                            <tr>
                                <td class="border-table">
                                    <p><?= $maestro["id"] ?></p>
                                </td>
                                <td class="border-table">
                                    <p><?= $maestro["nombre_maestro"] ?></p>
                                </td>
                                <td class="border-table">
                                    <p><?= $maestro["correo"] ?></p>
                                </td>
                                <td class="border-table">
                                    <p><?= $maestro["direccion"] ?></p>
                                </td>
                                <td class="border-table">
                                    <p><?= $maestro["fecha_nac"] ?></p>
                                </td>
                                <td class="border-table">
                                    <p class="<?= $estilo ?>"><?= $claseAsignada ?></p>
                                </td>
                                <td class="border-table-action">
                                    <a type="button" class="btn-primary table-action" data-bs-toggle="modal" data-bs-target="#x" href="/maestros/edit?id=<?= $maestro["id"] ?>">
                                        <i class="fa-solid fa-pen-to-square "></i>
                                    </a>
                                    <a>
                                        <i class="fa-solid fa-trash"> <?php
                                                                        if ($btn_delete)
                                                                        ?>
                                        </i>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
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

        function mostrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'flex';
        }

        function mostrarEditor() {
            var over = document.getElementById('over');
            over.style.display = 'flex';
        }

        function cerrarFormulario() {
            var overlay = document.getElementById('over');
            overlay.style.display = 'none';
        }

        function cerrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }
    </script>
</body>

</html>