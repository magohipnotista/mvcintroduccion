<?php
class controladorUsuarios
{
    static public function ctrNuevoUsuario()
    {
        if (isset($_POST["email"])) {
            // VALIDACION POR PARTE DEL SERVIDOR
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['email']) && preg_match('/^[a-zA-Z0-9\W_]+$/', $_POST['password'])) {
                $encriptar_password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla = "usuarios";
                $datos = array(
                    "email" => $_POST["email"],
                    "password" => $encriptar_password,
                );
                $respuesta = modeloUsuarios::mdlNuevoUsuario($tabla, $datos);
                return $respuesta;
            } else {
                return "error";
            }
        }
    }
    // INGRESOUSUARIO
    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["ingresoemail"])) {
            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['ingresoemail']) && preg_match('/^[a-zA-Z0-9\W_]+$/', $_POST['ingresopassword'])) {
                $item = "email";
                $valor = $_POST["ingresoemail"];
                $tabla = "usuarios";
                $respuesta = modeloUsuarios::mdltraerUsuarios($tabla, $item, $valor);
                if (!empty($respuesta) && $respuesta["email"] == $_POST["ingresoemail"]) {
                    $encriptar_password = crypt($_POST["ingresopassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    if ($respuesta["password"] ==  $encriptar_password) {
                        $usuarioID = $respuesta["id"];
                        $secreto = "clave_secreta";
                        $hash = hash('sha256', $secreto . $usuarioID);
                        $_SESSION["validarSesion"] = "ok";
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["dato_unico"] = $hash;
                        return 'ok';
                    } else {
                        return 'contrasena_incorrecta';
                    }
                } else {
                    return 'usuario_no_existe';
                }
            } else {
                return 'no_se_aceptan_caracteres_especiales';
            }
        }
    }

    // VALIDAR EMAIL REPETIDO
    static public function ctremailrepetido($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlemailrepetido($tabla, $item, $valor);
        return $respuesta;
    }
    //  ENVIAR TAREA
    static public function ctrenviartarea()
    {
        if (isset($_POST["nombre"])) {
            $tabla = "tareas";
            $datos = array(
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "tarea" => $_POST["tarea"],
                "descripcion" => $_POST["descripcion"],
                "token" =>$_SESSION["dato_unico"]
            );
            $respuesta = ModeloUsuarios::mdlenviartarea($tabla,$datos);
            return $respuesta;
        }
    }
}
