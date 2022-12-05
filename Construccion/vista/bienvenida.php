<div class="body-bienvenida">
    <div class="inicio">

        <div class="row tit-inicio">

            <h1>
                <img src="vista/img/icon/IconAltosAndes.png" alt="Clinica Altos de los Andes">
                Clinica Altos de los Andes
            </h1>
        </div>
        <div class="row">
            <div class="col-8 col-xxl-9">
                <div class="cont-carousel">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="vista/img/carrusel/img1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="vista/img/carrusel/img2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="vista/img/carrusel/img3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xxl-3">
                <div class="cont-formLogin">
                    <form style="width: 100%;" action="index.php?pid=<?php echo base64_encode('logica/login/autenticar.php') ?>" method="POST" class="needs-validation" novalidate>
                        <h1>Ingresar</h1>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo: </label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="sucorreo@correo.com" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese un correo valido.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña: </label>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="*********" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese la contraseña.
                            </div>
                        </div>
                        <a href="index.php?pid=<?php echo base64_encode("vista/recuperarContraseña/envioCorreo.php") ?>">Recuperar contraseña</a>
                        <button type="submit" class="btn-formulario">Entrar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php

if (isset($_GET["invalid"])) {
?>
    <script>
        Swal.fire({
            title: '¡Usuario no encontrado!',
            text: 'Los datos ingresados no pertenecen a ningún usuario.',
            icon: 'error',
            confirmButtonText: 'ok'
        })
    </script>

<?php
}

if ($sesion == "close") {
?>
    
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
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
            title: 'Cierre de sesión exitoso'
        })
    </script>
<?php
}
?>