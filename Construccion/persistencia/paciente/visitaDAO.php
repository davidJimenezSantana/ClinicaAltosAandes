<?php

class visitaDAO
{

    private $idvisita;
    private $estado_visita_idestado_visita;
    private $agenda_idagenda;
    private $fecha;
    private $hora;
    private $observaciones;
    private $motivo;
    private $historia_clinica_idhistoria_clinica;
    public function __construct($idvisita, $estado_visita_idestado_visita, $agenda_idagenda, $fecha, $hora, $observaciones, $motivo, $historia_clinica_idhistoria_clinica)
    {
        $this->idvisita = $idvisita;
        $this->estado_visita_idestado_visita = $estado_visita_idestado_visita;
        $this->agenda_idagenda = $agenda_idagenda;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->observaciones = $observaciones;
        $this->motivo = $motivo;
        $this->historia_clinica_idhistoria_clinica = $historia_clinica_idhistoria_clinica;
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
     */
    public function getEstado_visita_idestado_visita()
    {
        return $this->estado_visita_idestado_visita;
    }

    /**
     */
    public function setEstado_visita_idestado_visita($estado_visita_idestado_visita)
    {
        return $this->estado_visita_idestado_visita = $estado_visita_idestado_visita;
         
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
        return "SELECT idvisita,estado_visita_idestado_visita, agenda_idagenda, fecha, hora, observaciones, motivo
                FROM visita
                WHERE historia_clinica_idhistoria_clinica = '" . $this->historia_clinica_idhistoria_clinica ."'";
    }

    public function verGeneros()
    {
        return "SELECT idvisita, estado_visita_idestado_visita, agenda_idagenda, fecha, hora, observaciones, motivo, historia_clinica_idhistoria_clinica
                FROM visita";
    }
}
