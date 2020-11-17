<?php
require_once "funcionesBaseDatosPDO.php";
$arrayLibros = getLibros();
$texto = "";
if (isset($_POST["borrar"]))
    if (borrarLibro($_POST["libro"])) {
        $texto = "El precio del libro borrado era ".getPrecio($_POST["libro"], $arrayLibros)."€<br>";
    }

function getPrecio($id, $arrayLibros)
{
    foreach ($arrayLibros as $libro) {
        if ($libro["id"] === $id) {
            return $libro["precio"];
        }
    }
}

;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<form action="#" method="post">
    <label for="libro">
        Libro:
    </label>
    <select class="form-option" name="libro" id="libro">
        <?php foreach (getLibros() as $libro) : ?>
            <option value="<?= $libro["id"] ?>"><?= $libro["titulo"] . " (" . $libro["anio"] . ")" ?></option>
        <?php endforeach; ?>
    </select>
    <hr>
    <input class="btn btn-primary" type="submit" name="borrar" value="Borrar">
</form>
<?= $texto ?>
<a href="libros.php">Volver</a>
</body>
</html>
