<?php

$clave = "";
$correo = "";

if (isset($_POST["clave"])) {
    $clave = $_POST["clave"];
}

if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];
}

echo "Clave: " . $clave . " y correo: " . $correo;