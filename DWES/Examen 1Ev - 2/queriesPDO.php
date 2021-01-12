<?php
require_once "ConexionPDO.php";

function getVentasComercios($comercio)
{
    $conexion = getConexionPDO();
    $sql = "SELECT  c.nombre as cliente, c.apellidos as apellido, importe, fecha, c.imagen as imagen from registros_ventas rv 
        inner join clientes c on rv.id_cliente = c.id where id_comercio = ? order by importe desc";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(1, $comercio);
    if($consulta->execute()) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("cliente"=>$fila["cliente"], "apellido"=>$fila["apellido"], "importe" => $fila["importe"], "fecha" => $fila["fecha"], "imagen" => $fila["imagen"]);
        }
    }
    unset($conexion);
    if (!isset($datos)) {
        return false;
    }
    return $datos;
}

function getComercioMayorVenta()
{
    $conexion = getConexionPDO();
    $sql = "SELECT nombre, count(nombre) as ventas, imagen from comercios c inner join registros_ventas rv on c.id = rv.id_cliente group by id_comercio order by ventas desc limit 1";
    if ($resultado = $conexion->query($sql)) {
        $fila = $resultado->fetch();
        $datos = array("nombre" => $fila["nombre"], "ventas" => $fila["ventas"], "imagen" => $fila["imagen"]);
        unset($conexion);
        return $datos;
    }
    unset($conexion);
    return null;
}

function getComercios()
{
    $conexion = getConexionPDO();
    $sql = "SELECT id, nombre, imagen from comercios";
    if($consulta = $conexion->query($sql)) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("id" => $fila["id"], "nombre" => $fila["nombre"], "imagen" => $fila["imagen"]);
        }
    }
    unset($conexion);
    return $datos;
}

function getClientes()
{
    $conexion = getConexionPDO();
    $sql = "SELECT id, nombre, apellidos from clientes";
    if($consulta = $conexion->query($sql)) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("id" => $fila["id"], "nombre" => $fila["nombre"], "apellido" => $fila["apellidos"]);
        }
    }
    unset($conexion);
    return $datos;
}

function insertarCompra($comercio, $cliente, $fecha, $importe)
{
    $conexion = getConexionPDO();
    try {
        $conexion->beginTransaction();
        $sql = "INSERT INTO registros_ventas (id_cliente, id_comercio, fecha, importe) VALUES (?, ?, ?, ?);";
        $insert = $conexion->prepare($sql);
        $insert->bindParam(1, $cliente);
        $insert->bindParam(2, $comercio);
        $insert->bindParam(3, $fecha);
        $insert->bindParam(4, $importe);
        if ($insert->execute() != true) {
            throw new Exception("Error al insertar la compra");
        }
        $conexion->commit();
        unset($conexion);
        return true;
    } catch (Exception $e) {
        $conexion->rollback();
        echo $e->getMessage();
        unset($conexion);
        return false;
    }
}
