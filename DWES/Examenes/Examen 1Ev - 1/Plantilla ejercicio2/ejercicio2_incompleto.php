<?php

$libros=array(
    "Histórica y Aventuras" => array(
        array("titulo" => "Las legiones malditas", "imagen" => "legiones_malditas.jpg", "autor" => "Santiago Posteguillo"),
        array("titulo" => "Los pilares de la tierra", "imagen" => "pilares_tierra.jpg", "autor" => "Ken Follett"),
        array("titulo" => "La caída de los gigantes", "imagen" => "caida_gigantes.jpg", "autor" => "Ken Follett"),
        array("titulo" => "Africanus, el hijo del cónsul", "imagen" => "africanus.jpg", "autor" => "Santiago Posteguillo")
    ),
    "Narrativa" => array(
        array("titulo" => "Patria", "imagen" => "patria.jpg", "autor" => "Fernando Aramburu"),
        array("titulo" => "Dime quién soy", "imagen" => "dime_quien_soy.jpg", "autor" => "Julia Navarro"),
        array("titulo" => "Dispara, yo ya estoy muerto", "imagen" => "dispara_muerto.jpg", "autor" => "Julia Navarro")
    ),
    "Literatura contemporánea" => array(
        array("titulo" => "Cien años de soledad", "imagen" => "cien_anyos_soledad.jpg", "autor" => "Gabriel García Márquez"),
        array("titulo" => "Crónica de una muerte anunciada", "imagen" => "cronica_muerte.jpg", "autor" => "Gabriel García Márquez"),
        array("titulo" => "El amor en tiempos de cólera", "imagen" => "amor_tiempos_colera.jpg", "autor" => "Gabriel García Márquez")
    ),

);
$autores = getAutores($libros);

if (isset($_POST["buscar"])) {
    $autorSelected = $_POST["autor"];
}

function getAutores($libros)
{
    foreach ($libros as $genero => $coleccion) {
        foreach ($coleccion as $arrayLibros) {
            $autores[] = $arrayLibros["autor"];
        }
    }
    return array_unique($autores);
}

function crearSelectAutor($autores, $autorSelected)
{
    foreach ($autores as $autor) {
        $selectedProp = (isset($autorSelected) && $autorSelected == $autor) ? "selected" : "";
        echo '<option value="' . $autor . '"' . $selectedProp . '>' . $autor . '</option>';
    }
}

function busqueda($libros, $autorSelected)
{
    $contador = 0;
    if (isset($_POST["buscar"])) {
        foreach ($libros as $genero => $coleccion) {
            foreach ($coleccion as $arrayLibros) {
                if ($arrayLibros["autor"] == $autorSelected){
                    $contador++;
                }
            }
        }
    }
    return "$contador libros encontrados para el autor '$autorSelected'";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daniel Garcia Varela</title>
</head>
<body>
<h1>Libros por autores</h1>
<form action="#" method="post">
    <select name="autor">
        <?php crearSelectAutor($autores, $autorSelected) ?>
    </select>
    <br>
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php if (isset($_POST["buscar"])) :
    echo busqueda($libros, $autorSelected);
    ?>
    <table>
        <?php foreach ($libros as $genero => $coleccion) : ?>
            <?php foreach ($coleccion as $arrayLibros) : ?>
                <tr>
                    <?php if ($arrayLibros["autor"] == $autorSelected) : ?>
                        <td><img src="libros/<?= $arrayLibros["imagen"] ?>"></td>
                        <td><?= $arrayLibros["titulo"] ?></td>
                        <td><?= $arrayLibros["autor"] ?></td>
                        <td><?= $genero ?></td>
                    <?php endif ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
</body>
</html>