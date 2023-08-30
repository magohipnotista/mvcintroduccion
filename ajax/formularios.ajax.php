<?php
require_once "../controlador/controlador.usuarios.php";
require_once "../modelo/modelo.usuarios.php";

class ajaxformularios
{
    public $validarEmail;
    public function ajaxValidarEmail()
    {
        $item = "email";
        $valor = $this->validarEmail;
        $respuesta = ControladorUsuarios::ctremailrepetido($item, $valor);
        echo json_encode($respuesta);
    }
    
   
}
if (isset($_POST["validarEmail"])) {
    $valEmail = new ajaxformularios();
    $valEmail->validarEmail = $_POST["validarEmail"];
    $valEmail->ajaxValidarEmail();
}