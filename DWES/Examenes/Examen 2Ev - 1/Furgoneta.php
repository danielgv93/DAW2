<?php
require_once "Vehiculo.php";

class Furgoneta extends Vehiculo
{
    private $volumen;

    public function __construct($matricula, $modelo, $enVenta, $precio, Cliente $cliente, $volumen)
    {
        parent::__construct($matricula, $modelo, $enVenta, $precio, $cliente);
        $this->volumen = $volumen;
    }

    public function __toString()
    {
        return parent::__toString() . ". Ademas, tiene $this->volumen de volumen";
    }


}