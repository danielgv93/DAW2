<?php
require_once "ConexionMySQLi.php";

function getClienteMayorVenta()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT nombre, sum(importe) importe, imagen from clientes c left join registros_ventas rv on c.id = rv.id_cliente group by nombre order by importe desc limit 1";
    if ($resultado = $conexion->query($sql)) {
        $fila = $resultado->fetch_array();
        $datos = array("nombre" => $fila["nombre"], "importe" => $fila["importe"], "imagen" => $fila["imagen"]);
        $conexion->close();
        return $datos;
    }
    $conexion->close();

    return null;
}

/*function getComercioMayorVenta()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT nombre, count(nombre) as ventas, imagen from comercios c inner join registros_ventas rv on c.id = rv.id_cliente group by id_comercio order by ventas desc limit 1";
    if ($resultado = $conexion->query($sql)) {
        $fila = $resultado->fetch_array();
        $datos = array("nombre" => $fila["nombre"], "ventas" => $fila["ventas"], "imagen" => $fila["imagen"]);
        $conexion->close();
        return $datos;
    }
    $conexion->close();
    return null;
}*/

function getImagenComercio($comercio)
{
    $conexion = getConexionSQLi();
    $sql = "SELECT imagen from comercios c where id = ?";
    $consulta = $conexion->stmt_init();
    $consulta->prepare($sql);
    $consulta->bind_param("d", $comercio);
    if ($consulta->execute()) {
        $consulta->bind_result($imagen);
        $consulta->fetch();
        $datos = $imagen;
        $conexion->close();
        return $datos;
    }
    return null;
}

;