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

<body>
    <div class="navbar-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="/assets/logo.jpeg" alt="Logo de la Universidad">
                <h2> <a href="/views/template/Dashboard.php">Universidad</h2></a>
            </div>

            <ul class="side-bar-side">
                <h4 class="admin">Menu Administracion</h4>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">security</i>
                    <a href="/views/template/Admin_permisos.php">Permisos de Seguridad</a>
                </li>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined logOutText">group</i>
                    <a href="/views/template/Admin_maestro.php">Maestros</a>
                </li>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">school</i>
                    <a href="#servicios">Alumnos</a>
                </li>
                <li class="side-bar-inside">
                    <i class="material-symbols-outlined">book</i>
                    <a href="#contacto">Clases</a>
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
                            Nombre del servidoor
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
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Maestro</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- <h3>Agregar Maestro</h3> -->

                                <form d="formularioMaestro">
                                    <div class="insert-Container">
                                        <label for="Email" class="form-labe">Correo Electronico</label>
                                        <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="Email" class="form-labe">Nombre(s)</label>
                                        <input type="text" class="form-control" id="Email" aria-describedby="name">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="apellidos" class="form-labe">Apellido(s)</label>
                                        <input type="text" class="form-control" id="apellidos" aria-describedby="last-name">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="direccion" class="form-labe">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" aria-describedby="adress">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="Date" class="form-labe">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" aria-describedby="date">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="selectClases" class="form-labe">Clases Asignadas:</label>
                                        <select class="form-select" id="selectClases" aria-label="Seleccione una clase">
                                            <option selected>Selecciona una clase</option>
                                            <option value="clase1">Clase 1</option>
                                            <option value="clase2">Clase 2</option>
                                            <option value="clase3">Clase 3</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- Editor en la tablas -->


                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Maestro</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Editar Maestro</h3>

                                <form d="formularioMaestro">
                                    <div class="insert-Container">
                                        <label for="Email" class="form-labe">Correo Electronico</label>
                                        <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="Email" class="form-labe">Nombre(s)</label>
                                        <input type="text" class="form-control" id="Email" aria-describedby="name">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="apellidos" class="form-labe">Apellido(s)</label>
                                        <input type="text" class="form-control" id="apellidos" aria-describedby="last-name">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="direccion" class="form-labe">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" aria-describedby="adress">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="Date" class="form-labe">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" aria-describedby="date">
                                    </div>
                                    <div class="insert-Container">
                                        <label for="selectClases" class="form-labe">Clases Asignadas:</label>
                                        <select class="form-select" id="selectClases" aria-label="Seleccione una clase">
                                            <option selected>Selecciona una clase</option>
                                            <option value="clase1">Clase 1</option>
                                            <option value="clase2">Clase 2</option>
                                            <option value="clase3">Clase 3</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
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
                            <a class="nav-link active" aria-current="page" href="#">Copy</a>
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

                <table class="table table-striped table-hover">
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
                        <tr>
                            <td class="border-table">Dato 1</td>
                            <td class="border-table">Dato 2</td>
                            <td class="border-table">Dato 3</td>
                            <td class="border-table">Dato 4</td>
                            <td class="border-table">Dato 5</td>
                            <td class="border-table">Dato 6</td>
                            <td class="border-table-action">
                                <a type="button" class="btn-primary table-action" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fa-solid fa-pen-to-square "></i>
                                </a>
                                <a><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-table">Dato 1</td>
                            <td class="border-table">Dato 2</td>
                            <td class="border-table">Dato 3</td>
                            <td class="border-table">Dato 4</td>
                            <td class="border-table">Dato 5</td>
                            <td class="border-table">Dato 6</td>
                            <td class="border-table">Dato 7</td>
                        </tr>
                        <tr>
                            <td class="border-table">Dato 1</td>
                            <td class="border-table">Dato 2</td>
                            <td class="border-table">Dato 3</td>
                            <td class="border-table">Dato 4</td>
                            <td class="border-table">Dato 5</td>
                            <td class="border-table">Dato 6</td>
                            <td class="border-table">Dato 7</td>
                        </tr>
                        <tr>
                            <td class="border-table">Dato 1</td>
                            <td class="border-table">Dato 2</td>
                            <td class="border-table">Dato 3</td>
                            <td class="border-table">Dato 4</td>
                            <td class="border-table">Dato 5</td>
                            <td class="border-table">Dato 6</td>
                            <td class="border-table">Dato 7</td>
                        </tr>
                        <tr>
                            <td class="border-table">Dato 1</td>
                            <td class="border-table">Dato 2</td>
                            <td class="border-table">Dato 3</td>
                            <td class="border-table">Dato 4</td>
                            <td class="border-table">Dato 5</td>
                            <td class="border-table">Dato 6</td>
                            <td class="border-table">Dato 7</td>
                        </tr>
                    </tbody>
                </table>

                <nav aria-label="Page navigation ">
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

        function mostrarEditor() {
            var over = document.getElementById('over');
            over.style.display = 'flex';
        }

        function cerrarFormulario() {
            var overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }
    </script>
</body>

</html>