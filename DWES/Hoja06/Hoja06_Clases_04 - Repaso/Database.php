<?php
require_once "Producto.php";
require_once "Alimentacion.php";
require_once "Electronica.php";
require_once "Categoria.php";


class Database
{
    private static $instance = null;
    const DSN = "mysql:host=localhost;dbname=dwes_supermercado";
    const USERNAME = "root";
    const PASSWORD = "";

    private function __construct()
    {
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function getConexion(): PDO
    {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        return new PDO(
            self::DSN,
            self::USERNAME,
            self::PASSWORD,
            $opciones
        );
    }

    public function getProductos()
    {
        // TODO: Añadir una funcion para extraer cada id en un array

        //TODO: Meter en un bucle el if con cada id extraido anteriormente
        if (self::getTipoProducto($id) == "movil") {
            return self::getAlimentacion($id);
        } else {
            return self::getElectronica($id);
        }
    }

    public function getCategorias()
    {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT id, nombre from categorias";
        $consulta = $conexion->query($sql);
        $consulta->bindColumn(1, $id);
        $consulta->bindColumn(2, $nombre);
        while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) {
            $datos[] = new Categoria($id, $nombre);
        }
        return $datos;
    }

    public function getProductosByCategoria($idCategoria)
    {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT p.codigo, p.precio, p.nombre, c.id idCategoria, c.nombre nombreCategoria FROM productos p INNER JOIN categorias c on p.categoria = c.id WHERE c.id = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $idCategoria);
        $consulta->execute();
        $consulta->bindColumn(1, $id);
        $consulta->bindColumn(2, $precio);
        $consulta->bindColumn(3, $nombreProducto);
        $consulta->bindColumn(4, $idCategoria);
        $consulta->bindColumn(5, $nombreCategoria);
        while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) {
            $datos[] = new Producto($id, $precio, $nombreProducto, new Categoria($idCategoria, $nombreCategoria));
        }
        return $datos;
    }

    public function getTipoProducto($idProducto)
    {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT COUNT(*) as iguales from alimentacion where id_alimentacion = ?;";
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(1, $idProducto);
        $resultado->execute();
        $fila = $resultado->fetch();
        if ($fila["iguales"] != 0) {
            return "alimentacion";
        }
        return "electronica";
    }

    public function getAlimentacion($idSelected)
    {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT 
            codigo, precio, p.nombre, categoria, mes_caducidad, anio_caducidad, c.nombre from productos p 
            inner join alimentacion a on p.codigo = a.id_alimentacion
            inner join categorias c on p.categoria = c.id
            where p.codigo = ?;";
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(1, $idSelected);
        $resultado->execute();
        $resultado->bindColumn(1, $id);
        $resultado->bindColumn(2, $precio);
        $resultado->bindColumn(3, $nombreProducto);
        $resultado->bindColumn(4, $idCategoria);
        $resultado->bindColumn(5, $mes);
        $resultado->bindColumn(6, $anio);
        $resultado->bindColumn(7, $nombreCategoria);
        while ($resultado->fetch(PDO::FETCH_BOUND)) {
            $datos[] = new Alimentacion($id, $precio, $nombreProducto, new Categoria($idCategoria, $nombreCategoria), $mes, $anio);
        }
        return $datos;
    }

    public function getElectronica($idSelected)
    {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT 
            codigo, precio, p.nombre, categoria, plazo_garantia, c.nombre from productos p 
            inner join electronica e on p.codigo = e.id_electronica
            inner join categorias c on p.categoria = c.id
            where p.codigo = ?;";
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(1, $idSelected);
        $resultado->execute();
        $resultado->bindColumn(1, $id);
        $resultado->bindColumn(2, $precio);
        $resultado->bindColumn(3, $nombreProducto);
        $resultado->bindColumn(4, $idCategoria);
        $resultado->bindColumn(6, $plazo);
        $resultado->bindColumn(7, $nombreCategoria);
        while ($resultado->fetch(PDO::FETCH_BOUND)) {
            $datos[] = new Electronica($id, $precio, $nombreProducto, new Categoria($idCategoria, $nombreCategoria), $plazo);
        }
        return $datos;
    }

}