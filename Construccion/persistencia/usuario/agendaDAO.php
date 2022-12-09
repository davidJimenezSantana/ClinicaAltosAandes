<?php

class agendaDAO
{

    private $idagenda;
    private $usuario_idusuario;

    public function __construct($idagenda, $usuario_idusuario)
    {
        $this->idagenda = $idagenda;
        $this->usuario_idusuario = $usuario_idusuario;
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
        return "SELECT idagenda 
                FROM agenda
                WHERE usuario_idusuario = '" . $this->usuario_idusuario . "'";
    }
    public function consultarAgenda()
    {
        return "SELECT usuario_idusuario
                FROM agenda
                WHERE idagenda = '" . $this->idagenda . "'";
    }

    public function agregarAgenda()
    {
        return "INSERT INTO agenda (`idagenda`, `usuario_idusuario`)
                VALUES
                (NULL, '" . $this->usuario_idusuario . "')";
    }
    public function eliminarAgenda()
    {
        return "DELETE FROM agenda WHERE idagenda = '" . $this->idagenda . "'";
    }
}
