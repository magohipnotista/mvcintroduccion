<?php
require_once "conexion.php";
class modeloUsuarios
{
    static public function mdlNuevoUsuario($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (email,password) VALUES (:email,:password)");
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }
    // TRAER USUARIOS
    static public function mdltraerUsuarios($tabla,$item,$valor){
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt ->bindParam(":".$item,$valor,PDO::PARAM_STR);
        $stmt ->execute();
        return $stmt->fetch();
        $stmt= null;
    }
    // VALIDAR EMAIL REPETIDO
    static public function mdlemailrepetido($tabla, $item, $valor)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt = null;
    }
    //  ENVIAR TAREA
    static public function mdlenviartarea($tabla,$datos){
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tarea,descripcion,token) VALUES (:nombre,:apellido,:tarea,:descripcion,:token)");
        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
        $stmt->bindParam(":tarea",$datos["tarea"],PDO::PARAM_STR);
        $stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }
}
