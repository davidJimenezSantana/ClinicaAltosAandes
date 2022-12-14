<?php
include("vista/admin/menuAdmin.php");


/* 
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $usuario = new usuario($id);
    $usuario->eliminarUsuario();
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
            title: 'Se Elimino el usuario correctamente'
        })
    </script>
<?php
}
 */
if (isset($_GET["edit"])) {
    $id = $_POST["idusuario"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"]; 
    $tel = $_POST["tel"];
    $rol = $_POST["rol"];
    $especialidad = $_POST["especialidad"];
    $estado = $_POST["estado"];

    $usuario = new usuario($id, $nombre, $apellido, $correo, "", $rol, $especialidad, $tel,"","",$estado);
    $usuario->editarUsuario();

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
            title: 'Se modifico los datos del usuario correctamente'
        })
    </script>
<?php
}


$u = new usuario();
$usuarios = $u->verUsuarios(); //arreglo de usuarios


$rol = new rol();
$roles = $rol->verRoles();
$especialidad = new especialidad();
$especialidades = $especialidad->verEspecialidades();


$estado = new estado_usuario();
$estados = $estado->verEstados();

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
                <h1>GESTI??N DE USUARIO</h1>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row">
            <div class="col-3 col-md-3 col-lg-2">
                <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/agregar.php") ?>">
                    <box-icon name='user-plus' type='solid' color='snow'></box-icon>
                    Agregar usuario
                </a>
            </div>
            <div class="col-2 col-md-2 col-lg-2">
                <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/gestionEspecialidades.php") ?>">
                    <box-icon name='universal-access' color='snow'></box-icon>
                    Especialidades
                </a>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-8">
                <div class="tabla-gestion">
                    <table class="table-light hover row-border" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Tel.</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Estado</th>                                
                                <th scope="col">Opc.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $usuarioActual) {
                            ?>
                                <tr>
                                    <td><?php echo $usuarioActual->getNombre() ?></td>
                                    <td><?php echo $usuarioActual->getApellido() ?></td>
                                    <td><?php echo $usuarioActual->getCorreo() ?></td>
                                    <td><?php echo $usuarioActual->getTelefono() ?></td>
                                    <td><?php echo $usuarioActual->getRol()->getNombre() ?></td>
                                    <td><?php echo $usuarioActual->getEspecialidad()->getNombre() ?></td>
                                    <td><?php echo $usuarioActual->getEstado()->getNombre() ?></td>
                                    <td>
                                        <button class="btn-opcion btn-editar" id="btn-editarUsuario" onclick="cargarContacto('<?php echo $usuarioActual->getIdusuario() ?>','<?php echo $usuarioActual->getNombre() ?>', '<?php echo $usuarioActual->getApellido() ?>', '<?php echo $usuarioActual->getCorreo() ?>', '<?php echo $usuarioActual->getRol()->getIdrol() ?>', '<?php echo $usuarioActual->getTelefono() ?>', '<?php echo  $usuarioActual->getEspecialidad()->getIdespecialidad() ?>' , '<?php echo $usuarioActual->getEstado()->getIdestado_usuario() ?>')">
                                            <box-icon class="editar" name='edit-alt' color='#02457a'></box-icon>
                                        </button>
                                        <!-- <button class="btn-opcion btn-eliminarUsuario" id="btn-eliminarUsuario" onclick="eliminarUsuario(<?php echo $usuarioActual->getIdusuario() ?>)">
                                            <box-icon name='trash' type='solid' color='#02457a'></box-icon>
                                        </button> -->
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
                    <form id="formularioEditar" action="index.php?edit&pid=<?php echo base64_encode("vista/gestionUsuarios/gestionUsuarios.php") ?>" method="post" class="needs-validation" novalidate>
                        <h3>Editar usuario</h3>
                        <div class="mb-3" hidden>
                            <input type="number" class="form-control" id="idusuario" name="idusuario" required>
                        </div>
                        <div class="mb-3" hidden>
                            <input type="number" class="form-control" id="rol" name="rol" required>
                        </div>
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
                                    <label for="">Estado:</label>
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
                                <div class="col-6">
                                <label for="">Especialidad:</label>
                                    <select class="form-select" aria-label="Default select example" name="especialidad">
                                        <?php
                                        foreach ($especialidades as $especialidadActual) {
                                        ?>
                                            <option value="<?php echo $especialidadActual->getIdespecialidad() ?>"><?php echo $especialidadActual->getNombre() ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Editar <box-icon class="editar" name='edit-alt' color='snow'></box-icon></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
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
            title: 'Eliminando usuario',
            text: "??Est?? seguro de eliminar al usuario",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, deseo eliminarlo',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.assign("index.php?pid=<?php echo base64_encode('vista/gestionUsuarios/gestionUsuarios.php') ?>&delete=" + id)
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Eliminaci??n cancelada!',
                    'El usuario NO sido eliminado',
                    'OK'
                )
            }
        })

    }
</script> -->