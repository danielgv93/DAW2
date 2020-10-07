<?php

$listaPeliculas = array(
    "yourname", "1917", "joker", "elhoyo", "scarface",
    "jojorabbit", "fastandfurious", "elcamino", "elhobbit", "psicosis"
);
$imagenesPeliculas = array("img/yourname.jpg'", "img/1917.jpg", "img/joker.png", "img/elhoyo.jpg",
    "img/scarface.jpg", "img/jojorabbit.jpg", "img/fastandfurious.jpg", "img/elcamino.jpg",
    "img/elhobbit.jpg", "img/psicosis.jpg");

if (isset($_REQUEST["pelicula"])) {
    $busqueda = $_REQUEST["pelicula"];
    //  Sustituir el foreach por for para controlar la posicion 
    //  de las peliculas y enlazar las imagenes
    foreach ($listaPeliculas as $nombrePelicula) {
        if (strpos($nombrePelicula, $busqueda) === false) {
        } else {
            $resultado[] = $nombrePelicula;
        };
    }
}
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
            <div class="border mt-5">
        </form>
        <div class="border">
            
        </div>
    </div>
    
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>