<?php
require_once "Vehiculo.php";

class Turismo extends Vehiculo
{
    private $automatico;

    public function __construct($matricula, $modelo, $enVenta, $precio, Cliente $cliente, $automatico)
    {
        parent::__construct($matricula, $modelo, $enVenta, $precio, $cliente);
        $this->automatico = $automatico;
    }

    public function __toString()
    {
        $automat = "no";
        if ($this->automatico) {
            $automat = "si";
        }
        return parent::__toString() . ". Ademas, $automat es automatico";
    }


}