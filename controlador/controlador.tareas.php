<?php
class ControladorTareas
{
    static public function ctrTraertareas()
    {
        $tabla = "tareas";
        $respuesta = ModeloTareas::mdlTraerTareas($tabla);
        return $respuesta;
    }
    // TAREAS PERSONALES
    static public function ctrTreasPersonales($item, $valor)
    {
        $tabla = "tareas";
        $respuesta = ModeloTareas::mdlTreasPersonales($tabla, $item, $valor);
        return $respuesta;
    }
    // EDITAR TAREAS
    static public function ctrenviartareaedit()
    {
        if (isset($_POST["nombre_edit"])) {
            $tabla = "tareas";
            $datos = array(
                "nombre" => $_POST["nombre_edit"],
                "apellido" => $_POST["apellido_edit"],
                "tarea" => $_POST["tarea_edit"],
                "descripcion" => $_POST["descripcion_edit"],
                "token" => $_SESSION["dato_unico"],
                "id"=>$_POST["id"]
            );
            $respuesta = ModeloTareas::mdlenviartareaedit($tabla,$datos);
            return $respuesta;
        }
    }
    // BORRAR TAREA
    static public function ctrBorrarTarea(){
        if(isset($_POST["id_borrar"])){
            $tabla ="tareas";
            $valor = $_POST["id_borrar"];
            $respuesta = ModeloTareas::mdlBorrarTarea($tabla,$valor);
            return $respuesta;
        }
    }
}
