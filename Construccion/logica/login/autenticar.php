<?php

require_once ("logica/usuario/usuario.php");

$clave = "";
$correo = "";

if (isset($_POST["clave"])) {
    $clave = $_POST["clave"];
}

if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];
}

$usuario = new usuario(0, "", "", $correo, $clave, 0, 0, "");

if($usuario ->autenticar()){    
    $_SESSION["idusuario"] = $usuario->getIdusuario();
    $usuario -> consultarRolUsuario();

    if($usuario->getIdrol() == 1){
        header('Location: index.php?sesion=open&pid=' . base64_encode("vista/admin/inicioAdmin.php"));
    }else if($usuario->getIdrol() == 2){
        header('Location: index.php?sesion=open&pid=' . base64_encode("vista/doctor/inicioDoctor.php"));
    }

}else{
    header('Location: index.php?invalid');
}

?>