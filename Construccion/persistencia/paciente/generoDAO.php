<?php

class generoDAO
{

    private $idgenero;
    private $nombre;

    public function __construct($idgenero, $nombre)
    {
        $this->idgenero = $idgenero;
        $this->nombre = $nombre;
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
        return "SELECT nombre
                FROM genero
                WHERE idgenero = '" . $this->idgenero . "'";
    }

    public function verGeneros(){
        return "SELECT idgenero, nombre
                FROM genero";
    }

}
