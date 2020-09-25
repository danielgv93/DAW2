<?php

/**
 * Calcula el capital final pasado unos años y con un tipo de interes
 * que de forma predeterminada es 0.1
 *
 * @param double $capitalInicial
 * @param float $tipoInteres
 * @param int $años
 * @return double Capital final
 */
function interesSimple($capitalInicial, $años, $tipoInteres = 0.1)
{
    $capitalFinal = 0;
    if ($años > 0) {
        $capitalFinal = $capitalInicial * (1 + $tipoInteres * $años);
    } else {
        $capitalFinal = false;
    }
    return $capitalFinal;
}

/**
 * Calcula el capital final pasado unos años y con un tipo de interes
 * compuesto que de forma predeterminada es 0.1
 *
 * @param double $capitalInicial
 * @param float $tipoInteres
 * @param int $años
 * @return double Capital final
 */
function interesCompuesto($capitalInicial, $años, $tipoInteres = 0.1)
{
    $capitalFinal = 0;
    if ($años > 0) {
        $capitalFinal = $capitalInicial * pow(1 + $tipoInteres, $años);
    } else {
        $capitalFinal = false;
    }
    return $capitalFinal;
}
