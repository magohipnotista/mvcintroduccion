<?php
require_once "vista/modulos/creardb.php";

require_once "controlador/controlador.plantilla.php";
require_once "controlador/controlador.usuarios.php";
require_once "controlador/controlador.tareas.php";

require_once "modelo/modelo.usuarios.php";
require_once "modelo/rutas.php";
require_once "modelo/modelo.tareas.php";

$plantilla = new ControladorPLantilla();
$plantilla -> ctrTraerPlantilla();