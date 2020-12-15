<?php
require_once "iEncendible.php";

class Coche implements iEncendible
{
    private $gasolina;
    private $bateria;
    private $estado;

    /**
     * Coche constructor.
     * @param $gasolina
     * @param $bateria
     * @param $estado
     */
    public function __construct()
    {
        $this->gasolina = 0;
        $this->bateria = 10;
        $this->estado = false;
    }

    public function repostar($litros)
    {
        $this->gasolina += $litros;
    }

    public function encender()
    {
        if (!$this->estado && $this->gasolina > 0 && $this->bateria > 0) {
            $this->estado = true;
            $this->gasolina--;
            $this->bateria--;
        } else {
            echo "No se puede arrancar el coche";
        }
    }

    public function apagar()
    {
        if ($this->estado) {
            $this->estado = false;
        } else {
            echo "El coche ya esta apagado";
        }
    }


}