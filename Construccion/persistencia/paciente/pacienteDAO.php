<?php

class pacienteDAO
{

	private $idpaciente;
	private $nombre;
	private $apellido;
	private $documento_identidad;
	private $seguro;
	private $telefono;
	private $correo;
	private $direccion;
	private $idgenero;
	private $fecha_nacimiento;


	public function __construct($idpaciente, $nombre, $apellido, $documento_identidad, $seguro, $telefono, $correo, $direccion, $idgenero, $fecha_nacimiento)
	{
		$this->idpaciente = $idpaciente;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->documento_identidad = $documento_identidad;
		$this->seguro = $seguro;
		$this->telefono = $telefono;
		$this->correo = $correo;
		$this->direccion = $direccion;
		$this->idgenero = $idgenero;
		$this->fecha_nacimiento = $fecha_nacimiento;
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
	public function getnnmbre()
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
	public function getIdgenero()
	{
		return $this->idgenero;
	}

	/**
	 */
	public function setIdgenero($idgenero)
	{
		$this->idgenero = $idgenero;
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
		return "SELECT nombre, apellido, documento_identidad, seguro, telefono, correo, direccion, genero_idgenero, fecha_nacimiento
                FROM paciente
                WHERE idpaciente = '" . $this->idpaciente . "'";
	}




	public function verPacientes()
	{
		return "SELECT idpaciente,nombre, apellido, documento_identidad, seguro, telefono, correo, direccion, genero_idgenero, fecha_nacimiento
                FROM paciente";
	}

	public function agregarPaciente()
	{
		return "INSERT INTO paciente (nombre, apellido, documento_identidad, seguro, telefono, correo, direccion, genero_idgenero, fecha_nacimiento)
        VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->documento_identidad . "', '" . $this->seguro . "', '" . $this->fecha_nacimiento . "', '" .  $this->correo . "', '" . $this->direccion . "', '" . $this->idgenero . "', '" . $this->fecha_nacimiento . "')";
	}

	public function editarPaciente()
	{
		return "UPDATE paciente
        SET nombre='" . $this->nombre . "' , apellido='" . $this->apellido . "', documento_identidad='" . $this->documento_identidad . "', seguro=' " . $this->seguro . "', telefono='" . $this->telefono . "', correo='" . $this->correo . "', direccion='" . $this->direccion . "', genero_idgenero='" . $this->idgenero . "', fecha_nacimiento='" . $this->fecha_nacimiento . "'
        WHERE idpaciente='" . $this->idpaciente . "'";
	}

	public function eliminarPaciente()
	{
		return "DELETE FROM paciente 
        WHERE idpaciente = " . $this->idpaciente;
	}

	public function validarExistencia()
	{
		return "SELECT idpaciente
				FROM paciente
				WHERE documento_identidad ='" . $this->documento_identidad . "' OR correo='" . $this->correo . "'";
	}
}
