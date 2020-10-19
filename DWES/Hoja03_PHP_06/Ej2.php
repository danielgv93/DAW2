<?php
$liga = array(
    "Real Madrid" => array(
        "Entrenador" => array(
            "Zidane" => "img/zidane.jpg"
        ),
        "Jugadores" => array(
            "Courtois" => "img/courtois.jpg", "Sergio Ramos" => "img/ramos.jpg", "Hazard" => "img/hazard.jpg"
        )
    ),
    "Barcelona" => array(
        "Entrenador" => array(
            "Koeman" => "img/koeman.jpg"
        ),
        "Jugadores" => array(
            "Griezmann" => "img/griezmann.jpg", "Pique" => "img/pique.jpg", "Ter Stegen" => "img/ter_stegen.jpg"
        )
    )
);

if (isset($_POST["submit"])) {
    $equipoSeleccionado = $_POST["equipo"];
    $posicionSeleccionada = $_POST["posicion"];
}

function mostrarEquipo($liga, $equipo, $puesto)
{
    $informacionBuscada = null;
    foreach ($liga[$equipo][$puesto] as $jugador => $imagen) {
        $informacionBuscada .= "<h4>$jugador</h4> <img class='img-fluid' src='$imagen' />";
    }
    return $informacionBuscada;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

</head>

<body class="container">
    <form class="form-control" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <select class="form-group" name="equipo">
            <option value="Todos">-- Todos --</option>
            <?php foreach ($liga as $equipo => $plantilla) : ?>
                <option value="<?= $equipo ?>" <?= $selectedProp = (isset($equipoSeleccionado) &&
                                                    $equipoSeleccionado == $equipo) ? "selected" : ""; ?>><?= $equipo ?></option>
            <?php endforeach ?>
        </select>

        <?php foreach ($liga["Real Madrid"] as $posicion => $arrayJugadores) : ?>
            <div class="form-check">
                <label class="form-check-label" for="<?= $posicion ?>">
                    <input class="form-check-input" type="radio" id="<?= $posicion ?>" <?= $checkedProp = (isset($posicionSeleccionada) &&
                                                                                            $posicionSeleccionada == $posicion) ? "checked" : ""; ?> name="posicion" value="<?= $posicion ?>">
                    <?= $posicion ?></label>
            </div>
        <?php endforeach ?>

        <input class="btn btn-primary" type="submit" name="submit" value="Mostrar">
    </form>

    <?php if (isset($_POST["submit"])) : ?>
        <!-- CREAR TABLA -->
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- CREAR HEADER -->
                        <?php if ($equipoSeleccionado != "Todos") : ?>
                            <th scope="col">
                                <h2><?= $equipoSeleccionado ?></h2>
                            </th><!--  -->
                        <?php else : ?>
                            <th scope="col">
                                <h2>Real Madrid</h2>
                            </th>
                            <th scope="col">
                                <h2>Barcelona</h2>
                            </th>
                        <?php endif ?>
                    </tr>
                </thead>
                <!-- CREAR FILAS -->
                <!-- Si es un solo equipo -->
                <tbody>
                    <?php if ($equipoSeleccionado != "Todos") : ?>
                        <?php foreach ($liga[$equipoSeleccionado][$posicionSeleccionada] as $jugador => $url) : ?>
                            <tr>
                                <td>
                                    <h4><?= $jugador ?></h4><img class="img-fluid" src="<?= $url ?>">
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <!-- Si son todos los equipos -->
                            <?php foreach ($liga as $cadaEquipo => $value) : ?>

                                <td style='border: solid black 1px'>
                                    <?= mostrarEquipo($liga, $cadaEquipo, $posicionSeleccionada); ?>
                                </td>

                            <?php endforeach ?>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
</body>

</html>