<?php
$datos = array(
    "genero" => array("comedia", "drama", "accion", "suspense", "otras"),
    "edad" => array("TP", "mayores 7", "mayores 12", "mayores 18")
);
if (isset($_POST["enviar"]) && isset($_POST["titulo"]) && isset($_POST["actores"]) && isset($_POST["nTemporadas"]) &&
    isset($_POST["director"]) && isset($_POST["edad"])) {
    $titulo = $_POST["titulo"];
    $actores = $_POST["actores"];
    $directores = $_POST["director"];
    $nTemporadas = $_POST["nTemporadas"];
    $genero = $_POST["genero"];
    $edad = $_POST["edad"];
    $resumen = $_POST["resumen"];
    $imagen = $_POST["imagen"];
    $mostrarHTML =
        '<h3>$titulo</h3>
    <p>Actores: $actores</p>
    <p>Director: $directores</p>';

}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="titulo">Titulo:
        <input type="text" name="titulo">
    </label>
    <label for="titulo">Actores:
        <input type="text" name="actores">
    </label>
    <label for="titulo">Director:
        <input type="text" name="director">
    </label>
    <label for="titulo">Numero de temporadas:
        <input type="text" name="nTemporadas">
    </label>
    <label for="genero">Genero:
        <select name="genero">
            <?php foreach ($datos["genero"] as $genero) : ?>
                <option value="<?= $genero ?>"
                    <?= $propSelected = (isset($_POST["genero"]) && $_POST["genero"] == $genero) ? "selected" : "" ?>>
                    <?= $genero ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    Edad:
    <?php foreach ($datos["edad"] as $edad) : ?>
        <label for="<?= $edad ?>>"><?= $edad ?>
            <input type="radio" id="<?= $edad ?>" name="edad[]">
        </label>
    <?php endforeach; ?>

    <label for="titulo">Resumen:
        <textarea name="resumen"></textarea>
    </label>
    <label for="imagen">
        <input type="file" name="imagen">
    </label>
    <input type="submit" name="enviar" value="Mostrar">
</form>

</body>
</html>