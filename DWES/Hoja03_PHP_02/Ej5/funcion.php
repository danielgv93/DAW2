<?php 
    function capicua($numero){
        $inverso = 0;
        $aux = $numero;
        while ($aux != 0) {
            $resto = $aux % 10;
            $inverso = $inverso * 10 + $resto;
            $aux = (int) ($aux / 10);
        }

        if ($numero == $inverso) {
            print "El numero es capicua";
            return true;
        } else {
            print "El numero no es capicua";
            return false;
        }
    }

    function redondear($numero){
        return (int)$numero;
    }

    function contarDigitos($numero){
        return strlen((string)$numero);
    }
?>
