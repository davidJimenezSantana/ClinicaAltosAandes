<?php

class especialidadDAO
{

    private $idespecialidad;
    private $nombre;

    public function __construct($idespecialidad, $nombre)
    {
        $this->idespecialidad = $idespecialidad;
        $this->nombre = $nombre;
    }

    public function getIdespecialidad()
    {
        return $this->idespecialidad;
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

    public function consultarEspecialidad()
    {
        return "SELECT nombre
                FROM especialidad
                WHERE idespecialidad = '" . $this->idespecialidad . "'";
    }

    public function verEspecialidades()
    {
        return "SELECT idespecialidad, nombre
                FROM especialidad";
    }

    public function eliminarEspecialidades()
    {
        return "DELETE FROM especialidad
                 WHERE idespecialidad = '" . $this->idespecialidad . "'";
    }

    public function editarEspecialidad()
    {
        return "UPDATE especialidad
        SET nombre = " . $this->nombre . "
        WHERE idespecialidad = '" . $this->idespecialidad . "'";
    }

    public function agregarEspecialidad(){
        return "INSERT INTO especialidad 
                VALUES (0,'" . $this->nombre . "')";
    }
}
