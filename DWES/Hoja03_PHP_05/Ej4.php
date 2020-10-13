<?php

$listadoPeliculas = array(
    array("titulo" => "your name", "img" => "img/yourname.jpg"),
    array("titulo" => "1917", "img" => "img/1917.jpg"),
    array("titulo" => "joker", "img" => "img/joker.png"),
    array("titulo" => "El hoyo", "img" => "img/elhoyo.jpg"),
    array("titulo" => "scarface", "img" => "img/scarface.jpg"),
    array("titulo" => "jojo rabit", "img" => "img/jojorabbit.jpg"),
    array("titulo" => "fast and furious", "img" => "img/fastandfurious.jpg"),
    array("titulo" => "el camino", "img" => "img/elcamino.jpg"),
    array("titulo" => "el hobbit", "img" => "img/elhobbit.jpg"),
    array("titulo" => "psicosis", "img" => "img/psicosis.jpg")
);
$resultado = array();
$busqueda = "";
if (isset($_POST["pelicula"])) {
    $busqueda = $_REQUEST["pelicula"];
    foreach ($listadoPeliculas as $pelicula) {
        if (strpos($pelicula["titulo"], $busqueda) !== false) {
            $resultado[] = $pelicula;
        }
    }
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 4</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <div class="container border rounded">
        <div class="row justify-content-center">
            <div class="col-4">
                <h2>Buscador de peliculas</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="pelicula">Buscador</label>
                        <input type="text" class="form-control" name="pelicula" id="pelicula" autofocus>
                    </div>
                    <button name="submit" type="submit" class=" btn btn-primary">Buscar</button>


                    <table class="table border mt-3">
                        <tbody>
                            <?php
                            foreach ($resultado as $pelicula) {
                                print("<tr scope='row'>
                                    <td><img class='img-fluid' src='" . $pelicula["img"] . "' alt='pelicula'></td>
                                    <td>" . $pelicula["titulo"] . "</td>
                                    </tr>");
                            }
                            ?>
                        </tbody>
                    </table>


                </form>
            </div>
        </div>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>