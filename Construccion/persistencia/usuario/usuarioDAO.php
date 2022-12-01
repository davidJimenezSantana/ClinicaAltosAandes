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
    private $foto;


    public function __construct($idusuario, $nombre, $apellido, $correo, $clave, $rol_idrol, $especialidad_idespecialidad, $telefono, $foto = "")
    {
        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol_idrol = $rol_idrol;
        $this->especialidad_idespecialidad = $especialidad_idespecialidad;
        $this->telefono = $telefono;
        $this->foto = $foto;
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

    public function getIdespecialidad()
    {
        return $this->idrol;
    }

    public function setIdespecialidad($idespecialidad)
    {
        $this->idespecialidad = $idespecialidad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function autenticar()
    {
        return "SELECT idusuario
                FROM usuario
                WHERE correo ='" . $this->correo . "' and clave = '" . md5($this->clave) . "'";
    }

    public function consultarUsuario()
    {
        return "SELECT nombre, apellido, correo, rol_idrol, especialidad_idespecialidad, telefono
                FROM usuario
                WHERE idusuario = '" . $this->idusuario . "'";
    }


    public function consultarRol()
    {
        return "SELECT rol_idrol
                FROM usuario
                WHERE idusuario = '" . $this->idusuario . "'";
    }

    public function verUsuarios()
    {
        return "SELECT idusuario,nombre, apellido, correo, rol_idrol, especialidad_idespecialidad, telefono
                FROM usuario";
    }

    public function agregarUsuario()
    {
        return "INSERT INTO usuario (nombre, apellido, correo, clave, rol_idrol, especialidad_idespecialidad, telefono)
        VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . md5($this->clave) . "', '" . $this->rol_idrol . "', '" .  $this->especialidad_idespecialidad . "', '" . $this->telefono . "')";
    }

    public function editarUsuario()
    {
        return "UPDATE usuario
        SET nombre='" . $this->nombre . "' , apellido='" . $this->apellido . "', correo='" . $this->correo . "', rol_idrol=' " . $this->rol_idrol . "', especialidad_idespecialidad='" . $this->especialidad_idespecialidad . "', telefono='" . $this->telefono . "'
        WHERE idusuario='" . $this->idusuario . "'";
    }

    public function eliminarUsuario()
    {
        return "DELETE FROM usuario 
        WHERE idusuario = " . $this->idusuario;
    }

    public function verExistenciaCorreo(){
        return "SELECT nombre
                FROM usuario
                WHERE correo = '" . $this->correo . "'";
    }
}
