<?php


require_once("persistencia/conexion.php");
require_once("persistencia/paciente/generoDAO.php");
class genero
{

    private $idgenero;
    private $nombre;

    private $generoDAO;
    private $conexion;

    public function __construct($idgenero = 0, $nombre= "")
    {
        $this->idgenero = $idgenero;
        $this->nombre = $nombre;
        $this->generoDAO = new generoDAO($idgenero,$nombre);
        $this->conexion = new conexion();
    }

    public function getIdgenero(){
        return $this->idgenero;
    }

    public function setIdgenero($idgenero){
        $this->idgenero = $idgenero;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function consultarGenero(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->generoDAO->consultarGenero());
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->conexion->cerrar();
    }

    public function verGeneros(){
        return "SELECT idgenero, nombre
                FROM genero";
    }

}
