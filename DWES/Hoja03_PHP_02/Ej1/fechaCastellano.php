<?php
function crearFecha() {
    $diaSemana = date("l");
    $dia = date("j");
    $mes = date("n");
    $año = date("Y");

    // Traduccion dias de la semana

    if ($diaSemana == "Monday") {
        $diaSemana = "Lunes";
    } elseif ($diaSemana == "Tuesday") {
        $diaSemana = "Martes";
    } elseif ($diaSemana == "Wenesday") {
        $diaSemana = "Miercoles";
    } elseif ($diaSemana == "Thursday") {
        $diaSemana = "Jueves";
    } elseif ($diaSemana == "Friday") {
        $diaSemana = "Viernes";
    } elseif ($diaSemana == "Saturday") {
        $diaSemana = "Sabado";
    } elseif ($diaSemana == "Sunday") {
        $diaSemana = "Domingo";
    }

    //Traduccion meses del año
    if ($mes == 1) {
        $mes = "Enero";
    } elseif ($mes == 2) {
        $mes = "Febrero";
    } elseif ($mes == 3) {
        $mes = "Marzo";
    } elseif ($mes == 4) {
        $mes = "Abril";
    } elseif ($mes == 5) {
        $mes = "Mayo";
    } elseif ($mes == 6) {
        $mes = "Junio";
    } elseif ($mes == 7) {
        $mes = "Julio";
    } elseif ($mes == 8) {
        $mes = "Agosto";
    } elseif ($mes == 9) {
        $mes = "Septiembre";
    } elseif ($mes == 10) {
        $mes = "Octubre";
    } elseif ($mes == 11) {
        $mes = "Noviembre";
    } elseif ($mes == 12) {
        $mes = "Diciembre";
    }
    //Impresion de datos
    $fecha = $diaSemana . ", " . $dia . " de " . $mes . " de " . $año;
    return $fecha;
}
