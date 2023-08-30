<?php
$nombre_base_de_datos = "crudphp";
try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $nombre_base_de_datos");
    $pdo->exec("USE $nombre_base_de_datos");

    // TABLA TAREAS
    $pdo->exec("CREATE TABLE IF NOT EXISTS tareas (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nombre`  text NOT NULL,
        `apellido` text NOT NULL,
        `tarea` text NOT NULL,
        `descripcion` text NOT NULL,
        `token` text NOT NULL,
        `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
        )");
    //TABLA USUARIOS
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` text NOT NULL,
        `password` text NOT NULL,
        `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
        )");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
