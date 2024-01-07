<?php
require_once['DOCUMENT_ROOT'] . './config/config.php';
class DB{
    public static function query($query){
        try {
            $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");
            $sql = new mysqli($config["db_host"], $config["db_username"],$config["db_port"], $config["db_password"], $config["db_name"]);
            $rs = $sql->query($query);
            $data = $rs -> fetch_all(MYSQLI_ASSOC);
            $sql ->close();
            return $data;
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}