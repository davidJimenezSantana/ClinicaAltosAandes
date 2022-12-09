<?php

require_once("persistencia/paciente/pacienteDAO.php");
require_once("persistencia/conexion.php");
require_once("logica/paciente/genero.php");

class paciente
{

	private $idpaciente;
	private $nombre;
	private $apellido;
	private $documento_identidad;
	private $seguro;
	private $telefono;
	private $correo;
	private $direccion;
	private $genero;
	private $fecha_nacimiento;

	private $pacienteDAO;
	private $conexion;

	public function __construct($idpaciente = 0, $nombre = "", $apellido = "", $documento_identidad = 0, $seguro = "", $telefono = "", $correo = "", $direccion = "", $idgenero = 0, $fecha_nacimiento = "")
	{
		$this->idpaciente = $idpaciente;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->documento_identidad = $documento_identidad;
		$this->seguro = $seguro;
		$this->telefono = $telefono;
		$this->correo = $correo;
		$this->direccion = $direccion;
		$this->genero = new genero($idgenero);
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->pacienteDAO = new pacienteDAO($idpaciente, $nombre, $apellido, $documento_identidad, $seguro, $telefono, $correo, $direccion, $idgenero, $fecha_nacimiento);
		$this->conexion = new conexion();
	}


	/**
	 */
	public function getIdpaciente()
	{
		return $this->idpaciente;
	}

	/**
	 */
	public function setIdpaciente($idpaciente)
	{
		$this->idpaciente = $idpaciente;
		return $this;
	}

	/**
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 */
	public function getApellido()
	{
		return $this->apellido;
	}

	/**
	 */
	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
		return $this;
	}

	/**
	 */
	public function getDocumento_identidad()
	{
		return $this->documento_identidad;
	}

	/**
	 */
	public function setDocumento_identidad($documento_identidad)
	{
		$this->documento_identidad = $documento_identidad;
		return $this;
	}


	/**
	 */
	public function getseguro()
	{
		return $this->seguro;
	}

	/**
	 */
	public function setSeguro($seguro)
	{
		$this->seguro = $seguro;
		return $this;
	}

	/**
	 */
	public function getTelefono()
	{
		return $this->telefono;
	}

	/**
	 */
	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
		return $this;
	}

	/**
	 */
	public function getCorreo()
	{
		return $this->correo;
	}

	/**
	 */
	public function setCorreo($correo)
	{
		$this->correo = $correo;
		return $this;
	}

	/**
	 */
	public function getDireccion()
	{
		return $this->direccion;
	}

	/**
	 */
	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
		return $this;
	}

	/**
	 */
	public function getGenero()
	{
		return $this->genero;
	}

	/**
	 */
	public function setGenero($genero)
	{
		$this->genero = $genero;
		return $this;
	}

	/**
	 */
	public function getFecha_nacimiento()
	{
		return $this->fecha_nacimiento;
	}

	/**
	 */
	public function setFecha_nacimiento($fecha_nacimiento)
	{
		$this->fecha_nacimiento = $fecha_nacimiento;
		return $this;
	}





	public function consultarPaciente()
	{
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->consultarPaciente());

		$resultado = $this->conexion->extraer();
		$this->nombre = $resultado["nombre"];
		$this->apellido = $resultado["apellido"];
		$this->documento_identidad = $resultado["documento_identidad"];
		$this->seguro = $resultado["seguro"];
		$this->telefono = $resultado["telefono"];
		$this->correo = $resultado["correo"];
		$this->direccion = $resultado["direccion"];
		$this->genero = new genero($resultado["genero_idgenero"]);
		$this->fecha_nacimiento = $resultado["fecha_nacimiento"];

		$this->genero->consultarGenero();
		$this->conexion->cerrar();
	}


	public function verPacientes()
	{
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->verPacientes());

		$pacientes = [];

		while (($resultado = $this->conexion->extraer()) != null) {
			$paciente = new paciente($resultado["idpaciente"], $resultado["nombre"], $resultado["apellido"], $resultado["documento_identidad"], $resultado["seguro"], $resultado["telefono"], $resultado["correo"], $resultado["direccion"], $resultado["genero_idgenero"], $resultado["fecha_nacimiento"]);
			$paciente->genero->consultarGenero();
			array_push($pacientes, $paciente);
		}
		$this->conexion->cerrar();
		return $pacientes;
	}



	public function agregarPaciente()
	{
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->agregarPaciente());
		$this->conexion->cerrar();
	}

	public function editarPaciente()
	{
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->editarPaciente());
		$this->conexion->cerrar();		
	}

	public function eliminarPaciente()
	{
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->eliminarPaciente());
		$this->conexion->cerrar();	
	}

	public function validarExistencia()
    {
		$this->conexion->abrir();
		$this->conexion->ejecutar($this->pacienteDAO->validarExistencia());
		if($this->conexion->numResultados() == 0){
			$this->conexion->cerrar();	
			return true;
		}else{
			$this->conexion->cerrar();	
			return false;
		}
    }
}
