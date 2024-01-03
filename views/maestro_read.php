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

    <div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
            <div>
                <div class="text-white">
                    <div class="flex p-2  bg-gray-800">
                        <div class="flex py-3 px-2 items-center">
                            <p class="text-2xl text-green-500 font-semibold">University</p <p class="ml-2 font-semibold italic">
                            DASHBOARD</p>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="">
                            <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 border-green-400" src="../assets/logo.jpeg" alt="">
                            <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?php echo $rol ?></p>
                        </div>
                    </div>
                    <div>
                        <ul class="mt-6 leading-10">
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-4">HOME</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href='/permisos'>

                                    <svg width="24px" height="24px" viewBox="0 0 48.00 48.00" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff" stroke-width="0.00048000000000000007">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="Layer_2" data-name="Layer 2">
                                                <g id="invisible_box" data-name="invisible box">
                                                    <rect width="48" height="48" fill="none"></rect>
                                                </g>
                                                <g id="Layer_7" data-name="Layer 7">
                                                    <g>
                                                        <path d="M25.1,41H4a2,2,0,0,1-2-2V31.1l1-.6A25.6,25.6,0,0,1,16,27a26.7,26.7,0,0,1,7.5,1.1,21.2,21.2,0,0,0-.5,4.4A18.4,18.4,0,0,0,25.1,41Z"></path>
                                                        <path d="M16,23a9,9,0,1,0-9-9A9,9,0,0,0,16,23Z"></path>
                                                        <path d="M46,34.1V31.9L42.4,31l-.5-1.1,2-3.2-1.6-1.6-3.2,2L38,26.6,37.1,23H34.9L34,26.6l-1.1.5-3.2-2-1.6,1.6,2,3.2L29.6,31l-3.6.9v2.2l3.6.9.5,1.1-2,3.2,1.6,1.6,3.2-2,1.1.5.9,3.6h2.2l.9-3.6,1.1-.5,3.2,2,1.6-1.6-2-3.2.5-1.1ZM36,36a3,3,0,1,1,3-3A2.9,2.9,0,0,1,36,36Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">PERMISOS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/maestros">
                                    <svg fill="#ffffff" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" stroke="#ffffff" stroke-width="5.1199900000000005">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M302.195,11.833H13.049C5.842,11.833,0,17.675,0,24.882v214.289c0,7.207,5.842,13.049,13.049,13.049h283.839 l-34.352-21.329c-2.247-1.396-4.282-3.002-6.109-4.768H26.097V37.93h263.049v126.703c4.01,0.847,7.943,2.39,11.625,4.677 l14.473,8.986V24.882C315.244,17.675,309.402,11.833,302.195,11.833z"></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M216.857,134.337c-4.352-3.43-10.665-2.685-14.097,1.668c-3.432,4.353-2.686,10.665,1.668,14.097l44.279,34.914 c0.63-1.371,1.34-2.719,2.156-4.034c2.883-4.643,6.649-8.401,10.94-11.206L216.857,134.337z"></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <circle cx="419.71" cy="81.405" r="37.557"></circle>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M511.33,173.609c-0.118-23.528-19.355-42.67-42.884-42.67H450.26c-17.831,46.242-11.329,29.381-22.507,58.37l4.709-23.724 c0.346-1.744,0.067-3.555-0.79-5.113l-7.381-13.424l6.551-11.914c0.454-0.826,0.438-1.829-0.041-2.64 c-0.479-0.811-1.352-1.308-2.293-1.308h-17.96c-0.942,0-1.813,0.497-2.293,1.308s-0.495,1.815-0.041,2.64l6.537,11.889 l-7.367,13.4c-0.873,1.589-1.147,3.438-0.77,5.211l5.438,23.675c-3.119-8.087-21.08-52.728-23.255-58.37h-17.83 c-23.529,0-42.766,19.141-42.884,42.67c-0.098,19.565-0.016,3.179-0.17,33.884l-36.702-22.787 c-8.501-5.28-19.674-2.667-24.953,5.836c-5.279,8.503-2.666,19.675,5.836,24.954l64.219,39.873 c12.028,7.47,27.609-1.167,27.68-15.304c0.036-7.091,0.292-57.809,0.334-66.275c0.013-2.092,1.714-3.776,3.805-3.769 c2.089,0.007,3.779,1.703,3.779,3.794c-0.018,87.323-0.394,111.735-0.394,304.606c0,12.01,9.736,21.746,21.746,21.746 s21.746-9.736,21.746-21.746V304.604h9.388v173.817c0,12.01,9.736,21.746,21.746,21.746s21.746-9.736,21.746-21.746l0.008-304.612 c0-1.981,1.604-3.589,3.586-3.595c1.981-0.006,3.595,1.594,3.605,3.577l0.669,133.132c0.05,9.977,8.154,18.03,18.119,18.03 c0.031,0,0.062,0,0.094,0c10.007-0.05,18.081-8.205,18.03-18.212L511.33,173.609z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">MAESTROS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/alumnos">
                                    <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #ffffff;
                                                }
                                            </style>
                                            <g>
                                                <path class="st0" d="M505.837,180.418L279.265,76.124c-7.349-3.385-15.177-5.093-23.265-5.093c-8.088,0-15.914,1.708-23.265,5.093 L6.163,180.418C2.418,182.149,0,185.922,0,190.045s2.418,7.896,6.163,9.627l226.572,104.294c7.349,3.385,15.177,5.101,23.265,5.101 c8.088,0,15.916-1.716,23.267-5.101l178.812-82.306v82.881c-7.096,0.8-12.63,6.84-12.63,14.138c0,6.359,4.208,11.864,10.206,13.618 l-12.092,79.791h55.676l-12.09-79.791c5.996-1.754,10.204-7.259,10.204-13.618c0-7.298-5.534-13.338-12.63-14.138v-95.148 l21.116-9.721c3.744-1.731,6.163-5.504,6.163-9.627S509.582,182.149,505.837,180.418z"></path>
                                                <path class="st0" d="M256,346.831c-11.246,0-22.143-2.391-32.386-7.104L112.793,288.71v101.638 c0,22.314,67.426,50.621,143.207,50.621c75.782,0,143.209-28.308,143.209-50.621V288.71l-110.827,51.017 C278.145,344.44,267.25,346.831,256,346.831z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">ALUMNOS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/clases">
                                    <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 29.936 29.936" xml:space="preserve" stroke="#ffffff" stroke-width="1.4968">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M29.936,1.153H0v20.045h10.91l-3.76,7.584h2.899l1.288-2.613h6.72l1.287,2.613h2.932l-3.787-7.583h11.445V1.153H29.936z M12.292,24.234l1.496-3.035h1.819l1.496,3.035H12.292z M28.646,19.908H1.29V2.443h27.356V19.908z"></path>
                                                    <rect x="22.631" y="17.149" width="5.191" height="1.859"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">CLASES</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Mobile sidebar Cuando esta en modo responsivo Celular-->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-gray-900 dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
            <div>
                <div class="text-white">
                    <div class="flex p-2  bg-gray-800">
                        <div class="flex py-3 px-2 items-center">
                            <p class="text-2xl text-green-500 font-semibold">University</p <p class="ml-2 font-semibold italic">
                            DASHBOARD</p>
                        </div>
                    </div>
                    <div>
                        <ul class="mt-6 leading-10">
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/dashboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-4">HOME</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                <a class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer" x-on:click="Open = !Open" href='/permisos'>
                                    <span class='inline-flex items-center  text-sm font-semibold text-white hover:text-green-400'>
                                        <svg width="24px" height="24px" viewBox="0 0 48.00 48.00" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff" stroke-width="0.00048000000000000007">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.576"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Layer_2" data-name="Layer 2">
                                                    <g id="invisible_box" data-name="invisible box">
                                                        <rect width="48" height="48" fill="none"></rect>
                                                    </g>
                                                    <g id="Layer_7" data-name="Layer 7">
                                                        <g>
                                                            <path d="M25.1,41H4a2,2,0,0,1-2-2V31.1l1-.6A25.6,25.6,0,0,1,16,27a26.7,26.7,0,0,1,7.5,1.1,21.2,21.2,0,0,0-.5,4.4A18.4,18.4,0,0,0,25.1,41Z"></path>
                                                            <path d="M16,23a9,9,0,1,0-9-9A9,9,0,0,0,16,23Z"></path>
                                                            <path d="M46,34.1V31.9L42.4,31l-.5-1.1,2-3.2-1.6-1.6-3.2,2L38,26.6,37.1,23H34.9L34,26.6l-1.1.5-3.2-2-1.6,1.6,2,3.2L29.6,31l-3.6.9v2.2l3.6.9.5,1.1-2,3.2,1.6,1.6,3.2-2,1.1.5.9,3.6h2.2l.9-3.6,1.1-.5,3.2,2,1.6-1.6-2-3.2.5-1.1ZM36,36a3,3,0,1,1,3-3A2.9,2.9,0,0,1,36,36Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ml-4">PERMISOS</span>
                                    </span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1" x-data="{ Open : false  }">
                                <a class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer" href='/maestros' x-on:click="Open = !Open">
                                    <span class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                                        <svg fill="#ffffff" height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" stroke="#ffffff" stroke-width="5.1199900000000005">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path d="M302.195,11.833H13.049C5.842,11.833,0,17.675,0,24.882v214.289c0,7.207,5.842,13.049,13.049,13.049h283.839 l-34.352-21.329c-2.247-1.396-4.282-3.002-6.109-4.768H26.097V37.93h263.049v126.703c4.01,0.847,7.943,2.39,11.625,4.677 l14.473,8.986V24.882C315.244,17.675,309.402,11.833,302.195,11.833z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M216.857,134.337c-4.352-3.43-10.665-2.685-14.097,1.668c-3.432,4.353-2.686,10.665,1.668,14.097l44.279,34.914 c0.63-1.371,1.34-2.719,2.156-4.034c2.883-4.643,6.649-8.401,10.94-11.206L216.857,134.337z"></path>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <circle cx="419.71" cy="81.405" r="37.557"></circle>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M511.33,173.609c-0.118-23.528-19.355-42.67-42.884-42.67H450.26c-17.831,46.242-11.329,29.381-22.507,58.37l4.709-23.724 c0.346-1.744,0.067-3.555-0.79-5.113l-7.381-13.424l6.551-11.914c0.454-0.826,0.438-1.829-0.041-2.64 c-0.479-0.811-1.352-1.308-2.293-1.308h-17.96c-0.942,0-1.813,0.497-2.293,1.308s-0.495,1.815-0.041,2.64l6.537,11.889 l-7.367,13.4c-0.873,1.589-1.147,3.438-0.77,5.211l5.438,23.675c-3.119-8.087-21.08-52.728-23.255-58.37h-17.83 c-23.529,0-42.766,19.141-42.884,42.67c-0.098,19.565-0.016,3.179-0.17,33.884l-36.702-22.787 c-8.501-5.28-19.674-2.667-24.953,5.836c-5.279,8.503-2.666,19.675,5.836,24.954l64.219,39.873 c12.028,7.47,27.609-1.167,27.68-15.304c0.036-7.091,0.292-57.809,0.334-66.275c0.013-2.092,1.714-3.776,3.805-3.769 c2.089,0.007,3.779,1.703,3.779,3.794c-0.018,87.323-0.394,111.735-0.394,304.606c0,12.01,9.736,21.746,21.746,21.746 s21.746-9.736,21.746-21.746V304.604h9.388v173.817c0,12.01,9.736,21.746,21.746,21.746s21.746-9.736,21.746-21.746l0.008-304.612 c0-1.981,1.604-3.589,3.586-3.595c1.981-0.006,3.595,1.594,3.605,3.577l0.669,133.132c0.05,9.977,8.154,18.03,18.119,18.03 c0.031,0,0.062,0,0.094,0c10.007-0.05,18.081-8.205,18.03-18.212L511.33,173.609z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ml-4">MAESTROS</span>
                                    </span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/alumnos">
                                    <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #ffffff;
                                                }
                                            </style>
                                            <g>
                                                <path class="st0" d="M505.837,180.418L279.265,76.124c-7.349-3.385-15.177-5.093-23.265-5.093c-8.088,0-15.914,1.708-23.265,5.093 L6.163,180.418C2.418,182.149,0,185.922,0,190.045s2.418,7.896,6.163,9.627l226.572,104.294c7.349,3.385,15.177,5.101,23.265,5.101 c8.088,0,15.916-1.716,23.267-5.101l178.812-82.306v82.881c-7.096,0.8-12.63,6.84-12.63,14.138c0,6.359,4.208,11.864,10.206,13.618 l-12.092,79.791h55.676l-12.09-79.791c5.996-1.754,10.204-7.259,10.204-13.618c0-7.298-5.534-13.338-12.63-14.138v-95.148 l21.116-9.721c3.744-1.731,6.163-5.504,6.163-9.627S509.582,182.149,505.837,180.418z"></path>
                                                <path class="st0" d="M256,346.831c-11.246,0-22.143-2.391-32.386-7.104L112.793,288.71v101.638 c0,22.314,67.426,50.621,143.207,50.621c75.782,0,143.209-28.308,143.209-50.621V288.71l-110.827,51.017 C278.145,344.44,267.25,346.831,256,346.831z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">ALUMNOS</span>
                                </a>
                            </li>
                            <li class="relative px-2 py-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500" href="/clases">
                                    <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 29.936 29.936" xml:space="preserve" stroke="#ffffff" stroke-width="1.4968">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <path d="M29.936,1.153H0v20.045h10.91l-3.76,7.584h2.899l1.288-2.613h6.72l1.287,2.613h2.932l-3.787-7.583h11.445V1.153H29.936z M12.292,24.234l1.496-3.035h1.819l1.496,3.035H12.292z M28.646,19.908H1.29V2.443h27.356V19.908z"></path>
                                                    <rect x="22.631" y="17.149" width="5.191" height="1.859"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-4">CLASES</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <header class="z-40 py-4  bg-gray-800  ">
                <div class="flex items-center justify-between h-8 px-6 mx-auto">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <x-heroicon-o-menu class="w-6 h-6 text-white" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>

                    <!-- Search Input -->
                    <div class="flex justify-center  mt-2 mr-4">
                        <div class="relative flex w-full flex-wrap items-stretch mb-3">
                            <input type="search" placeholder="Search" {{ $attributes }} class="form-input px-3 py-2 placeholder-gray-400 text-gray-700 relative bg-white rounded-lg text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                            <span class="z-10 h-full leading-snug font-normal  text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <ul class="flex items-center flex-shrink-0 space-x-6">

                        <!-- Notifications menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-green-400 align-middle rounded-full hover:text-white hover:bg-green-400 focus:outline-none " @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu" aria-label="Notifications" aria-haspopup="true">
                                <div class="flex items-cemter">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>
                                <!-- Notification badge -->
                                <span aria-hidden="true" class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                            </button>
                            <template x-if="isNotificationsMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md">
                                    <li class="flex">
                                        <a class="text-white inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                                            <span>Messages</span>
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                                13
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>

                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="p-2 bg-white text-green-400 align-middle rounded-full hover:text-white hover:bg-green-400 focus:outline-none " @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-green-400 border border-green-500 rounded-md shadow-md" aria-label="submenu">
                                    <li class="flex">
                                        <a class=" text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/index.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>

                </div>
            </header>
            <main class="">
                <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-green-400">
                    <div class="flex justify-between items-end">
                        <div>
                            <h1 class="mt-5 mx-5 text-xl">Lista de Maestros</h1>
                        </div>
                        <div>
                            <form action="/maestros/create">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">

                                    <p>Agregar Maestro</p>

                                </button>
                            </form>
                        </div>



                    </div>
                    <div class="w-full max-w-screen-xl mx-auto">

                    </div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">



                            <div class='col-span-12 mt-5'>
                                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                                    <div class="bg-white p-4 shadow-lg rounded-lg">
                                        <h2 class="font-bold text-base">Información de Maestros</h2>
                                        <div class="mt-4">
                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto">
                                                    <div class="py-2 align-middle inline-block min-w-full">
                                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Id</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Nombre</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Email</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Dirección</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Fecha Nacimiento</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Clase Asignada</span>
                                                                            </div>
                                                                        </th>
                                                                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                            <div class="flex cursor-pointer">
                                                                                <span class="mr-2">Acciones</span>
                                                                            </div>
                                                                        </th>
                                                                        <!--<th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                                    <div class="flex cursor-pointer">
                                                                        <span class="mr-2">ACTION</span>
                                                                    </div>
                                                                </th>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    <?php

                                                                    foreach ($maestros as $maestro) {
                                                                        switch ($maestro["clase_id"]) {
                                                                            case Null:
                                                                                $claseAsignada = "Sin Asignación";
                                                                                $btn_delete = true;
                                                                                $estilo = "bg-orange-500 text-white rounded-full px-2 py-0.5";
                                                                                break;

                                                                            default:
                                                                                $claseAsignada = $maestro["nombre_clase"];
                                                                                $btn_delete = false;
                                                                                $estilo = "";
                                                                                break;
                                                                        }


                                                                    ?>
                                                                        <tr>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-md leading-5">
                                                                                <p><?= $maestro["id"] ?></p>
                                                                            </td>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-md leading-5">
                                                                                <p><?= $maestro["nombre_maestro"] ?></p>
                                                                            </td>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-md leading-5">
                                                                                <p><?= $maestro["correo"] ?></p>
                                                                                <!--<p class="text-xs text-gray-400">Hello</p>-->
                                                                            </td>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-md leading-5">
                                                                                <p><?= $maestro["direccion"] ?></p>
                                                                            </td>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-md leading-5">
                                                                                <p><?= $maestro["fecha_nac"] ?></p>
                                                                            </td>
                                                                            <td class="px-6 py-3 whitespace-no-wrap text-sm leading-5">
                                                                                <p class="<?= $estilo ?>"><?= $claseAsignada ?></p>
                                                                            </td>

                                                                            <td class="px-6 py-3 whitespace-no-wrap text-sm leading-5">
                                                                                <div class="flex space-x-4" id="open-btn">
                                                                                    <!-- href="/maestros/edit?id=<?= $maestro["id"] ?>" -->
                                                                                    <a class="text-blue-500 hover:text-blue-600" href="/maestros/edit?id=<?= $maestro["id"] ?>">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                                        </svg>
                                                                                        <p>Edit</p>
                                                                                    </a>
                                                                                    </button>
                                                                                    <?php
                                                                                    if ($btn_delete) {
                                                                                    ?>
                                                                                        <form action="/maestros/delete" method="post" style="display: inline;">
                                                                                            <input type="number" hidden value="<?= $maestro["id"] ?>" name="id">
                                                                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                                </svg>
                                                                                                <p>Delete</p>
                                                                                            </button>
                                                                                        </form>

                                                                                        <!--<a href="/maestros/delete?id=<?= $maestro["id"] ?>" class="text-red-500 hover:text-red-600">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                            </svg>
                                                                                            <p>Delete</p>
                                                                                        </a>-->

                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function data() {

            return {

                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }
    </script>
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
        gap: 1110px;
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
        padding-bottom: 12px;
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
                    <p class="font-bold text-base  text-gray-400 pt-2 text-center w-24"><?php echo $user ?></p>
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