<?php


require_once("persistencia/paciente/historiaClinicaDAO.php");
require_once("persistencia/conexion.php");

class historiaClinica
{

    private $idhistoria_clinica;
    private $paciente_idpaciente;
    private $tratamiento;

	private $conexion;
	private $historiaClinicaDAO;

    public function __construct($idhistoria_clinica = 0, $paciente_idpaciente = 0, $tratamiento = "")
    {
        $this->idhistoria_clinica = $idhistoria_clinica;
        $this->paciente_idpaciente = $paciente_idpaciente;
        $this->tratamiento = $tratamiento;
		$this->conexion = new conexion();
		$this->historiaClinicaDAO = new historiaClinicaDAO($idhistoria_clinica,$paciente_idpaciente,$tratamiento);
    }
	/**
	 */
	public function getIdhistoria_clinica() {
		return $this->idhistoria_clinica;
	}

	/**
	 */
	public function setIdhistoria_clinica($idhistoria_clinica) {
		$this->idhistoria_clinica = $idhistoria_clinica;
		return $this;
	}

	/**
	 */
	public function getPaciente_idpaciente() {
		return $this->paciente_idpaciente;
	}
	
	/**
	 */
	public function setPaciente_idpaciente($paciente_idpaciente) {
		$this->paciente_idpaciente = $paciente_idpaciente;
		return $this;
	}

	/**
	 */
	public function getTratamiento() {
		return $this->tratamiento;
	}
	
	/**
	 */
	public function setTratamiento($tratamiento): self {
		$this->tratamiento = $tratamiento;
		return $this;
	}


    
    public function consultarHistoriaClinica()
    {
        $this->conexion->abrir();
		$this->conexion->ejecutar($this->historiaClinicaDAO->consultarHistoriaClinica());
		$resultado = $this->conexion->extraer();
		$this->idhistoria_clinica = $resultado["idhistoria_clinica"];
		$this->tratamiento = $resultado["tratamiento"];
    }

    
    public function editarTratamiento()
    {
        return "UPDATE tratamiento
        SET tratamiento = " . $this->tratamiento . "
        WHERE idhistoria_clinica = '" . $this->idhistoria_clinica . "'";
    }


}
