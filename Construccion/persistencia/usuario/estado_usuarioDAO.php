<?php

class estado_usuarioDAO
{

    private $idestado_usuario;
    private $nombre;

    public function __construct($idestado_usuario, $nombre)
    {
        $this->idestado_usuario = $idestado_usuario;
        $this->nombre = $nombre;
    }

    public function getIdestado_usuario()
    {
        return $this->idestado_usuario;
    }

    public function setIdestado_usuario($idestado_usuario)
    {
        $this->idestado_usuario = $idestado_usuario;

        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function consultarEstadoUsuario(){
        return "SELECT nombre
                FROM estado_usuario
                WHERE idestado_usuario = '" . $this->idestado_usuario . "'";
    }

    public function verEstados(){
        return "SELECT idestado_usuario, nombre
                FROM estado_usuario";
    }



}
