<?php

class especialidadDAO
{

    private $idespecialidad;
    private $nombre;

    public function __construct($idespecialidad, $nombre)
    {
        $this->idespecialidad = $idespecialidad;
        $this->nombre = $nombre;
    }

    public function getIdespecialidad(){
        return $this->idrol;
    }

    public function setIdespecialidad($idespecialidad){
        $this->idespecialidad = $idespecialidad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function consultarEspecialidad(){
        return "SELECT nombre
                FROM especialidad
                WHERE idespecialidad = '" . $this->idespecialidad . "'";
    }

}