<?php 
$historico = array(
    "Torrelavega" => array("Enero" => 85, "Febrero" => 68, "Marzo" => 67, "Abril" => 86, "Mayo" => 62, "Junio" => 54, "Julio" => 39, "Agosto" => 61, "Septiembre" => 84, "Octubre" => 99, "Noviembre" => 120, "Diciembre" => 115),
    "Sevilla" => array("Enero" => 76, "Febrero" => 73, "Marzo" => 66, "Abril" => 53, "Mayo" => 34, "Junio" => 14, "Julio" => 1, "Agosto" => 3, "Septiembre" => 18, "Octubre" => 69, "Noviembre" => 87, "Diciembre" => 82),
    "Madrid" => array("Enero" => 44, "Febrero" => 35, "Marzo" => 45, "Abril" => 44, "Mayo" => 28, "Junio" => 11, "Julio" => 11, "Agosto" => 11, "Septiembre" => 30, "Octubre" => 51, "Noviembre" => 58, "Diciembre" => 50)
);

if (isset($_POST["enviar"])) {
    $ciudadSeleccionada = $_POST["ciudad"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Comprobar precipitaciones</h1>
<form action="#" method="post">

    <?php foreach ($historico as $ciudad => $precipitaciones) : ?>
            
                <label for="<?= $ciudad ?>">
                    <input type="radio" id="<?= $ciudad ?>" <?= $checkedProp = (isset($ciudadSeleccionada) &&
                                                                                            $ciudadSeleccionada == $ciudad) ? "checked" : ""; ?> name="ciudad" value="<?= $posicion ?>">
                    <?= $posicion ?></label>
           
        <?php endforeach ?>

    

</form>
    
</body>
</html>