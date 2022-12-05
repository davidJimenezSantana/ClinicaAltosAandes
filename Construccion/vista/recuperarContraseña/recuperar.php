<?php

include("logica/usuario/usuario.php");

$tokenUser = "";
$idRecuperar = "";

$Segclave = "";
$clave = "";

if (isset($_GET["idRecuperar"])) {
    $idRecuperar = $_GET["idRecuperar"];
}
if (isset($_GET["tokenUser"])) {
    $tokenUser = $_GET["tokenUser"];
}

$usuario = new usuario($idRecuperar);
$usuario->recuperarToken();
$usuario->consultarUsuario();


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
            <div class="col-2">

            </div>
            <div class="col-8">
                <div class="cont-formLogin">
                    <?php
                    if ($usuario->getToken() == $tokenUser) {
                    ?>
                        <div>
                            <form style="width: 100%;" action="index.php?pid=<?php echo base64_encode('logica/login/recuperar.php') ?>" method="POST" class="needs-validation" id="formulario" novalidate>
                                <h2>Bienvenido <?php echo $usuario->getNombre() . " " . $usuario->getApellido() ?></h2>

                                <h4>Por favor ingrese su nueva contraseña</h5>
                                    <div class="row">
                                        <div class="col-3">

                                        </div>
                                        <div class="col-6">
                                        <div class="mb-3">
                                                <input type="password" class="form-control" value="<?php echo $usuario->getIdusuario() ?>" id="id" name="id" hidden>                                            
                                            </div>
                                            <div class="mb-3">
                                                <label for="clave" class="form-label">Nueva contraseña: </label>
                                                <input type="password" class="form-control" id="clave" name="clave" placeholder="****" required>
                                                <div class="valid-feedback">
                                                    Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Por favor una contraseña valida.
                                                </div>
                                            </div>
                                            <div class="mb-3 ">
                                                <label for="Segclave" class="form-label">Confirme la nueva contraseña: </label>
                                                <input type="password" class="form-control" id="Segclave" name="Segclave" placeholder="****" required>
                                                <div class="valid-feedback">
                                                    Ok!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Por favor una contraseña valida.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>
                            </form>
                            <button id="actualizarContraseña" class="btn-formulario">Actualizar contraseña</button>
                        </div>

                    <?php
                    } else {
                       
                    }

                    ?>

                </div>
            </div>
            <div class="col-2">

            </div>


        </div>
    </div>
</div>

<script>
    let btn_actualizar = document.getElementById("actualizarContraseña");
    btn_actualizar.addEventListener("click", validarContraseñas);

    function validarContraseñas() {
        var claveUno = document.getElementById("clave").value;
        var claveDos = document.getElementById("Segclave").value;

        if(claveUno == "" || claveDos == ""){
            Swal.fire({
                title: 'Datos Incorrectos',
                text: 'Las contraseñas no pueden estar vacias',
                icon: 'error',
                confirmButtonText: 'ok',
                timer: 3000
            })
        }else if (claveUno == claveDos) {
            console.log("claveUno"); 
            var formulario = document.getElementById("formulario");
            formulario.submit();
        } else {
            Swal.fire({
                title: 'Datos Incorrectos',
                text: 'Las contraseñas no coinciden',
                icon: 'error',
                confirmButtonText: 'ok',
                timer: 3000
            })
        }

    }
</script>