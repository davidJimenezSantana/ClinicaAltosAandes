<?php

include("menuAdmin.php");

if (isset($_GET["sesion"]) && $_GET["sesion"] == "open") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Ingreso de sesión exitoso'
        })
    </script>
<?php
}

?>
<div class="contenedor-inicio">
    <div class="container">
        <div class="card mb-3" style="max-width: 540px; background: #02457A;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="vista/img/usuarios/user1.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenido</h5>
                        <p class="card-text">Usuario: <?php echo $usuario->getNombre() . " " . $usuario->getApellido() ?></p>
                        <p class="card-text">Rol: <?php echo $usuario->getRol()->getNombre() ?></p>
                        <p class="card-text">Correo: <?php echo $usuario->getCorreo() ?></p>
                        <p class="card-text">Telefono: <?php echo $usuario->getTelefono() ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>