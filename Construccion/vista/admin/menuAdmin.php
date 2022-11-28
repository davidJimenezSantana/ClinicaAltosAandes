<?php

include("logica/usuario/usuario.php");

$usuario = new usuario($_SESSION["idusuario"]);
$usuario->consultarUsuario();

?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("vista/admin/inicioAdmin.php") ?>">
            <img src="vista/img/icon/IconAltosAndes.png" alt="Bootstrap" width="40" height="34">
        </a>
        <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("vista/admin/inicioAdmin.php") ?>"><?php echo $usuario->getRol()->getNombre() . ": " . $usuario->getNombre() . " " . $usuario->getApellido(); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="justify-content: flex-end;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end;">
            <ul class="navbar-nav">
                <a class="nav-link" aria-current="page" style="display: flex; align-items: center;" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/gestionUsuarios.php") ?>">
                    <box-icon name='user' type='solid' color='snow'></box-icon>
                    Gestion de usuarios
                </a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Vista/buscarProducto.php') ?>">Buscar</a></li>
                        <li><a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Vista/agregarProducto.php') ?>">Agregar</a></li>
                    </ul>
                </li>
                <a class="nav-link" aria-current="page" href="index.php?sesion=close">Cerrar sesión</a>
            </ul>
        </div>
    </div>
</nav>