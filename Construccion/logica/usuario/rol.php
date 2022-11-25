<?php


require_once("persistencia/usuario/rolDAO.php");
require_once("persistencia/conexion.php");


class rol
{

    private $idrol;
    private $nombre;

    
    private $conexion;
    private $rolDAO;

    public function __construct($idrol=0, $nombre="")
    {
        $this->idrol = $idrol;
        $this->nombre = $nombre;

        $this->conexion = new conexion();
        $this->rolDAO = new rolDAO($idrol,$nombre);
    }

    public function getIdrol(){
        return $this->idrol;
    }

    public function setIdrol($idrol){
        $this->idrol = $idrol;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function consultarRol(){
        $this->conexion->abrir();

        $this->conexion->ejecutar($this->rolDAO->consultarRol());
        
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
    }

}
