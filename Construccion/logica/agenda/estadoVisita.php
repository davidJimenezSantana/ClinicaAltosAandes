<?php

require_once("persistencia/agenda/estadoVisitaDAO.php");
require_once("persistencia/conexion.php");
class estadoVisita
{

    private $idestado_visita;
    private $nombre;
    private $estadoVisitaDAO;
    private $conexion;

    public function __construct($idestado_visita= 0, $nombre = "")
    {
        $this->idestado_visita = $idestado_visita;
        $this->nombre = $nombre;

        $this->conexion = new conexion();
        $this->estadoVisitaDAO = new estadoVisitaDAO($idestado_visita, $nombre);
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
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estadoVisitaDAO->consultarVisita());
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->conexion->cerrar();
    }

    public function verEstados(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estadoVisitaDAO->verEstados());

        $estados = [];
        while(($resultado = $this->conexion->extraer()) != null){
            $est = new estadoVisita($resultado["idestado_visita"], $resultado["nombre"]);
            array_push($estados, $est);
        }
        $this->conexion->cerrar();
        return $estados;
    }

}
