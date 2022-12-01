<?php
require_once("persistencia/usuario/usuarioDAO.php");
require_once("persistencia/conexion.php");
require_once("logica/usuario/rol.php");
require_once("logica/usuario/especialidad.php");

class usuario
{

    private $idusuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $idrol;
    private $rol;
    private $especialidad;
    private $telefono;
    private $foto;

    private $conexion;
    private $usuarioDAO;


    public function __construct($idusuario = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $rol_idrol = 0, $especialidad_idespecialidad = 0, $telefono = "", $foto = "")
    {
        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->rol = new rol($rol_idrol);
        $this->especialidad = new especialidad($especialidad_idespecialidad);
        $this->telefono = $telefono;
        $this->foto = $foto;

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

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of idrol
     */
    public function getIdrol()
    {
        return $this->idrol;
    }

    /**
     * Set the value of idrol
     */
    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;

        return $this;
    }


    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of especialidad
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set the value of especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
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
        $this->conexion->cerrar();
    }

    public function consultarRolUsuario()
    {
        $this->conexion->abrir();
        $this->usuarioDAO->setIdusuario($this->idusuario);
        $this->conexion->ejecutar($this->usuarioDAO->consultarRol());

        $resultado = $this->conexion->extraer();
        $this->idrol = $resultado["rol_idrol"];
        $this->conexion->cerrar();
    }

    public function consultarUsuario()
    {
        $this->conexion->abrir();

        $this->conexion->ejecutar($this->usuarioDAO->consultarUsuario());

        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado["nombre"];
        $this->apellido = $resultado["apellido"];
        $this->correo = $resultado["correo"];
        $this->rol = new rol($resultado["rol_idrol"]);
        $this->especialidad = new especialidad($resultado["especialidad_idespecialidad"]);
        $this->telefono = $resultado["telefono"];

        $this->rol->consultarRol();
        $this->especialidad->consultarEspecialidad();
        $this->conexion->cerrar();
    }

    public function verUsuarios()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->verUsuarios());

        $usuarios = array();

        while (($resultado = $this->conexion->extraer()) != null) {
            $u = new usuario($resultado["idusuario"], $resultado["nombre"], $resultado["apellido"], $resultado["correo"], "", $resultado["rol_idrol"], $resultado["especialidad_idespecialidad"], $resultado["telefono"]);
            $u->getRol()->consultarRol();
            $u->getEspecialidad()->consultarEspecialidad();
            array_push($usuarios, $u);
        }
        $this->conexion->cerrar();
        return $usuarios;
    }

    public function agregarUsuario()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->agregarUsuario());
        $this->conexion->cerrar();
    }

    public function editarUsuario()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->editarUsuario());
        $this->conexion->cerrar();
    }

    public function eliminarUsuario()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->eliminarUsuario());        
        $this->conexion->cerrar();
    }

    public function verExistenciaCorreo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->usuarioDAO->verExistenciaCorreo());
        if($this->conexion->numResultados() == 1){
            return true;
        }else{
            return false;
        }            
        $this->conexion->cerrar();
    }
}
