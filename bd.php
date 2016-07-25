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
        try {
            $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->bd);
            if ($mysqli->connect_errno) {
                echo utf8_encode("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
                return null;
            }
            return $mysqli;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    function consulta($sql)
    {
        try {
            $conectar = $this->conectar();
            $resultado = $conectar->query($sql);
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return;
        }
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