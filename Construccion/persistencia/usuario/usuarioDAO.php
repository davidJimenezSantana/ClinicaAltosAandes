<?php

class usuarioDAO
{

    private $idusuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $rol_idrol;
    private $especialidad_idespecialidad;
    private $telefono;


    public function __construct($idusuario, $nombre, $apellido, $correo, $clave, $rol_idrol,$especialidad_idespecialidad, $telefono)
    {
        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol_idrol = $rol_idrol;
        $this->especialidad_idespecialidad = $especialidad_idespecialidad;
        $this->telefono = $telefono;
    }

    /**
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
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

    public function autenticar(){
        return "SELECT idusuario
                FROM usuario
                WHERE correo ='" . $this->correo . "' and clave = '" . md5($this->clave) . "'";
    }

    public function consultarUsuario(){
        return "SELECT nombre, apellido, correo, rol_idrol, especialidad_idespecialidad, telefono
                FROM usuario
                WHERE idusuario = '" . $this->idusuario . "'";
    }
 

    public function consultarRol(){
        return "SELECT rol_idrol
                FROM usuario
                WHERE idusuario = '" . $this->idusuario . "'";
    }

    public function verUsuarios(){
        return "SELECT idusuario,nombre, apellido, correo, rol_idrol, especialidad_idespecialidad, telefono
                FROM usuario";
    }

    
}