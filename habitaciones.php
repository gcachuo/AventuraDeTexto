<?php
/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 21/jun/2016
 * Time: 12:12 AM
 */

require "bd.php";
$bd = new bd();

$lista_habitaciones = obtenerHabitaciones();

function obtenerHabitaciones()
{
    global $bd;
    $lista_habitaciones = [];

    $sql = "select nombre_habitacion nombre, descripcion_habitacion descripcion, norte,sur,este,oeste from habitaciones";
    foreach ($bd->consulta($sql) as $reg) {
        $lista_habitaciones[$reg["nombre"]]["descripcion"] = $reg["descripcion"];
        $lista_habitaciones[$reg["nombre"]]["norte"] = $reg["norte"];
        $lista_habitaciones[$reg["nombre"]]["sur"] = $reg["sur"];
        $lista_habitaciones[$reg["nombre"]]["este"] = $reg["este"];
        $lista_habitaciones[$reg["nombre"]]["oeste"] = $reg["oeste"];
    }
    return $lista_habitaciones;
}

function resetHabitacion()
{
    global $lista_habitaciones;

    $habitacion_actual = "sala";
    insertarHabitacion($habitacion_actual);

    return $lista_habitaciones[$habitacion_actual];
}

function siguienteHabitacion($jugador, $direccion)
{
    global $lista_habitaciones;
    global $bd;

    $sql = "select habitacion_jugador habitacion from jugador where nombre_jugador = '$jugador'";
    $habitacion_actual = $bd->siguiente($sql)["habitacion"];

    $siguiente_habitacion = $lista_habitaciones[$habitacion_actual][$direccion];
    if ($siguiente_habitacion == null) {
        return ["descripcion" => "No puedes ir en esa direccion"];
    } else {
        $habitacion_actual = $siguiente_habitacion;
    }
    insertarHabitacion($habitacion_actual);
    return $lista_habitaciones[$habitacion_actual];
}

function insertarHabitacion($habitacion)
{
    global $bd;
    $sql = "update jugador set habitacion_jugador='$habitacion'";
    $result = $bd->consulta($sql);
    if (!$result) {
        return "Error al insertar en BD";
    }
    return "true";
}