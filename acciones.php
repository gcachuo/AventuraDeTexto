<?php
/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 18/jun/2016
 * Time: 10:08 PM
 */

include "habitaciones.php";

if (isset($_POST["accion"])) {
    if (strpos($_POST["accion"], ' ') !== false) {
        $postAccion = explode(' ', $_POST["accion"]);
        $accion1 = $postAccion[0];
        $accion2 = $postAccion[1];

        switch ($accion1) {
            case "ir":
                $habitacion = siguienteHabitacion($_POST["jugador"], $accion2);
                echo $habitacion["descripcion"];
                break;
        }
    } else
        echo "Sintaxis Incorrecta";
}

