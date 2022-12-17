<?php

include("menuDoctor.php");
require "logica/agenda/visita.php";

if (isset($_GET["sesion"]) && $_GET["sesion"] == "open") {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Ingreso de sesión exitoso'
        })
    </script>
<?php
}

if (isset($_GET["agendar"])) {
    $idagenda = $_POST["idagenda"];
    $estadoVisita = $_POST["estadoVisita"];
    $observaciones = $_POST["obs"];
    $Idhistoria_clinica = $_POST["Idhistoria_clinica"];

    $fechadate = $_POST["fechadate"];
    $horadate = $_POST["horadate"];
    $motivo = $_POST["motivo"];
    $visita = new visita(0, $estadoVisita, $idagenda, $fechadate, $horadate, $observaciones, $motivo, $Idhistoria_clinica);
    $visita->agendarVisita();
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Visita agendada exitosamente'
        })
    </script>
<?php

}

$usuario = new usuario($_SESSION["idusuario"]);
$usuario->consultarUsuario();


$agenda = new agenda(0, $usuario->getIdusuario());
$agenda->consultarAgendaUsuario();

$visita = new visita(0, 0, $agenda->getIdagenda());
$visitas = $visita->construirDatos();

$estadoVisita = new estadoVisita();
$estados = $estadoVisita->verEstados();


?>
<div class="contenedor-inicio">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="mt-3" id='calendar' style="background-color: snow; padding: 30px; border-radius: 10px;"></div>
            </div>
            <div class="col-1"></div>
            <div class="col-3">
                <div class="card mb-3" style="max-width: 540px; background: #02457A;">
                    <img src="vista/img/usuarios/user1.png" class="card-img-top rounded-start" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenido</h5>
                        <p class="card-text">Usuario: <?php echo $usuario->getNombre() . " " . $usuario->getApellido() ?></p>
                        <p class="card-text">Rol: <?php echo $usuario->getRol()->getNombre() ?></p>
                        <p class="card-text">Especialidad: <?php echo $usuario->getEspecialidad()->getNombre() ?></p>
                        <p class="card-text">Correo: <?php echo $usuario->getCorreo() ?></p>
                        <p class="card-text">Telefono: <?php echo $usuario->getTelefono() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                start: 'title',
                center: 'dayGridMonth,timeGridWeek,timeGridDay',
                end: 'today prev,next'
            },
            locale: 'es',
            themeSystem: 'bootstrap5',
            customButtons: {},
            selectable: 'true',
            events: <?php echo $visitas ?>,
            eventClick: function(info, jsEvent, view) {
                document.querySelector('#tit-evento').innerHTML = info.event.title;
                document.querySelector('#desc').value = info.event.extendedProps.description;


                document.querySelector('#fecha').value = info.event.start;
                var model = new bootstrap.Modal(document.getElementById('modalActual'), {
                    keyboard: false
                });
                model.show();
            },
            dateClick: function(info) {
                //document.querySelector('#Titulo-evento').innerHTML = info.title;
                document.querySelector('#fecha-date').value = info.dateStr;

                var model = new bootstrap.Modal(document.getElementById('modalFuncional'), {
                    keyboard: false
                });
                model.show();

                //alert('Clicked on: ' + info.dateStr);
                //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                //alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                //info.dayEl.style.backgroundColor = 'red';
            }



        });

        calendar.render();
    });
</script>


<!--  modal ver -->
<div class="modal fade" id="modalActual" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tit-evento"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <label for="descr">Descripcion:</label>
                        <input type="text" name="desc" id="desc" width="80%">
                    </div>
                    <div class="col-2"></div>

                </div>
                <div class="row mt-3">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <label for="fecha">Fecha y hora</label>
                        <input type="date" name="fecha" id="fecha">
                    </div>
                    <div class="col-2"></div>
                </div>
                <p id="fecha"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!--  modal funciones-->
<div class="modal fade" id="modalFuncional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Titulo-evento">Visita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>*Recuerde que para agendar cita el paciente debe estar registrado.</h5>
                <form action="index.php?pid=<?php echo base64_encode("vista/doctor/agendarCita.php") ?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3" hidden>
                        <input type="text" class="form-control" name="idagenda" id="idagenda" value="<?php echo $agenda->getIdagenda() ?>">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción: </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="Sin descripcion" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese una descripción.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha-date" class="form-label">Fecha: </label>
                        <input type="date" class="form-control" id="fecha-date" name="fecha-date" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese una fecha.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="hora-date" class="form-label">Hora: </label>
                        <input type="text" class="form-control" id="hora-date" value="12:00:00" name="hora-date" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese una hora.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo de la visita: </label>
                        <input type="text" class="form-control" id="motivo" name="motivo" value="Sin motivo" required>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese un motivo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="estadoVisita" class="form-label">Estado: </label>
                        <select class="form-select" aria-label="Default select example" name="estadoVisita">
                            <?php
                            foreach ($estados as $estadoActual) {
                            ?>
                                <option value="<?php echo $estadoActual->getidestado_visita() ?>"> <?php echo $estadoActual->getNombre() ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones: </label>
                        <textarea type="textArea" class="form-control" id="observaciones" name="observaciones" required>Sin Observaciones</textarea>
                        <div class="valid-feedback">
                            Ok!
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese observaciones.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Siguiente</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </form>

            </div>

        </div>
    </div>
</div>