<?php
$arrayEquipos = array(
    "Real Madrid" => array(
        "Entrenador" => array("Zidane" => "img/zidane.jpg"),
        "Jugadores" => array("Courtois" => "img/courtois.jpg", "Ramos" => "img/ramos.jpg", "Hazard" => "img/hazard.jpg")
    ),
    "Barcelona" => array(
        "Entrenador" => array("Koeman" => "img/koeman.jpg"),
        "Jugadores" => array("Ter Stegen" => "img/ter_stegen.jpg", "Pique" => "img/pique.jpg", "Griezmann" => "img/griezmann.jpg")
    )
);
if (isset($_POST["submit"])) {
    $equipoSelected = $_POST["equipo"];
    $posSelected = $_POST["puesto"];
    $arrayResultadoJugadores = (getArrayJugadores(getArrayJugadores_SinUnir($arrayEquipos, $equipoSelected, $posSelected)));
}

/* var_dump($arrayEquipos);
var_dump($_POST); */

function getArrayJugadores_SinUnir($arrayEquipos, $equipoInput, $puestoArrayInput)
{
    $arrayEqSelected = $arrayEquipos[$equipoInput];
    foreach ($arrayEqSelected as $puesto => $arrayPersonas) {
        foreach ($puestoArrayInput as $puestoInput) {
            if ($puesto == $puestoInput) {
                $arrayResultado[] = $arrayPersonas;
            }
        }
    }
    return $arrayResultado;
}

function getArrayJugadores($array)
{
    $resultado = array();
    foreach ($array as $item) {
        $resultado = array_merge($resultado, $item);
    }
    return $resultado;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <title>Ejercicio 2</title>
</head>

<body>
    <div class="container border">
        <h1>ELIGE UN EQUIPO</h1>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" class="form-check">
            <div class="form-group">
                <label for="equipo">Equipo</label>
                <select class="form-control" name="equipo">
                    <?php
                    /* CREAR LOS SELECT */
                    foreach ($arrayEquipos as $equipo => $plantilla) : ?>
                        <option <?php /* Condicion para dejar seleccionado el equipo */
                                echo $selectedProp = (isset($equipoSelected) && $equipo == $equipoSelected) ? "selected" : ""; ?> value="<?= $equipo ?>"><?= $equipo ?>
                        </option>
                    <?php endforeach ?>
                    <option value="Todos">Todos</option>
                </select>
            </div>
            <div class="form-check form-check mb-2">
                <label class="form-check-label mr-4">
                    <input class="form-check-input" type="checkbox" name="puesto[]" value="Entrenador" <?php echo $chechekProp = (isset($posSelected) && in_array("Entrenador", $posSelected)) ? "checked" : "" ?>>
                    Entrenador
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="puesto[]" value="Jugadores" <?php echo $chechekProp = (isset($posSelected) && in_array("Jugadores", $posSelected)) ? "checked" : "" ?>>
                    Jugadores
                </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-2">Buscar</button>
        </form>
        <div class="row justify-content-center">
            <div class="col-8">
                <?php if (isset($_POST["submit"])) : ?>
                    <table class="table border mt-3">
                        <!-- HEADER DE TABLA -->
                        <thead class="thead-dark">
                            <tr>
                            <!-- EN PROCESO -->
                                <?php foreach ($arrayEquipos as $key => $value) : ?>
                                    <?php if ($key == $_POST["equipo"]) : ?>
                                        <th colspan="2" style="text-align: center;"><?= $key ?></th>
                                    <?php elseif ($key == "Todos") : ?>
                                        <?php foreach ($arrayEquipos as $equipos => $value) : ?>
                                            <th style="text-align: center;"><?= $value ?></th>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <!-- FILAS DE TABLA -->
                        <?php foreach ($arrayResultadoJugadores as $jugador => $imagen) : ?>
                            <tr>
                                <td><?= $jugador ?></td>
                                <td><img style="width: 400px;" src="<?= $imagen ?>"></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                <?php endif ?>
            </div>
        </div>

    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>