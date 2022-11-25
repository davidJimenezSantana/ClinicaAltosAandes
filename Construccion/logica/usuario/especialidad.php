<?php

require_once("persistencia/usuario/especialidadDAO.php");
require_once("persistencia/conexion.php");

class especialidad
{

    private $idespecialidad;
    private $nombre;

    private $conexion;
    private $especialidadDAO;


    public function __construct($idespecialidad=0, $nombre="")
    {
        $this->idespecialidad = $idespecialidad;
        $this->nombre = $nombre;

        $this->conexion = new conexion();
        $this->especialidadDAO = new especialidadDAO($idespecialidad,$nombre);

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
        $this->conexion->abrir();

        $this->conexion->ejecutar($this->especialidadDAO->consultarEspecialidad());
        
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->conexion->cerrar();
    }

}