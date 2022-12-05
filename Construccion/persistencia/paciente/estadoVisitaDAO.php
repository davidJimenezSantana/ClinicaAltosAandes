<?php

class estadoVisitaDAO
{

    private $idestado_visita;
    private $nombre;

    public function __construct($idestado_visita, $nombre)
    {
        $this->idestado_visita = $idestado_visita;
        $this->nombre = $nombre;
    }

    public function getidestado_visita(){
        return $this->idestado_visita;
    }

    public function setidestado_visita($idestado_visita){
        $this->idestado_visita = $idestado_visita;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function consultarVisita(){
        return "SELECT nombre
                FROM visita
                WHERE idestado_visita = '" . $this->idestado_visita . "'";
    }

    public function verVisitas(){
        return "SELECT idestado_visita, nombre
                FROM visita";
    }

}
