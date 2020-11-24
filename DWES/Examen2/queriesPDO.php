<?php
require_once "ConexionPDO.php";

function getVentasComercios($comercio)
{
    $conexion = getConexionPDO();
    $sql = "SELECT c.id as id, c2.nombre as cliente, importe, fecha, c.imagen as imagen from comercios c left join registros_ventas rv on c.id = rv.id_comercio 
        inner join clientes c2 on rv.id_cliente = c2.id where c.id = ? order by importe desc";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(1, $comercio);
    if($consulta->execute()) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("comercio" => $fila["id"], "cliente"=>$fila["cliente"], "importe" => $fila["importe"], "fecha" => $fila["fecha"], "imagen" => $fila["imagen"]);
        }
    }
    unset($conexion);
    if (!isset($datos)) {
        return false;
    }
    return $datos;
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
    $sql = "SELECT id, nombre from clientes";
    if($consulta = $conexion->query($sql)) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("id" => $fila["id"], "nombre" => $fila["nombre"]);
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
