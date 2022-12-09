<?php
include("vista/admin/menuAdmin.php");
include("logica/paciente/paciente.php");


if (isset($_GET["add"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $documento_identidad = $_POST["DocIdentificacion"];
    $seguro = $_POST["seguro"];
    $telefono = $_POST["tel"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $idgenero = $_POST["genero"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    $paciente = new paciente(0,$nombre,$apellido,$documento_identidad,$seguro,$telefono,$correo,$direccion,$idgenero,$fecha_nacimiento);

    if ($paciente->validarExistencia()) {
        $paciente->agregarPaciente();
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
                title: 'Se agrego el paciente correctamente'
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
                title: 'El paciente ya está registrador'
            })
        </script>
<?php
    }
}


$paciente = new paciente();
$genero = new genero();
$generos = $genero->verGeneros();

?>

<div class="contenedor-gestion">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-3">
                <div class="row">
                    <div class="col-5 col-md-5 col-lg-5">
                        <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionPaciente/gestionPacientes.php") ?>">
                            <box-icon type='solid' name='left-arrow-alt' color='snow'></box-icon>
                            Volver
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h1>AGREGAR PACIENTE</h1>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="contenedor-formAgregar">
                    <form action="index.php?add&pid=<?php echo base64_encode("vista/gestionPaciente/agregar.php") ?>" method="post" class="needs-validation" novalidate>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="DocIdentificacion" class="form-label">Numero de identificacion: </label>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" id="DocIdentificacion" name="DocIdentificacion" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el numero de identidad del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="nombre" class="form-label">Nombres: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese los nombres del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="apellido" class="form-label">Apellidos: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese los apellidos del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="seguro" class="form-label">Seguro: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="seguro" name="seguro" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el seguro del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="tel" class="form-label">Telefono: </label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control" id="tel" name="tel" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el telefono del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="correo" class="form-label">Correo: </label>
                            </div>
                            <div class="col-9">
                                <input type="email" class="form-control" id="correo" name="correo" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese el correo del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label for="direccion" class="form-label">Direccion: </label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese la direccion del paciente.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="genero">Genero: </label>
                                <select class="form-select" aria-label="Default select example" name="genero" aria-placeholder="Genero">
                                    <?php
                                    foreach ($generos as $generoActual) {
                                    ?>
                                        <option value="<?php echo $generoActual->getIdgenero() ?>"> <?php echo $generoActual->getNombre() ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="fecha_nacimiento">Fecha de nacimiento: </label>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
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