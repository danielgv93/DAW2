<?php
$marcas = array(
    "Seat" => array("Ibiza", "León", "Alhambra", "Arona", "Ateca", "Tarraco"),
    "Citroen" => array("C3", "C4", "C2", "Berlingo", "C1", "C5"),
    "Kia" => array("Sportage", "Picanto", "Rio", "Sorento", "Ceed", "Stonic")
);
/* Se crea la busqueda solo si se usa el boton de MOSTRAR */
if (isset($_POST["submit"])) {
    $busqueda = $_POST["marca"];
}
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
                <!-- PRIMER FORMULARIO: MARCA - COCHE -->
                <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="form-group">
                        <label for="marca">Marca: </label>
                        <select class="form-control" name="marca" id="marca">
                            <?php foreach ($marcas as $key => $value) : ?>
                                <option value='<?= $key ?>'> <?= $key ?> </option>";
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" name="submit" class="btn btn-primary mb-2" value="Mostrar">
                    </div>
                </form>

                <!-- SI EJECUTO MOSTRAR -->
                <?php
                if (isset($_POST["submit"])) : ?>
                    <div class="container border">
                        <div class="row justify-content-center">
                            <h2>COCHE</h2>
                        </div>
                        <div class="row justify-content-center">
                            <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                <?php
                                /* CREAR LOS INPUTS DE LOS MODELOS DE COCHE A PARTIR DEL ARRAY INICIAL*/
                                foreach ($marcas[$busqueda] as $item) : ?>  
                                    <div class='form-group'>
                                        <input type='text' name='<?= $item ?>' class='form-control' value='<?= $item ?>'>
                                    </div>
                                <?php endforeach; ?>
                                <button name="update" type="submit" class="btn btn-primary mb-2">Actualizar</button>
                            </form>
                        </div>
                    </div>

                <?php endif; ?>
                <!-- SI ACTUALIZO LOS INPUTS -->
                <?php
                if (isset($_POST["update"])) : ?>
                    <div class="container border">
                        <div class="row justify-content-center">
                            <h2>COCHE</h2>
                        </div>
                        <div class="row justify-content-center">
                            <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                <?php 
                                /* CREAR LOS INPUTS DE LOS MODELOS DE COCHE A PARTIR DEL $_POST  */
                                $i = 0;
                                foreach ($_POST as $item) : ?>
                                    <?php if (!empty($item)) : ?>
                                        
                                        <div class='form-group'>
                                            <input type='text' name='<?= $item ?>' class='form-control' value='<?= $item ?>'>
                                        </div>
                                    <?php 
                                    $marcas["Seat"][$i] = $item; /* CON ESTO NO SE CAMBIAN LOS VALORES DEL ARRAY */
                                    $i++;
                                    endif ?>
                                <?php endforeach; ?>

                                <input name="update" type="submit" class="btn btn-primary mb-2" value="Actualizar">
                            </form>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>