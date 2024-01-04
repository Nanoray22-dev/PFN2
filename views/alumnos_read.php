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
    $count = new ViewModel();
    $data = $count->allAlumnosUser();
    !isset($alumnos) && header("Location: /alumnos");

    $ocultar_div_permisos = 'hidden';


    $rol = $_SESSION["user"]["Rol"];
    $usuarios = $_SESSION["user"];
    $user = $_SESSION["user"]["nombre"];
    $student = $_SESSION["user"];
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
    <link rel="stylesheet" href="/style/Admin_permisos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <title>Listas de Alumnos</title>
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
    .content {
        width: 80%;
        max-height: 750px;
        overflow-y: auto;
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
        justify-content: space-evenly;
        align-items: center;
        border: 1px solid #ddd;
        gap: 40px;
        cursor: pointer;
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
    .over {
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
    .nav-link{
        color: #fff;
    }
    .nav-name{
        color: #000;
    }
    .admin{
        border-bottom: 1px solid #666;
        border-top: 1px solid #666;
        padding-top: 22px;
        padding-bottom: 22px;

    }
</style>

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Universidad</h1>
            <div class="flex justify-center">
                <div class="">
                    <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4" src="../assets/logo.jpeg" alt="">
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
                        <a class="nav-link nav-name dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <?= $rol?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/views/template/Dashboard.php">Home</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

            </div>



            <h1>Listas de Alumnos</h1>
            <div class="Dashboard">
                <div class="header-Dasbord">
                    <p>Información de Alumnos</p>
                    <button onclick="mostrar()">Agregar Alumnos</button>
                </div>

                <!-- Contenedor sombreado (overlay) y formulario -->
                <?php foreach( $alumnos as $alumno){ ?>
                <div class="overlay" id="overlay">
                    script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                    <div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

                        <div class="fixed z-10 inset-0 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                                    <h2 class="text-2xl font-bold mb-8">Editar Alumnos</h2>
                                    <form id="editPermisos" action="/alumnos/update" method="post">
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="dni">DNI:</label>
                                            <input type="text" id="dni" name="dni" value="<?= $alumno["dni"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                                            <input type="text" id="correo" name="correo" disabled value="<?= $alumno["correo"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre:</label>
                                            <input type="text" id="nombre" name="nombre" value="<?= $alumno["nombre"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Dirección:</label>
                                            <input type="text" id="direccion" name="direccion" value="<?= $alumno["direccion"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nac">Fecha Nacimiento:</label>
                                            <input type="date" id="fecha_nac" name="fecha_nac" value="<?= $alumno["fecha_nac"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                                Guardar cambios
                                            </button>
                                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                                                <a href="/alumnos">Cerrar</a>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                <div class="over" id="over">
                <div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

                    <div class="fixed z-10 inset-0 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                                <h2 class="text-2xl font-bold mb-8">Nuevos Alumnos</h2>
                                <form id="editPermisos" action="/alumnos/create" method="post">
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
                                        <input type="text" id="rol_id" name="rol_id" value="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="hidden mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                                        <input type="text" id="estatus" name="estatus" value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="hidden mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password:</label>
                                        <input type="password" id="password" name="password" value="alumno" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Fecha Nacimiento">
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Guardar cambios
                                        </button>
                                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                                            <a href="/alumnos">Cerrar</a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th class="border-table">ID</th>
                            <th class="border-table">DNI</th>
                            <th class="border-table">Nombre</th>
                            <th class="border-table">Correo</th>
                            <th class="border-table">Direccion</th>
                            <th class="border-table">Fecha de nacicmiento</th>
                            <th class="border-table">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alumnos as $alumno) {


                        ?>
                            <tr>
                                <td class="border-table">
                                    <?= $alumno['id'] ?>
                                </td>
                                <td class="border-table"><?= $alumno['dni'] ?></td>
                                <td class="border-table"><?= $alumno['nombre'] ?></td>
                                <td class="border-table"> <?= $alumno['correo'] ?></td>
                                <td class="border-table"><?= $alumno['direccion'] ?></td>
                                <td class="border-table"> <?= $alumno['fecha_nac'] ?></td>
                                <td class="border-table-action">
                                    <a class="fa-solid fa-pen-to-square square" onclick="mostrarFormulario()"></a>
                                    <a href="/alumnos/delete?id=<?= $alumno["id"]?>"><i class="fa-solid fa-trash text-red-500"></i></a>
                                    
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

        function mostrar() {
            var overlay = document.getElementById('over');
            overlay.style.display = 'flex';
        }

        function cerrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }
    </script>
</body>

</html>