<?php
require "logica/agenda/visita.php";
require "logica/paciente/historiaClinica.php";
require "logica/paciente/paciente.php";

$idagenda = $_POST["idagenda"];
$descripcion = $_POST["descripcion"];
$fechadate = $_POST["fecha-date"];
$horadate = $_POST["hora-date"];
$motivo = $_POST["motivo"];
$estadoVisita = $_POST["estadoVisita"];
$observaciones = $_POST["observaciones"];

$estado = new estadoVisita($estadoVisita);
$estado->consultarVisita();

$paciente = new paciente();
$pacientes = $paciente->verPacientes();



include("menuDoctor.php");

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


<!--  modal confirmar-->
<div class="modal fade" id="modalConfirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Titulo-evento">Confirmar visita médica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="formularioConfirmar" action="index.php?agendar&pid=<?php echo base64_encode("vista/doctor/inicioDoctor.php") ?>" method="post">
                    <div hidden>
                        <input type="text" class="form-control" name="idagenda" id="idagenda" value="">
                        <input type="text" class="form-control" id="estadoVisita" name="estadoVisita" value="">
                        <input type="text" class="form-control" id="observaciones" name="observaciones" value="">
                        <input type="text" class="form-control" id="Idhistoria_clinica" name="Idhistoria_clinica" value="">
                    </div>
                    <h3>Por favor confirme la visita médica</h3>
                    <div class="row">
                        <div class="col-5">
                            <label for="idpaciente">No. de identificación del paciente:</label>
                            <input type="text" class="form-control" id="idpaciente" name="idpaciente" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombrepaciente">Nombre del paciente:</label>
                            <input type="text" class="form-control" id="nombrepaciente" name="nombrepaciente" value="" disabled>
                        </div>
                        <div class="col">
                            <label for="apellidopaciente">Apellido del paciente:</label>
                            <input type="text" class="form-control" id="apellidopaciente" name="apellidopaciente" value="" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fechadate">Fecha de la visita:</label>
                            <input type="text" class="form-control" id="fechadate" name="fechadate">
                        </div>
                        <div class="col">
                            <label for="horadate">Hora de la visita:</label>
                            <input type="text" class="form-control" id="horadate" name="horadate">
                        </div>
                    </div>
                    <div>
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
                    </div>
                    <div><label for="motivo">Motivo:</label>
                        <input type="text" class="form-control" id="motivo" name="motivo">
                    </div>
                    <div>
                        <label for="obs">Observaciones:</label>
                        <input type="text" class="form-control" id="obs" name="obs" value="">
                    </div>
                    <div class="row ">
                        <div class="col">
                        </div>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-success">Confirmar</button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<script>
    function cargarModal(id, nombre, apellido, Idhistoria_clinica, fecha, hora, descripcion, motivo, obs, idagenda, estadoVisita) {
        console.log(id + " " + nombre + " " + apellido + " " + Idhistoria_clinica)
        let formConfirm = document.getElementById("formularioConfirmar");

        formConfirm.idpaciente.value = id;
        formConfirm.nombrepaciente.value = nombre;
        formConfirm.apellidopaciente.value = apellido;

        formConfirm.fechadate.value = fecha;
        formConfirm.horadate.value = hora;
        formConfirm.descripcion.value = descripcion;
        formConfirm.motivo.value = motivo;
        formConfirm.obs.value = obs;

        //datos hidden

        formConfirm.idagenda.value = idagenda;
        formConfirm.estadoVisita.value = estadoVisita;
        formConfirm.Idhistoria_clinica.value = Idhistoria_clinica;

        var model = new bootstrap.Modal(document.getElementById('modalConfirmar'), {
            keyboard: false
        });
        model.show();
    }
</script>

<div class="contenedor-gestion" style="height: 100%;">
    <div class="container">
        <div class="row titulo-gestion">
            <div class="col-3">
                <div class="row">
                    <div class="col-5 col-md-5 col-lg-5">
                        <a class="btn-funcion" href="index.php?pid=<?php echo base64_encode("vista/doctor/inicioDoctor.php") ?>">
                            <box-icon type='solid' name='left-arrow-alt' color='snow'></box-icon>
                            Volver
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <h1>Agendando visita</h1>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row mt-3">
            <div class="card mb-1" style="max-width: 700px; background: #02457A;">
                <div class="row g-0">
                    <div class="col-1">
                    </div>
                    <div class="col-md-10">
                        <h3 class="card-title">Datos de la visita</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="card-text"><b>Fecha: </b> <?php echo $fechadate . " <b>Hora:</b> " . $horadate ?></p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><b>Estado: </b> <?php echo $estado->getNombre() ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <p class="card-text"><b>Especialidad: </b> <?php echo $usuario->getEspecialidad()->getNombre() ?></p>
                            </div>
                            <div class="row">
                                <p class="card-text"><b>Descripcion: </b> <?php echo $descripcion ?></p>
                            </div>
                            <div class="row">
                                <p class="card-text"><b>Motivo: </b> <?php echo $motivo ?></p>
                            </div>
                            <div class="row">
                                <p class="card-text"><b>observaciones: </b> <?php echo $observaciones ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
            </div>
            <div class="col-6">

                <h3>Paciente a agendar: </h3>

                <hr>
                <div>
                    <table class="table-light hover row-border" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th scope="col">Doc identidad</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Opcion</th>
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
                                    <td>
                                        <?php
                                        $historiaClin = new historiaClinica(0, $pacienteActual->getIdpaciente());
                                        $historiaClin->consultarHistoriaClinica();
                                        ?>
                                        <button class="btn-opcion" style="display: flex;align-items: center;font-weight: bold;color: #02457A;" onclick="cargarModal('<?php echo $pacienteActual->getDocumento_identidad() ?>', '<?php echo $pacienteActual->getNombre() ?>', '<?php echo $pacienteActual->getApellido() ?>', '<?php echo $historiaClin->getIdhistoria_clinica() ?>','<?php echo $fechadate ?>','<?php echo $horadate ?>','<?php echo $descripcion ?>','<?php echo $motivo ?>','<?php echo $observaciones ?>','<?php echo $idagenda ?>','<?php echo $estadoVisita ?>') ">
                                            <box-icon name='select-multiple' color='#02457a'></box-icon>
                                            <spam class="align-middle"> Seleccionar</spam>
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
            </div>
        </div>

    </div>
</div>