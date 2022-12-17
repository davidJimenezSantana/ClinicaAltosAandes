<?php
include("vista/admin/menuAdmin.php");


if (isset($_GET["add"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $tel = $_POST["tel"];
    $rol = $_POST["rol"];
    $especialidad = $_POST["especialidad"];
    $estado = $_POST["estado"];

    $usuario = new usuario(0, "", "", $correo, "", 0, 0, "", "", "", $estado);


    if (!$usuario->verExistenciaCorreo()) {

        if ($usuario->numContratos()) {

           
            $usuario = new usuario(0, $nombre, $apellido, $correo, $clave, $rol, $especialidad, $tel,"","",$estado);
            $usuario->agregarUsuario();
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
                    title: 'Se agrego el usuario correctamente'
                })
            </script>
        <?php
        } else {
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
                    icon: 'error',
                    title: 'El número de personas contratadas ya es el maximo'
                })
            </script>
        <?php
        }
    } else {

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
                icon: 'error',
                title: 'El correo pertenece a un usuario existente'
            })
        </script>
<?php
    }
}

$u = new usuario();
$rol = new rol();
$roles = $rol->verRoles();
$especialidad = new especialidad();
$especialidades = $especialidad->verEspecialidades();
$estado = new estado_usuario();
$estados = $estado->verEstados();

?>

<div class="contenedor-gestion">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-3">
                <div class="row">
                    <div class="col-5 col-md-5 col-lg-5">
                        <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/gestionUsuarios.php") ?>">
                            <box-icon type='solid' name='left-arrow-alt' color='snow'></box-icon>
                            Volver
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <h1>AGREGAR USUARIO</h1>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="contenedor-formAgregar">
                    <form action="index.php?add&pid=<?php echo base64_encode("vista/gestionUsuarios/agregar.php") ?>" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombres: </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese los nombres del usuario.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellidos: </label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese los apellidos del usuario.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo: </label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese el correo del usuario.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña: </label>
                            <input type="password" class="form-control" id="clave" name="clave" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese clave del usuario.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Telefono: </label>
                            <input type="number" class="form-control" id="tel" name="tel" required>
                            <div class="valid-feedback">
                                Ok!
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese el telefono del usuario.
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="rol">Rol:</label>
                                    <select class="form-select" aria-label="Default select example" name="rol">
                                        <?php
                                        foreach ($roles as $rolActual) {
                                        ?>
                                            <option value="<?php echo $rolActual->getIdrol() ?>"><?php echo $rolActual->getNombre() ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="rol">Estado:</label>
                                    <select class="form-select" aria-label="Default select example" name="estado">
                                        <?php
                                        foreach ($estados as $estadoActual) {
                                        ?>
                                            <option value="<?php echo $estadoActual->getIdestado_usuario() ?>"><?php echo $estadoActual->getNombre() ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Especialidad: </label>
                                <select class="form-select" aria-label="Default select example" name="especialidad">
                                    <?php
                                    foreach ($especialidades as $especialidadActual) {
                                    ?>
                                        <option value="<?php echo $especialidadActual->getIdespecialidad() ?>"><?php echo $especialidadActual->getNombre() ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el la especialidad del usuario.
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Agregar <box-icon name='user-plus' type='solid' color='snow'></box-icon></button>
                    </form>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>

    </div>
</div>