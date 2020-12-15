<?php
require_once "iEncendible.php";

class Bombilla implements iEncendible
{
    private $horasDeVida;
    private $estado;

    /**
     * Bombilla constructor.
     * @param $horasDeVida
     */
    public function __construct($horasDeVida)
    {
        $this->horasDeVida = $horasDeVida;
        $this->estado = false;
    }

    public function encender()
    {
        if ($this->horasDeVida > 0 && !$this->estado) {
            $this->estado = true;
            $this->horasDeVida -= 2;
        }
    }

    public function apagar()
    {
        if ($this->estado) {
            $this->estado = false;
            echo "Bombilla apagada";
        } else {
            echo "La bombilla estaba apagada";
        }
    }

}