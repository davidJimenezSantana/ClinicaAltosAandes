<?php

class conexion
{

    private $mysqli;
    private $resultado;

    public function abrir()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "clinicaaa");
        $this->mysqli->set_charset("utf8");

        if ($this->mysqli->connect_errno) {
            echo ("Fallo al conectar con BD: ( " . $this->mysqli->connect_errno . " )");
        }
    }

    public function ejecutar($sql)
    {
        $this->resultado = $this->mysqli->query($sql);
    }

    public function extraer()
    {
        return $this->resultado->fecth_assoc();
    }

    public function cerrar(){
        $this->mysqli->close();
    }

    public function numResultados(){
        $num = 0;
        if($this->resultado != null){
            $num = $this -> resultado -> num_rows;
        }
        return $num;
    }
}
