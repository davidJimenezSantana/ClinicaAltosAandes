<?php


require_once("persistencia/usuario/estado_usuarioDAO.php");
require_once("persistencia/conexion.php");
class estado_usuario
{

    private $idestado_usuario;
    private $nombre;
    private $estado_usuarioDAO;
    private $conexion;

    public function __construct($idestado_usuario = 0, $nombre = "")
    {
        $this->idestado_usuario = $idestado_usuario;
        $this->nombre = $nombre;
        $this->conexion = new conexion();
        $this->estado_usuarioDAO = new estado_usuarioDAO($idestado_usuario, $nombre);
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
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estado_usuarioDAO->consultarEstadoUsuario());
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->conexion->cerrar();
    }

    public function verEstados(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estado_usuarioDAO->verEstados());
        $estados = [];

        while(($resultado = $this->conexion->extraer()) != null){
            $e = new estado_usuario($resultado["idestado_usuario"], $resultado["nombre"]);
            array_push($estados, $e);
        }
        $this->conexion->cerrar();
        return $estados;
    }



}
