<?php
require_once("../persistencia/usuario/usuarioDAO.php");
require_once("../persistencia/conexion.php");
require_once("rol.php");
require_once("especialidad.php");

class usuario
{

    private $idusuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $rol;
    private $especialidad;
    private $telefono;

    private $conexion;
    private $usuarioDAO;


    public function __construct($idusuario, $nombre, $apellido, $correo, $clave, $rol_idrol, $especialidad_idespecialidad, $telefono)
    {
        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = new rol($rol_idrol);
        $this->especialidad = new especialidad($especialidad_idespecialidad);
        $this->telefono = $telefono;

        $this->conexion = new conexion();
        $this->usuarioDAO = new usuarioDAO($idusuario, $nombre, $apellido, $correo, $clave, $rol_idrol, $especialidad_idespecialidad, $telefono);
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
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->autenticar());
        $resultado = $this->conexion->extraer();
        if ($resultado != null) {
            $this->idusuario = $resultado["idusuario"];
            return true;
        } else {
            return false;
        }
    }

    public function consultarUsuario()
    {
        $this->conexion->abrir();

        $this->conexion->ejecutar($this->especialidadDAO->consultarUsuario());

        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->apellido = $resultado["apellido"];
        $this->correo = $resultado["correo"];
        $this->clave = $resultado["clave"];
        $this->rol = new rol($resultado["rol_idrol"]);
        $this->especialidad = new especialidad($resultado["especialidad_idespecialidad"]);
        $this->telefono = $resultado["telefono"];

        $this->rol->consultarRol();
        $this->especialidad->consultarEspecialidad();
    }
}
