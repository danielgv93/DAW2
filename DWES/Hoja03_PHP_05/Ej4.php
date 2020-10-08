<?php

$listaPeliculas = array(
    "your name", "1917", "joker", "el hoyo", "scarface",
    "jojo rabit", "fast and furious", "el camino", "gula", "psicosis"
);
$listaImagenes = array(
    "img/yourname.jpg", "img/1917.jpg", "img/joker.png", "img/elhoyo.jpg",
    "scarface.jpg", "img/jojorabit.jpg", "img/fastandfurious.jpg", "img/elcamino.jpg",
    "img/gula.jpg", "img/psicosis.jpg"
);

function posBusqueda($arrayPeliculas)
{
    $posBusqueda = array();
    if (isset($_REQUEST["pelicula"])) {
        $busqueda = $_REQUEST["pelicula"];

        for ($i = 0; $i < count($arrayPeliculas); $i++) {
            if (strpos($arrayPeliculas[$i], $busqueda) === false) {
            } else {
                $posBusqueda[] = $i;
            };
        }
        return $posBusqueda;
    }
}

function peliculasResultado($arrayPosiciones, $arrayPeliculas, $arrayImagenes)
{
    $resultado = array();
    for ($i = 0; $i < count($arrayPosiciones); $i++) {
        $aux = array($arrayPeliculas[$arrayPosiciones[$i]] => $arrayImagenes[$arrayPosiciones[$i]]);
        $resultado[] = $aux;
    }
    return $resultado;
}

$resultadoBusqueda = peliculasResultado(posBusqueda($listaPeliculas), $listaPeliculas, $listaImagenes);
print ($resultadoBusqueda[0][0]);
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 3</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <div class="container border rounded">
        <h2>Buscador de peliculas</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pelicula">Buscador</label>
                <input type="text" class="form-control" name="pelicula" id="pelicula" autofocus>
            </div>
            <button name="submit" type="submit" class=" btn btn-primary">Buscar</button>
            <table class="table">
                <tbody>
                    <?php
                    /* for ($i=0; $i < count($resultadoBusqueda); $i++) { 
                        print("<tr>");
                            print("<td><img class='img-fluid' src='".$resultadoBusqueda[$i][0]."'></td>");
                            print("<td>". $resultadoBusqueda[$i][1]."</td>");
                        print("</tr>");
                    } */
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>