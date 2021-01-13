<?php
require_once "BaseDatos.php";
session_start();
if (isset($_SESSION["cliente"])) : ?>

    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mis Datos</title>
    </head>
    <body>
    <h1><?= $_SESSION["cliente"] ?></h1>

    <table>
        <?php
        $totalFurgoneta = 0;
        $totalTurismo = 0;
        foreach (BaseDatos::getInstance()->getVehiculosCliente($_SESSION["cliente"]) as $vehiculo) :
            if ($vehiculo instanceof Furgoneta) :
                $totalFurgoneta += $vehiculo->getPrecio()?>
                <tr>
                    <td>La furgoneta <?= $vehiculo ?> </td>
                </tr>
            <?php else :
                $totalTurismo += $vehiculo->getPrecio()?>
                <tr>
                    <td>El turismo <?= $vehiculo ?> </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <hr>
    <p>Se han gastado <?=$totalTurismo  ?>€ en turismos</p>
    <p>Se han gastado <?= $totalFurgoneta ?>€ en furgonetas</p>
    <hr>
    <a href="comprar.php"><button>Comprar TURISMO</button></a>
    <a href="logout.php"><button>Desconectar</button></a>
    </body>
    </html>

<?php else : ?>

    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ERROR</title>
    </head>
    <body>
    <h1>ERROR, PRIMERO TIENES QUE BUSCAR UNA MATRICULA</h1>
    </body>
    </html>
<?php endif; ?>