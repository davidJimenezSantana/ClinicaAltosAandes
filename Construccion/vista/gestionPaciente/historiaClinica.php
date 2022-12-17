<?php
$u = new usuario($_SESSION["idusuario"]);
$u->consultarRolUsuario();

if($u->getIdrol() == 1){
    include("vista/admin/menuAdmin.php");
}else if($u->getIdrol() == 2){
    include("vista/doctor/menuDoctor.php");
}

include("logica/paciente/paciente.php");
include("logica/paciente/historiaClinica.php");
include("logica/agenda/visita.php");

$paciente = "";

if (isset($_GET["idpaciente"])) {
    $id = $_GET["idpaciente"];
    $paciente = new paciente($id);
}
$paciente->consultarPaciente();

$historiaClinica = new historiaClinica(0, $paciente->getIdpaciente());
$historiaClinica->consultarHistoriaClinica();

$tratamiento = $historiaClinica->getTratamiento();

$visita = new visita(0, 0, 0, "", "", "", "", $historiaClinica->getIdhistoria_clinica());
$visitas = $visita->consultarVisitasHistoriaClinica();

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


<div class="contenedor-gestion" style="height: 100%;">
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
                <h1>HISTORIA CLINICA</h1>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-1">
            </div>
            <div class="col-10">
                <div class="card mb-1" style="max-width: 700px; background: #02457A;">
                    <div class="row g-0">
                        <div class="col-1">
                        </div>
                        <div class="col-md-10">
                            <h3 class="card-title">Datos del paciente</h3>
                            <div class="card-body">
                                <div class="row">
                                    <p class="card-text"><b>Documento de identificacion: </b> <?php echo $paciente->getDocumento_identidad() ?></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text"><b>Nombre: </b><?php echo $paciente->getNombre() ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text"><b>Apellidos: </b><?php echo $paciente->getApellido() ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text"><b>Telefono: </b> <?php echo $paciente->getTelefono() ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text"><b>Direccion: </b> <?php echo $paciente->getDireccion() ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text"><b>Genero: </b> <?php echo $paciente->getGenero()->getNombre() ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text"><b>Fecha de nacimiento: </b> <?php echo $paciente->getFecha_nacimiento() ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="card-text"><b>Correo: </b> <?php echo $paciente->getCorreo() ?></p>
                                </div>
                                <div class="row">
                                    <p class="card-text"><b>Seguro: </b> <?php echo $paciente->getseguro() ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-1">
            </div>
            <div class="col-10">
                <div class="card mb-3 tratamiento" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col-1">
                        </div>
                        <div class="col-md-10 ">
                            <h3 class="card-title">Tratamiento</h3>
                            <div class="card-body">
                                <div class="row">
                                    <p class="card-text"><?php echo $tratamiento ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
            </div>
            
            <div class="row mt-4">
                <div class="col-1"></div>
                <div class="col-10">
                <h3>Historia visitas medicas</h3>
                    <div class="tabla-gestion">
                        <table class="table-light hover row-border" id="tablaUsuarios">
                            <thead>
                                <tr>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($visitas as $visitaActual) {
                                ?>
                                    <tr>

                                        <td><?php echo $visitaActual->getMotivo() ?></td>
                                        <td><?php echo $visitaActual->getObservaciones() ?></td>
                                        <td><?php echo $visitaActual->getFecha() ?></td>
                                        <td><?php echo $visitaActual->getHora() ?></td>
                                        <td><?php echo $visitaActual->getEstado_visita()->getNombre() ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-1"></div>

            </div>

        </div>
    </div>
</div>