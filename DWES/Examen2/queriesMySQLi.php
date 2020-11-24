<?php
require_once "ConexionMySQLi.php";

function getClienteMayorVenta()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT nombre, sum(importe) importe, imagen from clientes c left join registros_ventas rv on c.id = rv.id_cliente group by nombre order by importe desc limit 1";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $datos[] = array("nombre" => $fila["nombre"], "importe" => $fila["importe"], "imagen" => $fila["imagen"]);
        }
    }
    $conexion->close();

    return $datos;
}

function getComercioMayorVenta()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT nombre, count(nombre) as ventas, imagen from comercios c inner join registros_ventas rv on c.id = rv.id_cliente group by id_comercio order by ventas desc limit 1";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $datos[] = array("nombre" => $fila["nombre"], "ventas" => $fila["ventas"], "imagen" => $fila["imagen"]);
        }
    }

    return $datos;
}

function getImagenComercio($comercio)
{
    $conexion = getConexionSQLi();
    $sql = "SELECT imagen from comercios c where id = ?";
    $conexion->stmt_init();
    $resultado = $conexion->prepare($sql);
    $resultado->bind_param("d", $comercio);
        while ($fila = $resultado->fetch_array()) {
            $datos[] = array("imagen" => $fila["imagen"]);
        }

    return $datos;
}

;