<?php
/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 18/jun/2016
 * Time: 11:33 PM
 */

$jugador = $_POST["jugador"];

include "bd.php";
$bd = new bd();

$sql="select count(*) result from jugador where nombre_jugador='$jugador'";
$result = $bd->siguiente($sql)["result"];
if ($result == 1) {
    echo "true";
} else {
    if (strpos($jugador, '/') !== false) {
        $explode = explode('/', $jugador);
        if ($explode[1] == "c") {
            $sql = "insert into jugador(nombre_jugador) VALUE ('$explode[0]')";
            $result = $bd->consulta($sql);
            if (!$result) {
                echo "Error al crear";
            } else {
                echo "true";
            }
        }
        else{
            echo "Formato Incorrecto. Verifique.";
        }
    }
    else
        echo "No existente. Para crearlo coloque '/c' al final, sin espacio";
}