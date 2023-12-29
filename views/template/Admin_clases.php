<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-FpGwFfDQVSAe0PxPIBJ1jpHzeIOVYlOQTprWqI6Vq5rUpv9vO8RQHwV8g/5URz1GJ9nrXypKOmPBc19m/+M+sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tu Sitio Web</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            color: white;
        }

        .burger-menu {
            font-size: 24px;
            cursor: pointer;
        }

        .user-info {
            text-align: right;
        }

        .navbar-container {
            display: flex;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #111;
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
            /* padding: 20px; */
        }


        /* parte interactiva */

        .interactiveMenu {
            width: 170px;
            height: 164px;
            border-radius: 12px;
            border: 1px;
            border: 1px solid #E0E0E0;
            visibility: hidden;
            position: absolute;
            top: 60px;
            right: 40px;
        }



        .desplegar {
            visibility: visible;
        }


        .logOutInteractive {
            margin-top: 20px;
            /* margin-left: 20px; */
            /* margin-right: 10px; */
            padding: 5px;
            color: #EB5757;

        }

        ul {
            list-style: none;
        }

        h4 {
            text-align: center;
        }

        .aTextInteractive {
            text-decoration: none;
            color: #4F4F4F;

        }

        .aTextInteractiveLog {
            text-decoration: none;
            color: #EB5757;

        }

        /* .paintInteractive { */
        /* width: 154.12px; */
        /*164.12*/
        /* height: 39.15px; */
        /*39.15px*/
        /* border-radius: 8px;
            background: #F2F2F2;
            padding: 7px;
        } */

        /* parte del logo */

        .sidebar-header {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid gray;
        }

        .sidebar-header img {
            width: 40px;
            /* Ajusta el ancho según sea necesario */
            margin-right: 10px;
            /* Espacio entre la imagen y el texto */
        }
    </style>
</head>

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="/assets/favicon.ico" alt="Logo de la Universidad">
                <h2>Universidad</h2>
            </div>

            <ul>
                <h4>Menu Administracion</h4>
                <li>
                    <i class="material-symbols-outlined">security</i>
                    <a href="#inicio">Permisos de Seguridad</a>
                </li>
                <li>
                    <i class="material-symbols-outlined logOutText">group</i>
                    <a href="#acerca">Maestros</a>
                </li>
                <li>
                    <i class="material-symbols-outlined">school</i>
                    <a href="#servicios">Alumnos</a>
                </li>
                <li>
                    <i class="material-symbols-outlined">book</i>
                    <a href="#contacto">Clases</a>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <div class="navbar">
                <div class="burger-menu">&#9776; Home</div>
                <div class="user-info">
                    nombre del servidor
                    <span class="material-symbols-outlined">
                        arrow_drop_down
                    </span>
                </div>
            </div>
            <!-- Parte interactiva -->
            <div class="interactiveMenu">
                <ul>
                    <div class="myProfileInteractive">
                        <li class="liInteractive">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                            <a href="" class="aTextInteractive">My Profile</a>
                        </li>
                    </div>
                    <div class="logOutInteractive">
                        <li class="liInteractive3"><span class="material-symbols-outlined logOutText">
                                logout
                            </span>
                            <a href="../action/logout.php" class="logOutText aTextInteractiveLog">Logout</a>
                        </li>
                    </div>
                </ul>
            </div>
            <!-- Parte interactiva -->

            <h1>Contenido Principal</h1>
            <p>Bienvenido a mi sitio web.</p>
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
        const desplegarMenu = document.querySelector('.interactiveMenu');

        interactiveName.addEventListener('click', function() {
            desplegarMenu.classList.toggle('desplegar');
        })
    </script>
</body>

</html>