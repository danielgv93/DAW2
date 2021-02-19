<?php


class Funciones
{
    /**
     * @param string $dni
     * @return string
     */
    function getLetra($dni): string
    {
        if ($dni > 0 && strlen($dni) == 8) {
            $letras = array(
                "T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X",
                "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"
            );
            $resto = $dni % 23;
            foreach ($letras as $item => $key) {
                if ($resto == $item) {
                    return $key;
                }
            }
        }
    }

    /**
     * @param string $dni
     * @param string $letra
     * @return bool
     */
    function compruebaDNI($dni, $letra): bool
    {
        $letraCorrecta = $this->getLetra($dni);
        if ($letraCorrecta == strtoupper($letra)) {
            return true;
        }
        return false;
    }
}