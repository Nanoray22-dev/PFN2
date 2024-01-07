<?php
//!isset($maestros) && header("Location: /maestros");

session_start();
//$_SESSION["usuarioid_edit"] = $usuarios["id"];
//$_SESSION["usuarioid_edit"] = $maestros["id"];

//var_dump($permisos["rol_id"]);
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


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
</html>

