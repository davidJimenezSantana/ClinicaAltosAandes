<?php

session_start();
$pid = "";
$sesion = "";
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}

if (isset($_GET["sesion"])) {
    $sesion = $_GET["sesion"];
}


$paglibre = array(
    "logica/login/autenticar.php",
    "logica/login/envioCorreo.php",
    "logica/login/recuperar.php",
    "vista/recuperarContraseña/envioCorreo.php",
    "vista/recuperarContraseña/recuperar.php"
);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="vista/img/icon/IconAltosAndes.png" type="image/x-icon">

    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



    <title>Altos de los Andes</title>
</head>

<body>


    <?php
    if ($pid != "" && (in_array($pid, $paglibre) || $_SESSION["idusuario"] != null)) {
        include($pid);
    } else {
        include("vista/bienvenida.php");
    }

    ?>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>


    <?php

    if (isset($_GET["ac"])) {
        $actualizar = $_GET["ac"];
        if ($actualizar == "correcto") {
    ?>
            <script>
                Swal.fire({
                    title: 'Su contraseña ha sido actualizada',
                    text: 'Por favor vuelva a iniciar sesion',
                    icon: 'success',
                    confirmButtonText: 'ok',
                    timer: 3000
                })
            </script>
        <?php
        } else if ($actualizar == "mal") {
        ?>
            <script>
                Swal.fire({
                    title: 'Error al actualizar su contraseña',
                    icon: 'error',
                    confirmButtonText: 'ok',
                    timer: 3000
                })
            </script>
    <?php
        }
    }
    ?>



    <script src="javascript.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>