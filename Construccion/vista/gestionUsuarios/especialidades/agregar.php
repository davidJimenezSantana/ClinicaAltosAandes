<?php
include("vista/admin/menuAdmin.php");

$cantAgregar = 1;
$nombre = [];

if (isset($_POST["cantAgregar"])) {
    $cantAgregar = $_POST["cantAgregar"];
?>
    <script>
        $(document).ready(function() {
            document.getElementById("cantAgregar").value = <?php echo $cantAgregar ?>
        });
    </script>
    <?php
}


if (isset($_GET["add"])) {
    $nombres = $_POST["nombreEspecialidad"];
    $cant = count($nombre);
    if ($cant != 1) {
        foreach ($nombres as $nombre) {
            $especialidad = new especialidad(0, $nombre);
            $especialidad->agregarEspecialidad();
        }
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
                title: 'Se agregaron las especialidad correctamente'
            })
        </script>
    <?php
    } else {
        echo $cant;
        $especialidad = new especialidad(0, $nombre);
        $especialidad->agregarEspecialidad();
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
                title: 'Se agrego la especialidad correctamente'
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

?>

<div class="contenedor-gestion" style="height: 100%;">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-3">
                <div class="row">
                    <div class="col-5 col-md-5 col-lg-5">
                        <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/gestionEspecialidades.php") ?>">
                            <box-icon type='solid' name='left-arrow-alt' color='snow'></box-icon>
                            Volver
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <h1>AGREGAR ESPECIALIDAD</h1>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4">
            </div>
            <div class="col-4">
                <form action="index.php?pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/agregar.php") ?>" method="post">
                    <label for="">Especialidades a agregar: </label>
                    <div class="row">
                        <div class="col">
                            <input type="number" id="cantAgregar" name="cantAgregar" min="1" max="10">
                        </div>
                        <div class="col">
                            <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Aceptar</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="contenedor-formAgregar mb-3">
                    <form action="index.php?add&pid=<?php echo base64_encode("vista/gestionUsuarios/especialidades/agregar.php") ?>" method="post" class="needs-validation" novalidate>
                        <?php
                        for ($i = 0; $i < $cantAgregar; $i++) {
                        ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre especialidad <?php echo $i + 1 ?>: </label>
                                <input type="text" class="form-control" id="nombre" name="nombreEspecialidad[]" required>
                                <div class="valid-feedback">
                                    Ok!
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese los nombres del usuario.
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <button type="submit" style="display: flex; align-items: center;" class="btn-funcion">Agregar <box-icon name='user-plus' type='solid' color='snow'></box-icon></button>
                    </form>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>

    </div>
</div>
