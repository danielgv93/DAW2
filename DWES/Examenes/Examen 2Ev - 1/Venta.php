<?php


class Venta
{
    private $matricula, $dni, $fecha;

    /**
     * Venta constructor.
     * @param $matricula
     * @param $dni
     * @param $fecha
     */
    public function __construct($matricula, $dni, $fecha)
    {
        $this->matricula = $matricula;
        $this->dni = $dni;
        $this->fecha = $fecha;
    }

    public function __toString()
    {
        return "$this->matricula, $this->dni, $this->fecha";
    }


}