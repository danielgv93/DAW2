<?php


class Cliente
{
    private $dni, $nombre;

    /**
     * Cliente constructor.
     * @param $dni
     * @param $nombre
     */
    public function __construct($dni, $nombre)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function __toString()
    {
        return "$this->nombre - DNI $this->dni";
    }


}