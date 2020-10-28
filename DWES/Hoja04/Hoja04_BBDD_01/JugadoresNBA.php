<?php
require_once "queriesBD.php";
if (isset($_POST["botonMostrar-Jugadores"]) || isset($_POST["botonMostrar-Traspaso"])) {
    $equipoSelected = $_POST["equipo"];
    $jugadoresEquipoSelected = getJugadoresDeEquipo($equipoSelected);
}
$nombreEquipos = getEquipos();


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

    <!-- FORMULARIO MOSTRAR JUGADORES -->
    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <h1>Jugadores de la NBA</h1>
        <div class="form-group">
            <label for="equipo">Equipo:
                <select class="form-control" name="equipo">
                    <?php foreach ($nombreEquipos as $equipo) : ?>
                        <option value="<?= $equipo ?>" <?= $selectedProp = (isset($equipoSelected) && $equipoSelected == $equipo) ? "selected" : ""; ?>>
                            <?= $equipo ?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>
        <input class=" btn btn-primary" type="submit" name="botonMostrar-Jugadores" value="Mostrar">
    </form>
    <!-- Crear tabla jugadores -->
    <?php if (isset($_POST["botonMostrar-Jugadores"])) : ?>
        <table class="table border mt-3">
            <tr>
                <th>Nombre</th>
                <th>Peso</th>
            </tr>
            <?php foreach ($jugadoresEquipoSelected as $jugador) : ?>
                <tr scope='row'>
                    <td><?= $jugador["nombre"] ?></td>
                    <td><?= $jugador["peso"] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>

    <!-- FORMULARIO TRASPASOS -->
    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <h1>Traspasos de jugadores</h1>
        <div class="form-group">
            <label for="equipo">Equipo:
                <select class="form-control" name="equipo">
                    <?php foreach ($nombreEquipos as $equipo) : ?>
                        <option value="<?php echo $equipo ?>" <?= $selectedProp = (isset($equipoSelected) && $equipoSelected == $equipo) ? "selected" : ""; ?>>
                            <?php echo $equipo ?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>
        <input class="btn btn-primary" type="submit" name="botonMostrar-Traspaso" value="Mostrar">
    </form>
    <!-- FORMULARIO BAJA Y ALTA DE JUGADORES -->
    <?php if (isset($_POST["botonMostrar-Traspaso"])) :
        $equipoSelected = $_POST["equipo"];
        $jugadoresEquipoSelected = getJugadoresDeEquipo($equipoSelected);
        $posicionesArray = getPosicion();
    ?>
        <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <h2>Baja y alta de jugadores</h2>
            <input type="hidden" name="equipoSeleccionado" value="<?= $equipoSelected ?>">
            <div class="form-group">
                <label for="jugadorBaja">Baja de jugador:
                    <select class="form-control" name="jugadorBaja">
                        <?php foreach ($jugadoresEquipoSelected as $jugador) : ?>
                            <option value="<?php echo $jugador["nombre"] ?>">
                                <?= $jugador["nombre"] ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>
            <h3>Datos del nuevo jugador</h3>
            <div class="form-group">
                <label for="nombreJugador">Nombre:</label>
                <input type="text" class="form-control" name="nombreJugador" required>
            </div>
            <div class="form-group">
                <label for="procedencia">Procedencia:</label>
                <input type="text" class="form-control" name="procedencia" required>
            </div>
            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="number" class="form-control" name="altura" min="1" step="any" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" class="form-control" name="peso" min="1" step="any" required>
            </div>
            <div class="form-group">
                <label for="posicion">Posicion:
                    <select class="form-control" name="posicion">
                        <?php foreach ($posicionesArray as $posicion) : ?>
                            <option value="<?= $posicion ?>">
                                <?= $posicion ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>
            <input class=" btn btn-primary" type="submit" name="botonTraspaso" value="Realizar traspaso">
        </form>
    <?php endif ?>
    <?php
    if (isset($_POST["botonTraspaso"])) {
        
        $equipoSelected = $_POST["equipoSeleccionado"];
        $jugadorBaja = $_POST["jugadorBaja"];
        $jugadorAlta = $_POST["nombreJugador"];
        $procedencia = $_POST["procedencia"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];
        $posicion = $_POST["posicion"];
        setTraspaso($jugadorBaja, $jugadorAlta, $procedencia, $altura, $peso, $posicion, $equipoSelected);
    }
    ?>
</body>

</html>