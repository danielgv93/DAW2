<?php
require_once "queriesBD.php";
if (isset($_POST["equipo"])) {
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
</head>

<body>
    <h1>Jugadores de la NBA</h1>
    <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="equipo">Equipo:
            <select name="equipo">
                <?php while ($registro = $nombreEquipos->fetch()) : ?>
                    <option value="<?php echo $registro["nombre"] ?>"><?php echo $registro["nombre"] ?></option>
                <?php endwhile ?>
            </select>
        </label>

        <input type="submit" name="mostrar" value="Mostrar">
    </form>
    <table>
        <tr>
            <th>Nombre</th>
        </tr>
        <?php if ($jugadoresEquipoSelected->execute()) : ?>

            <?php while ($fila = $consulta->fetch()) : ?>
                <tr>
                    <td><?php ?></td>
                </tr>
                $datos[] = array("valor1" => $fila['valor1'], "valor2" => $fila['valor2']);

            <?php endwhile ?>
        <?php endif ?>
    </table>
</body>

</html>