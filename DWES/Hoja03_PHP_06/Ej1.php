<?php
$marcas = array(
    array("marca" => "Seat", "modelos" => array("Ibiza", "León", "Alhambra", "Arona", "Ateca", "Tarraco")),
    array("marca" => "Citroen", "modelos" => array("C3", "C4", "C2", "Berlingo", "C1", "C5")),
    array("marca" => "Kia", "modelos" => array("Sportage", "Picanto", "Rio", "Sorento", "Ceed", "Stonic"))
);
?>



<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 1</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <div class="container">
        <div class="row border">
            <div class="col">
                <h1>Busca tu coche</h1>
                <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="form-group">
                        <label for="marca">Marca: </label>
                        <select class="form-control" name="marca" id="marca">
                            <?php
                            foreach ($marcas as $item) {
                                echo "<option value='" . $item["marca"] . "'>" .
                                    $item["marca"] . "</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-2" value="Mostrar">
                </form>

                <?php
                if (isset($_POST["submit"])) {
                    $marcaElegida = $_POST["marca"];//
                    echo '<div class="container border">
                        <div class="row">
                            <h2>COCHE</h1>
                        </div>
                        <div class="row">
                            <form class="form-check" action="" method="post">';
                        
                        foreach ($modelosElegidos as $item) {
                            echo "<div class='form-group'>";
                            echo "<input type='text' name='" . "$item[$marcaElegida]" . "' class='form-control' value='" . "$item[$marcaElegida]" . "'>";

                            echo "</div>";
                        }

                    echo '<button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                            </form>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>