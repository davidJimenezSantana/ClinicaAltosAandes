<?php

class rolDAO
{

    private $idrol;
    private $nombre;

    public function __construct($idrol, $nombre)
    {
        $this->idrol = $idrol;
        $this->nombre = $nombre;
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
        return "SELECT nombre
                FROM rol
                WHERE idrol = '" . $this->idrol . "'";
    }

}
