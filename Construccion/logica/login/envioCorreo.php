<?php
include("logica/usuario/usuario.php");

$correo = "";
if (isset($_POST["correo"])) {
    $correo = trim($_POST["correo"]); //Quitamos algun espacion en blanco
}

$usuario = new usuario(0, "", "", $correo, "", 0, 0, "",);

if ($usuario->verExistenciaCorreo()) {

    $length = 25;
    $x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz';
    $miTokenClave  = substr(str_shuffle($x), 5, $length);

    $usuario->setToken($miTokenClave);
    $usuario->guardarToken();

    $usuario->consultarUsuario();


    $linkRecuperar = "http://localhost/clinicaAA/ClinicaAA/Construccion/index.php?pid=" . base64_encode("vista/recuperarContraseña/recuperar.php") . "&idRecuperar=" . $usuario->getIdusuario() . "&tokenUser=" . $miTokenClave;
    $destinatario = $correo;
    $asunto = "Recuperando Clave - Clínica Los Altos de los Andes";

    $cuerpo = '<!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Recuperar Clave de Usuario</title>';
    $cuerpo .= '<style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: "Roboto", sans-serif;
                font-size: 16px;
                font-weight: 300;
                color: #888;
                background-color: rgba(230, 225, 225, 0.5);
                line-height: 30px;
                text-align: center;
            }

            .contenedor {
                width: 80%;
                min-height: auto;
                text-align: center;
                margin: 0 auto;
                background: #d6e8ee;
                border-top: 3px solid #001b48;
                padding-bottom: 10px;
            }

            .btn-formulario {
                width: 100%;            
                background-color: #001b48;
                border: 1px solid #d6e8ee;
                color: #d6e8ee;
                border-radius: 10px;
                padding: 10px;
            }

            .btn-formulario:hover {
                width: 100%;
                background-color: #d6e8ee;
                border: 1px solid #001b48;
                color: #001b48;
                font-weight: bolder;
            }


            .misection {
                color: #34495e;
                margin: 4% 10% 2%;
                text-align: center;
                font-family: sans-serif;
            }

            .tit-inicio {
                text-align: center;
                padding-top: 20px;
                color: #02457A;
            }

            </style>';

    $cuerpo .= '</head>
            <body>
                <div class="contenedor">

                    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                        <tr>
                            <div class="row tit-inicio">

                                <h1>
                                    Clinica Altos de los Andes
                                </h1>
                            </div>
                        </tr>

                        <tr>
                            <td style="background-color: #ffffff;">
                                <div class="misection">
                                    <h2 style="color: #001b48; margin: 0 0 7px">Hola ' . $usuario->getNombre() . ' ' . $usuario->getApellido() . '</h2>
                                    <p style="margin: 2px; font-size: 18px">Pediste un correo para reestablecer tu contraseña </p>
                                    <p>&nbsp;</p>
                                    <p style="margin: 2px; font-size: 18px">Entra en el link para que puedas recuperar tu contraseña </p>
                                    <p>&nbsp;</p>
                                    <a href=' . $linkRecuperar . ' class="btn-formulario">Recuperar mi clave</a>
                                    <p>&nbsp;</p>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </body>

            </html>';

    $header  = "Clínica Los Altos de los Andes";
    if(mail($destinatario, $asunto, $cuerpo, $header)){
        echo "enviado";
    }else{
        echo "no enviado";
    }
            echo($cuerpo);
} else {
    header("location: index.php?pid=" . base64_encode('vista/recuperarContraseña/envioCorreo.php') . "&correo=invalid");
}
