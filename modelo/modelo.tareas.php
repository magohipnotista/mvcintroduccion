<?php
require_once "conexion.php";
class ModeloTareas
{
    static public function mdlTraerTareas($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    // TAREAS PERSONALES
    static public function mdlTreasPersonales($tabla, $item, $valor)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
    // EDITAR TAREAS
    static public function mdlenviartareaedit($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,apellido=:apellido,tarea=:tarea,descripcion=:descripcion,token=:token WHERE id=:id");
        $stmt->bindParam("nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam("apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam("tarea", $datos["tarea"], PDO::PARAM_STR);
        $stmt->bindParam("descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam("token", $datos["token"], PDO::PARAM_STR);
        $stmt->bindParam("id", $datos["id"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
    }
     // BORRAR TAREA
     static public function mdlBorrarTarea($tabla, $valor)
    {
        $stmt = conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }
}
