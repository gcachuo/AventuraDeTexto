<?php
/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 21/jun/2016
 * Time: 12:12 AM
 */

require "bd.php";
$bd = new bd();

$lista_habitaciones = [
    "sala" => ["descripcion" => 'Estas en la sala', "norte" => "cocina", "sur" => "cochera", "este" => "comedor", "oeste" => "baño"],
    "cocina" => ["descripcion" => 'Estas en la cocina', "norte" => null, "sur" => "sala", "este" => null, "oeste" => null],
    "baño" => ["descripcion" => 'Estas en el baño', "norte" => null, "sur" => null, "este" => "sala", "oeste" => null],
    "comedor" => ["descripcion" => 'Estas en el comedor', "norte" => null, "sur" => null, "este" => null, "oeste" => "sala"],
    "cochera" => ["descripcion" => 'Estas en la cochera', "norte" => "sala", "sur" => null, "este" => null, "oeste" => null]
];

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