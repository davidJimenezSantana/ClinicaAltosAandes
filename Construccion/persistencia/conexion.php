<?php

class conexion
{
    private $mysqli;
    private $resul;

    public function abrir() // abre conexion con la base de datos
    {
        $this->mysqli = new mysqli("localhost", "root", "", "clinicaaltodelosalpes");
        $this->mysqli->set_charset("utf8");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    public function cerrar() // cierra la conexion
    {
        $this->mysqli->close();
    }

    public function ejecutar($sentencia) //Ejecuta la sentencia en la base de datos
    {
        $this->resul = $this->mysqli->query($sentencia);
    }

    public function extraer() //trae el resultado de la consulta 
    {
        return $this->resul->fetch_assoc();
    }

    public function numResultados() //cantidad de resultados que traes la sentencia
    {
        $num = 0;
        if ($this->resul != null) {
            $num = $this->resul->num_rows;
        }
        return $num;
    }
}
