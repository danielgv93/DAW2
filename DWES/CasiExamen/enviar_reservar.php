<?php
$parque = array(
    "guia" => array(
        "verano" => array("individual" => 5, "grupo" => 3),
        "invierno" => array("individual" => 4, "grupo" => 2)
    ),
    "aula" => array(
        "verano" => array("individual" => 25),
        "invierno" => array("individual" => 25)
    )
);

/* Comprobar el envio correcto del formulario */
if (
    isset($_POST["nombre"]) && isset($_POST["email"]) &&
    isset($_POST["fecha"]) && isset($_POST["personas"]) &&
    isset($_POST["edad"]) && $_SERVER['REQUEST_METHOD'] === "POST"
) {
    /* Creacion de variables del formulario */
    if (isset($_POST["visitaGuiada"])) {
        $visitaGuiada = $_POST["visitaGuiada"];
    }
    if (isset($_POST["aulaEducativa"])) {
        $aulaEducativa = $_POST["aulaEducativa"];
    }
    $nPersonas = $_POST["personas"];
    $tipoGrupo = "";
    if ($nPersonas > 1) {
        $tipoGrupo = "grupo";
    } else {
        $tipoGrupo = "individual";
    }
    $fecha = strtotime($_POST["fecha"]);
    $temporada = fechaVerano_Invierno($_POST["fecha"]);
    $edad = $_POST["edad"];
    if ($edad != "adulto") {
        $edad = 1;
    } else {
        $edad = 0;
    }

    /* Calculo de precio si es visita guiada */
    $precioGuia = 0;
    $precioAula = 0;
    if (isset($visitaGuiada)) {
        $precioGuia = $nPersonas * $parque["guia"][$temporada][$tipoGrupo];
    }
    /* Calculo de precio si es aula educativa */
    if (isset($_POST["aulaEducativa"])) {
        $checkPermitir = $edad;
        if ($edad == 0) {
            echo "Los adultos no pueden asistir al aula educativa<br>";
        }
        if ($nPersonas == 1) {
            echo "Solo pueden asistir en grupos de 2 o mas personas";
            $checkPermitir = 0;
        }
        $precioAula = $parque["aula"][$temporada]["individual"] * $checkPermitir;
    }
    /* Calculo del total */
    $precioTotal = $precioGuia + $precioAula;
}

function fechaVerano_Invierno($fecha)
{
    $mes = date("n", strtotime($fecha));
    if ($mes <= 9 && $mes >= 7) {
        return "verano";
    } else {
        return "invierno";
    }
}

function getMesNombre($fecha)
{
    return date("F", $fecha);
}
function getAño($fecha)
{
    return date("Y", $fecha);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>Reservas</h1>
    <?php if (
        isset($_POST["nombre"]) && isset($_POST["email"]) &&
        isset($_POST["fecha"]) && isset($_POST["personas"]) &&
        isset($_POST["edad"]) && $_SERVER['REQUEST_METHOD'] === "POST"
    ) : ?>
        <p>El precio de la reserva es <?= $precioTotal ?>€</p>

        <table class="reservas">
            <tr>
                <th colspan="7"><?= getMesNombre($fecha) ?> - <?= getAño($fecha) ?></th>
            </tr>
            <tr>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            <?php
            $diasSemanaArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            $mesTabla = getMesNombre($fecha);
            $añoTabla = getAño($fecha);
            $nDiasMes = cal_days_in_month(CAL_GREGORIAN, date("n", $fecha), $añoTabla);
            $diaDelMes = 1;
            ?>
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <tr>
                    <?php for ($j = 0; $j < 7; $j++) : ?>
                        <td>
                            <?php
                            $diaSemana = date("l", strtotime("$diaDelMes $mesTabla $añoTabla"));
                            if ($diasSemanaArray[$j] == $diaSemana) {
                                if ($diaDelMes <= $nDiasMes) {
                                    echo $diaDelMes;
                                    $diaDelMes++;
                                }
                            }
                            ?>
                        </td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </table>
    <?php else : ?>
        <p>No estan todos los datos introducidos</p>
    <?php endif ?>
    <hr>
    <a href="codigo_incompleto.php">VOLVER</a>
</body>

</html>