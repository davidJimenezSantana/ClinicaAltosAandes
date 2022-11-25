<?php

session_start();
$pid = "";
$sesion = "";
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
}
if (isset($_GET["sesion"]) && $_GET["sesion"] == "close") {
    $_SESSION["idusuario"] = null;
    $sesion = $_GET["sesion"];
}


$paglibre = array(
    "logica/autenticar.php"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>