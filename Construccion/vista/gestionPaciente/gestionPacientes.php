<?php
include("vista/admin/menuAdmin.php");
include("logica/paciente/paciente.php");


if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $paciente = new paciente($id);
    $paciente->eliminarPaciente();
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
            title: 'Se Elimino el paciente correctamente'
        })
    </script>
<?php
}

if (isset($_GET["edit"])) {
    $idpaciente = $_POST["idPaciente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $documento_identidad = $_POST["DocIdentificacion"];
    $seguro = $_POST["seguro"];
    $telefono = $_POST["tel"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $idgenero = $_POST["genero"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    $paciente = new paciente($idpaciente, $nombre, $apellido, $documento_identidad, $seguro, $telefono, $correo, $direccion, $idgenero, $fecha_nacimiento);
    $paciente->editarPaciente();

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
            title: 'Se modifico los datos del paciente correctamente'
        })
    </script>
<?php
}


$paciente = new paciente();
$pacientes = $paciente->verPacientes(); //arreglo de usuarios


$genero = new genero();
$generos = $genero->verGeneros();
?>

<script>
    $(document).ready(function() {
        $('#tablaUsuarios').DataTable({
            paging: false,
            scrollY: 400,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json'
            }
        });
    });
</script>

<div class="contenedor-gestion">
    <div class="container-fluid">
        <div class="row titulo-gestion">
            <div class="col-3">
            </div>
            <div class="col-6">
                <h1>GESTIÓN DE PACIENTES</h1>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-3 col-lg-2">
                <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionPaciente/agregar.php") ?>">
                    <box-icon name='user-plus' type='solid' color='snow'></box-icon>
                    Agregar pacientes
                </a>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-9">
                <div class="tabla-gestion">
                    <table class="table-light hover row-border" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th scope="col">Doc identidad</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Opciones</th>
                                <th scope="col">Historia Clinica</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pacientes as $pacienteActual) {
                            ?>
                                <tr>

                                    <td><?php echo $pacienteActual->getDocumento_identidad() ?></td>
                                    <td><?php echo $pacienteActual->getNombre() ?></td>
                                    <td><?php echo $pacienteActual->getApellido() ?></td>
                                    <td><?php echo $pacienteActual->getTelefono() ?></td>
                                    <td><?php echo $pacienteActual->getCorreo() ?></td>
                                    <td>
                                        <button class="btn-opcion btn-editar" id="btn-editarUsuario" onclick="cargarPaciente('<?php echo $pacienteActual->getIdpaciente() ?>','<?php echo $pacienteActual->getNombre() ?>', '<?php echo $pacienteActual->getApellido() ?>', '<?php echo $pacienteActual->getDocumento_identidad() ?>', '<?php echo $pacienteActual->getseguro() ?>', '<?php echo  $pacienteActual->getTelefono() ?> ', '<?php echo  $pacienteActual->getCorreo() ?>', '<?php echo  $pacienteActual->getDireccion() ?>', '<?php echo  $pacienteActual->getGenero()->getIdgenero() ?>', '<?php echo  $pacienteActual->getFecha_nacimiento() ?>')">
                                            <box-icon class="editar" name='edit-alt' color='#02457a'></box-icon>
                                        </button>
                                        <button class="btn-opcion btn-eliminarUsuario" id="btn-eliminarUsuario" onclick="eliminarUsuario(<?php echo $pacienteActual->getIdpaciente() ?>)">
                                            <box-icon name='trash' type='solid' color='#02457a'></box-icon>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="index.php?pid=<?php echo base64_encode("vista/gestionPaciente/historiaClinica.php") ?>&idpaciente=<?php echo $pacienteActual->getIdpaciente() ?>">
                                            <button class="btn-opcion btn-historiClinica" style="display: flex; align-items: center;" id="btn-historiClinica">
                                                <box-icon name='paste' color="#02457a"></box-icon>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-3">
                <div class="contenedor-formEditar" id="contenedor-formEditar">
                    <form id="formularioEditar" action="index.php?edit&pid=<?php echo base64_encode("vista/gestionPaciente/gestionPacientes.php") ?>" method="post" class="needs-validation" novalidate>
                        <h3>Editar datos de paciente</h3>
                        <div hidden>
                            <input type="number" class="form-control" id="idPaciente" name="idPaciente" required>
                        </div>
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
                        <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Editar <box-icon class="editar" name='edit-alt' color='snow'></box-icon></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const btnEliminar = document.getElementsByClassName("btn-eliminarUsuario");


    function eliminarUsuario(a) {

        var id = Number(a);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Eliminando Paciente',
            text: "¿Está seguro de eliminar al Paciente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, deseo eliminarlo',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.assign("index.php?pid=<?php echo base64_encode('vista/gestionPaciente/gestionPacientes.php') ?>&delete=" + id)
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Eliminación cancelada!',
                    'El Paciente NO sido eliminado',
                    'OK'
                )
            }
        })

    }
</script>