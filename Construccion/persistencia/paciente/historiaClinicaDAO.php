<?php

class historiaClinicaDAO
{

	private $idhistoria_clinica;
	private $paciente_idpaciente;
	private $tratamiento;

	public function __construct($idhistoria_clinica, $paciente_idpaciente, $tratamiento)
	{
		$this->idhistoria_clinica = $idhistoria_clinica;
		$this->paciente_idpaciente = $paciente_idpaciente;
		$this->tratamiento = $tratamiento;
	}
	/**
	 */
	public function getIdhistoria_clinica()
	{
		return $this->idhistoria_clinica;
	}

	/**
	 */
	public function setIdhistoria_clinica($idhistoria_clinica)
	{
		$this->idhistoria_clinica = $idhistoria_clinica;
		return $this;
	}

	/**
	 */
	public function getPaciente_idpaciente()
	{
		return $this->paciente_idpaciente;
	}

	/**
	 */
	public function setPaciente_idpaciente($paciente_idpaciente)
	{
		$this->paciente_idpaciente = $paciente_idpaciente;
		return $this;
	}

	/**
	 */
	public function getTratamiento()
	{
		return $this->tratamiento;
	}

	/**
	 */
	public function setTratamiento($tratamiento): self
	{
		$this->tratamiento = $tratamiento;
		return $this;
	}



	public function consultarHistoriaClinica()
	{
		return "SELECT idhistoria_clinica, tratamiento
		FROM historia_clinica
		WHERE paciente_idpaciente = '" . $this->paciente_idpaciente . "'";
	}

	public function editarTratamiento()
	{
		return "UPDATE tratamiento
        SET tratamiento = " . $this->tratamiento . "
        WHERE idhistoria_clinica = '" . $this->idhistoria_clinica . "'";
	}
}
