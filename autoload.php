<?php
spl_autoload_register(function($clase){
    $archivos = __DIR__ . "/". $clase. ".php";
    $archivos = str_replace("\\","/", $archivos);

    if(is_file($archivos)){
        require_once $archivos;
    }
});