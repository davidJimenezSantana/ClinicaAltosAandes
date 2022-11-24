<?php

require_once ("usuario/usuario.php");

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
    echo "Clave: " . $clave . " y correo: " . $correo;
}else{
    echo "Paila.";
}

?>