<?php
// Check if $permisos is defined and not empty
if (!isset($permisos) || empty($permisos)) {
    header("Location: /permisos");
    exit; // Ensure script stops execution after redirection
}

session_start();
$_SESSION["usuario_edit"] = isset($permisos["id"]) ? $permisos["id"] : null;
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
                <h2 class="text-2xl font-bold mb-8">Editar Permisos</h2>
                <form id="editPermisos" action="/permisos/update" method="post">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                        <input type="text" id="correo" name="correo" disabled value="<?= isset($permisos["correo"]) ? $permisos["correo"] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rol_id">Rol:</label>
                        <div class="flex col-span-2 sm:col-span-1">
                            <input id="rol_id" name="" disabled value="<?= isset($permisos["rol_id"]) ? $permisos["rol_id"] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Rol del Usuario">
                            <select id="rolesUsuarios" name="rol_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value='' selected disabled>Seleccione un Rol</option>
                                <option value='1'>Administrador</option>
                                <option value='2'>Maestro</option>
                                <option value='3'>Alumno</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                        <div class="flex col-span-2 sm:col-span-1">
                            <input type="text" id="estatus" disabled name="" value="<?= isset($permisos["estatus"]) ? $permisos["estatus"] : '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Estatus del Usuario">
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
                            <a href="/permisos">Cerrar</a>
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
        document.getElementById('rol_id').value = valorSeleccionadoRol;
    });

    // Actualizar el valor del input cuando cambia el valor del select
    document.getElementById('estatusUsuarios').addEventListener('change', function() {
        var valorSeleccionadoEstatus = this.value;
        document.getElementById('estatus').value = valorSeleccionadoEstatus;
    });
</script>
</html>