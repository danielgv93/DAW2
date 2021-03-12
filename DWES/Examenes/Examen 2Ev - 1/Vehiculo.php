<?php


class Vehiculo
{
    protected $matricula, $modelo, $enVenta, $precio;
    protected Cliente $cliente;

    /**
     * Vehiculo constructor.
     * @param $matricula
     * @param $modelo
     * @param $enVenta
     * @param $precio
     * @param $cliente
     */
    public function __construct($matricula, $modelo, $enVenta, $precio, Cliente $cliente)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->enVenta = $enVenta;
        $this->precio = $precio;
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    public function __toString()
    {
        $venta = "No";
        if ($this->enVenta) {
            $venta = "";
        }
        return "$this->modelo con matricula $this->matricula $venta está en venta. Su precio es $this->precio";
    }


}