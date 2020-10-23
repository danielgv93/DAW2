<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php 

    // REPASAR
        $ccc = 123456789001234567890;

        if (ccc_valido($ccc)) {
            print "Cuenta corriente correcta.";
        } else {
            print "Cuenta corriente incorrecta.";
        }
        
        
        
        
        
        function checkLengthCC($cuentaBancaria){
            if (strlen((string)$cuentaBancaria) == 20) {
                return true;
            }
            return false;
        }
        
        function ccc_valido($ccc){
            $valido = true;

            ///////////////////////////////////////////////////
            //    Dígito de control de la entidad y sucursal:
            //Se multiplica cada dígito por su factor de peso
            ///////////////////////////////////////////////////
            $suma = 0;
            $suma += $ccc[0] * 4;
            $suma += $ccc[1] * 8;
            $suma += $ccc[2] * 5;
            $suma += $ccc[3] * 10;
            $suma += $ccc[4] * 9;
            $suma += $ccc[5] * 7;
            $suma += $ccc[6] * 3;
            $suma += $ccc[7] * 6;

            $division = floor($suma/11);
            $resto = $suma - ($division  * 11);
            $primer_digito_control = 11 - $resto;
            if($primer_digito_control == 11)
                $primer_digito_control = 0;

            if($primer_digito_control == 10)
                $primer_digito_control = 1;

            if($primer_digito_control != $ccc[8])
                $valido = false;

            ///////////////////////////////////////////////////
            //            Dígito de control de la cuenta:
            ///////////////////////////////////////////////////
            $suma = 0;
            $suma += $ccc[10] * 1;
            $suma += $ccc[11] * 2;
            $suma += $ccc[12] * 4;
            $suma += $ccc[13] * 8;
            $suma += $ccc[14] * 5;
            $suma += $ccc[15] * 10;
            $suma += $ccc[16] * 9;
            $suma += $ccc[17] * 7;
            $suma += $ccc[18] * 3;
            $suma += $ccc[19] * 6;

            $division = floor($suma/11);
            $resto = $suma-($division  * 11);
            $segundo_digito_control = 11- $resto;

            if($segundo_digito_control == 11)
                $segundo_digito_control = 0;
            if($segundo_digito_control == 10)
                $segundo_digito_control = 1;

            if($segundo_digito_control != $ccc[9])
                $valido = false;

            return $valido;
        }

    ?>
</body>
</html>