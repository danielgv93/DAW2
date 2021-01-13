<?php
require_once "Cliente.php";
require_once "Vehiculo.php";
require_once "Furgoneta.php";
require_once "Turismo.php";
require_once "Venta.php";

class BaseDatos
{
    private static $instance = null;
    const DSN = "mysql:host=localhost;dbname=dwes_examen_202101";
    const USERNAME = "root";
    const PASSWORD = "";

    private function __construct()
    {
    }

    public static function getInstance(): BaseDatos
    {
        if (self::$instance === null) {
            self::$instance = new BaseDatos();
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

    public function matriculaCorrecta(String $matricula) {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT * FROM vehiculos WHERE matricula = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $matricula);
        $consulta->execute();
        if ($consulta->fetchColumn() == 0) {
            return false;
        }
        return true;
    }

    public function getCliente(String $matricula) {
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT dni, nombre FROM vehiculos INNER JOIN clientes c on vehiculos.cliente = c.dni WHERE matricula = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $matricula);
        $consulta->execute();
        $consulta->bindColumn(1, $dni);
        $consulta->bindColumn(2, $nombre);
        $consulta->fetch(PDO::FETCH_BOUND);
        return new Cliente($dni, $nombre);
    }

    public function getVehiculosCliente(Cliente $cliente) {
        return array_merge($this->getTurismoCliente($cliente), $this->getFurgonetasCliente($cliente));
    }

    private function getFurgonetasCliente(Cliente $cliente) {
        $furgonetas = array();
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT v.matricula, modelo, enVenta, precio, volumen, cliente, nombre FROM clientes 
            INNER JOIN vehiculos v on clientes.dni = v.cliente INNER JOIN furgonetas f on v.matricula = f.matricula
            WHERE cliente = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindValue(1, $cliente->getDni());
        $consulta->execute();
        $consulta->bindColumn(1, $matricula);
        $consulta->bindColumn(2, $modelo);
        $consulta->bindColumn(3, $enVenta);
        $consulta->bindColumn(4, $precio);
        $consulta->bindColumn(5, $volumen);
        $consulta->bindColumn(6, $cliente);
        $consulta->bindColumn(7, $nombre);
        while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) {
            $furgonetas[] = new Furgoneta($matricula, $modelo, $enVenta, $precio, new Cliente($cliente, $nombre), $volumen);
        }
        return $furgonetas;
    }

    private function getTurismoCliente(Cliente $cliente) {
        $turismos = array();
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT v.matricula, modelo, enVenta, precio, automatico, cliente, nombre FROM clientes 
            INNER JOIN vehiculos v on clientes.dni = v.cliente INNER JOIN turismos t on v.matricula = t.matricula 
            WHERE cliente = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindValue(1, $cliente->getDni());
        $consulta->execute();
        $consulta->bindColumn(1, $matricula);
        $consulta->bindColumn(2, $modelo);
        $consulta->bindColumn(3, $enVenta);
        $consulta->bindColumn(4, $precio);
        $consulta->bindColumn(5, $automatico);
        $consulta->bindColumn(6, $cliente);
        $consulta->bindColumn(7, $nombre);
        while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) {
            $turismos[] = new Turismo($matricula, $modelo, $enVenta, $precio, new Cliente($cliente, $nombre), $automatico);
        }
        return $turismos;
    }

    public function getTurismosEnVenta(Cliente $cliente) {
        $turismos = array();
        $conexion = $this->getConexion();
        $sql = /** @lang MariaDB */
            "SELECT v.matricula, modelo, enVenta, precio, automatico, cliente, nombre FROM clientes 
            INNER JOIN vehiculos v on clientes.dni = v.cliente INNER JOIN turismos t on v.matricula = t.matricula 
            WHERE v.matricula NOT IN (
                SELECT v.matricula FROM clientes 
                INNER JOIN vehiculos v on clientes.dni = v.cliente INNER JOIN turismos t on v.matricula = t.matricula 
                WHERE cliente = ?
            )";
        $consulta = $conexion->prepare($sql);
        $consulta->bindValue(1, $cliente->getDni());
        $consulta->execute();
        $consulta->bindColumn(1, $matricula);
        $consulta->bindColumn(2, $modelo);
        $consulta->bindColumn(3, $enVenta);
        $consulta->bindColumn(4, $precio);
        $consulta->bindColumn(5, $automatico);
        $consulta->bindColumn(6, $cliente);
        $consulta->bindColumn(7, $nombre);
        while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) {
            $turismos[] = new Turismo($matricula, $modelo, $enVenta, $precio, new Cliente($cliente, $nombre), $automatico);
        }
        return $turismos;
    }

    public function realizarCompra(Cliente $cliente, String $matricula) {
        $conexion = $this->getConexion();
        try {
            $conexion->beginTransaction();
            $sql = /** @lang MariaDB */
                "INSERT INTO ventas (matricula, dni, fecha) VALUES (?,?,CURRENT_TIMESTAMP())";
            $consulta = $conexion->prepare($sql);
            $consulta->bindValue(1, $matricula);
            $consulta->bindValue(2, $cliente->getDni());
            if ($consulta->execute() != true) {
                throw new Exception("Error al registrar la compra");
            }
            $sql = /** @lang MariaDB */
                "UPDATE vehiculos SET cliente = ? WHERE matricula = ?";
            $consulta = $conexion->prepare($sql);
            $consulta->bindValue(1, $cliente->getDni());
            $consulta->bindParam(2, $matricula);
            if ($consulta->execute() != true) {
                throw new Exception("Error al actualizar el cliente");
            }
            $conexion->commit();
            return true;
        } catch (Exception $e) {
            $conexion->rollBack();
            return false;
        }
    }
}