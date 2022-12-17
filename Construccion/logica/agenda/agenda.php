<?php

require_once("persistencia/agenda/agendaDAO.php");
require_once("persistencia/conexion.php");
class agenda
{

    private $idagenda;
    private $usuario_idusuario;
    private $agendaDAO;
    private $conexion;

    public function __construct($idagenda = 0, $usuario_idusuario  = 0)
    {
        $this->idagenda = $idagenda;
        $this->usuario_idusuario = $usuario_idusuario;
        $this->conexion = new conexion();
        $this->agendaDAO = new agendaDAO($idagenda, $usuario_idusuario);
    }

    /**
     * @return mixed
     */
    public function getIdagenda()
    {
        return $this->idagenda;
    }

    /**
     * @param mixed $idagenda 
     * @return self
     */
    public function setIdagenda($idagenda): self
    {
        $this->idagenda = $idagenda;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario_idusuario()
    {
        return $this->usuario_idusuario;
    }

    /**
     * @param mixed $usuario_idusuario 
     * @return self
     */
    public function setUsuario_idusuario($usuario_idusuario): self
    {
        $this->usuario_idusuario = $usuario_idusuario;
        return $this;
    }

    public function consultarAgendaUsuario()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->agendaDAO->consultarAgendaUsuario());
        $resultado = $this->conexion->extraer();
        $this->idagenda = $resultado["idagenda"];
        $this->agendaDAO->setIdagenda($this->idagenda);
        $this->conexion->cerrar();
    }

    public function consultarAgenda()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->agendaDAO->consultarAgenda());
        $resultado = $this->conexion->extraer();
        $this->usuario_idusuario = $resultado["usuario_idusuario"];
        $this->conexion->cerrar();
    }

    public function agregarAgenda()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->agendaDAO->agregarAgenda());
        $this->conexion->cerrar();
    }
    public function eliminarAgenda()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->agendaDAO->eliminarAgenda());
        $this->conexion->cerrar();
    }
}
