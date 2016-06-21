<?php

/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 18/jun/2016
 * Time: 11:17 PM
 */

class bd
{
    protected $host = "localhost",
        $user = "root",
        $pass = "sqlserver",
        $bd = "juegodetexto";

    function conectar()
    {
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->bd);
        if ($mysqli->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
    }

    function consulta($sql)
    {
        $resultado = $this->conectar()->query($sql);
        return $resultado;
    }

    function siguiente($sql)
    {
        $consulta = $this->consulta($sql);
        if (!$consulta) {
            return null;
        } else {
            $resultado = $consulta->fetch_assoc();
            return $resultado;
        }
    }
}