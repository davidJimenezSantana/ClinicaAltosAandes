<?php
if (isset($_GET["correo"]) && $_GET["correo"] == "invalid") {
?>
    <script>
        Swal.fire({
            title: 'Datos Incorrectos',
            text: 'El correo no pertenece a ningun usuario',
            icon: 'error',
            confirmButtonText: 'ok',
            timer: 2000
        })
    </script>
<?php
}
?>

<div class="body-bienvenida">
    <div class="inicio">

        <div class="row tit-inicio">

            <h1>
                <img src="vista/img/icon/IconAltosAndes.png" alt="Clinica Altos de los Andes">
                Clinica Altos de los Andes
            </h1>
        </div>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <div class="cont-formLogin">
                    <form style="width: 100%;" action="index.php?pid=<?php echo base64_encode('logica/login/envioCorreo.php') ?>" method="POST" class="needs-validation" novalidate>
                        <h2>Recuperar contraseña</h2>
                        <h5>Por favor ingrese su correo electronico</h5>
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
                        <a href="index.php">volver</a>
                        <button type="submit" class="btn-formulario">Recuperar</button>
                    </form>
                </div>
            </div>
            <div class="col-4">

            </div>


        </div>
    </div>
</div>