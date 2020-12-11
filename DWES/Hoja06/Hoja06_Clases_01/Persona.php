<?php


class Persona
{
    protected $nombre;
    protected $apellidos;

    /**
     * Persona constructor.
     * @param $nombre
     * @param $apellidos
     */
    public function __construct($nombre, $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }


    public function muestra(){
        print "<p>" . $this->nombre . $this->apellidos."</p>";
    }
}

class Alumno extends Persona
{
    private $notas;

    /**
     * Alumno constructor.
     * @param $notas
     */
    public function __construct($nombre, $apellidos, $notas)
    {
        parent::__construct($nombre, $apellidos);
        $this->notas = $notas;
    }


}

$alumno = new Alumno("Dani", "Garcia", 7);
echo $alumno->muestra();
echo $alumno instanceof Persona;
echo $alumno instanceof Alumno;