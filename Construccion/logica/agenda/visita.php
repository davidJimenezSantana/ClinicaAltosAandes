<?php

require_once("persistencia/agenda/visitaDAO.php");
require_once("persistencia/conexion.php");
require_once("logica/agenda/EstadoVisita.php");
class visita
{

    private $idvisita;
    private $estado_visita;
    private $agenda_idagenda;
    private $fecha;
    private $hora;
    private $observaciones;
    private $motivo;
    private $historia_clinica_idhistoria_clinica;
    private $visitaDAO;
    private $conexion;

    public function __construct($idvisita = 0, $estado_visita_idestado_visita = 0, $agenda_idagenda = 0, $fecha = "", $hora = "", $observaciones = "", $motivo = "", $historia_clinica_idhistoria_clinica = 0)
    {
        $this->idvisita = $idvisita;
        $this->estado_visita = new estadoVisita($estado_visita_idestado_visita);
        $this->agenda_idagenda = $agenda_idagenda;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->observaciones = $observaciones;
        $this->motivo = $motivo;
        $this->historia_clinica_idhistoria_clinica = $historia_clinica_idhistoria_clinica;

        $this->conexion = new conexion();
        $this->visitaDAO = new visitaDAO($idvisita, $estado_visita_idestado_visita, $agenda_idagenda, $fecha, $hora, $observaciones, $motivo, $historia_clinica_idhistoria_clinica);
    }


    /**
     */
    public function setIdvisita($idvisita)
    {
        return $this->idvisita = $idvisita;
    }

    /**
     */
    public function getIdvisita()
    {
        return $this->idvisita;
    }


    /**
     * Get the value of estado_visita
     */
    public function getEstado_visita()
    {
        return $this->estado_visita;
    }

    /**
     * Set the value of estado_visita
     *
     * @return  self
     */
    public function setEstado_visita($estado_visita)
    {
        $this->estado_visita = $estado_visita;

        return $this;
    }


    /**
     */
    public function getAgenda_idagenda()
    {
        return $this->agenda_idagenda;
    }

    /**
     */
    public function setAgenda_idagenda($agenda_idagenda)
    {
        return $this->agenda_idagenda = $agenda_idagenda;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     */
    public function setFecha($fecha)
    {
        return $this->fecha = $fecha;
    }

    /**
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     */
    public function setHora($hora)
    {
        return $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     */
    public function setObservaciones($observaciones)
    {
        return $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     */
    public function setMotivo($motivo)
    {
        return $this->motivo = $motivo;
    }

    /**
     */
    public function getHistoria_clinica_idhistoria_clinica()
    {
        return $this->historia_clinica_idhistoria_clinica;
    }

    /**
     */
    public function setHistoria_clinica_idhistoria_clinica($historia_clinica_idhistoria_clinica)
    {
        return $this->historia_clinica_idhistoria_clinica = $historia_clinica_idhistoria_clinica;
    }

    public function consultarVisitasHistoriaClinica()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->consultarVisitasHistoriaClinica());
        $visitas = [];
        while (($resultado = $this->conexion->extraer()) != null) {
            $v = new visita($resultado["idvisita"], $resultado["estado_visita_idestado_visita"], $resultado["agenda_idagenda"], $resultado["fecha"], $resultado["hora"], $resultado["observaciones"], $resultado["motivo"]);
            $v->estado_visita->consultarVisita();
            array_push($visitas, $v);
        }
        $this->conexion->cerrar();
        return $visitas;
    }

    public function construirDatos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->consultarVisitasAgenda());
        $codenaDatos = "[";
        $cont = 1;
        while (($resultado = $this->conexion->extraer()) != null) {

            if($cont == 1){                
                $cont++;
            }else{
                $codenaDatos .= ",";
            }

            $est = new estadoVisita($resultado["estado_visita_idestado_visita"]);
            $est->consultarVisita();

            $codenaDatos .= "{'title':'Visita programada','description':'" . $resultado["motivo"] . ".  Estado: " . $est->getNombre() . "','start':'" . $resultado["fecha"] . "T" . $resultado["hora"] . "',";

            if ($resultado["estado_visita_idestado_visita"] == 1) {
                $codenaDatos .= "'color':'yellow'}";
            } else if ($resultado["estado_visita_idestado_visita"] == 2) {
                $codenaDatos .= "'color':'green'}";
            } else if ($resultado["estado_visita_idestado_visita"] == 3) {
                $codenaDatos .= "'color':'red'}";
            }
        }
        $codenaDatos .= "]";
        $this->conexion->cerrar();

        return $codenaDatos;
    }

    public function agendarVisita(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->visitaDAO->agendarVisita());
        $this->conexion->cerrar();
    }
}
