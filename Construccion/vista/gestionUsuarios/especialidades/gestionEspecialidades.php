<?php
include("vista/admin/menuAdmin.php");



if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $especialidad = new especialidad($id);
    $especialidad->eliminarEspecialidades();
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
            title: 'Se Elimino la especialidad correctamente'
        })
    </script>
<?php
}

if (isset($_GET["edit"])) {
    $id = $_POST["idespecialidad"];
    $nombre = $_POST["nombre"];

    $especialidad = new especialidad($id, $nombre,);
    $especialidad->editarEspecialidad();

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
            title: 'Se modificó la especialidad correctamente'
        })
    </script>
<?php
}

$especialidad = new especialidad();
$especialidades = $especialidad->verEspecialidades();
?>

<script>
    $(document).ready(function() {
        $('#tablaEspescialidades').DataTable({
            paging: false,
            scrollY: 400,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-CO.json'
            }
        });
    });
</script>


<div class="contenedor-gestion">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-3"></div>
            <div class="col-6">
                <h1>GESTIÓN DE ESPECIALIDADES</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3 col-md-3 col-lg-2">
                <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/agregar.php") ?>">
                    <box-icon name='user-plus' type='solid' color='snow'></box-icon>
                    Agregar especialidad
                </a>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-8">
                <div class="tabla-gestion">
                    <table class="table-light tablaEspecialidades hover row-border" id="tablaEspescialidades">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($especialidades as $especialidadActual) {
                            ?>
                                <tr>
                                    <td><?php echo $especialidadActual->getIdespecialidad()  ?></td>
                                    <td><?php echo $especialidadActual->getNombre() ?></td>
                                    <td>
                                        <button class="btn-opcion btn-editar" id="btn-editarEspecialidad" onclick="cargarEspecialidad('<?php echo $especialidadActual->getIdespecialidad()  ?>','<?php echo $especialidadActual->getNombre() ?>')">
                                            <box-icon class="editar" name='edit-alt' color='#02457a'></box-icon>
                                        </button>
                                        <button class="btn-opcion btn-eliminarEspecialidad" id="btn-eliminarEspecialidad" onclick="eliminarEspecialidad(<?php echo $especialidadActual->getIdespecialidad() ?>)">
                                            <box-icon name='trash' type='solid' color='#02457a'></box-icon>
                                        </button>
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
                <div class="row">
                    <div class="contenedor-formEditar" id="contenedor-formEditar">
                        <form id="formularioEditar" action="index.php?edit&pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/gestionEspecialidades.php") ?>" method="post" class="needs-validation" novalidate>
                            <h3>Editar usuario</h3>
                            <div class="mb-3" hidden>
                                <input type="number" class="form-control" id="idespecialidad" name="idespecialidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombres: </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese los nombres de la especialidad.
                                </div>
                            </div>
                            <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Editar <box-icon class="editar" name='edit-alt' color='snow'></box-icon></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function eliminarEspecialidad(a) {

        var id = Number(a);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Eliminando especialidad',
            text: "¿Está seguro de eliminar la especialidad",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, deseo eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                window.location.assign("index.php?pid=<?php echo base64_encode('vista/gestionUsuarios/especialidades/gestionEspecialidades.php') ?>&delete=" + id)
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Eliminación cancelada!',
                    'La especialidad NO sido eliminada',
                    'OK'
                )
            }
        })

    }
</script>