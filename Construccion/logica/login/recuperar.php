<?php

require_once ("logica/usuario/usuario.php");

if (isset($_POST["Segclave"])) {
    $Segclave = $_POST["Segclave"];
}

if (isset($_POST["clave"])) {
    $clave = $_POST["clave"];
}

if(isset($_POST["id"])){
    $id = $_POST["id"];
}


if ($Segclave == $clave){
    $usuario = new usuario($id,"","","",$clave);
    $usuario->actualizarClave();   
    header('Location: index.php?ac=correcto');
}else{
    header('Location: index.php?ac=mal');
}


?>