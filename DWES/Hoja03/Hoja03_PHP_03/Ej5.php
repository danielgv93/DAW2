<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php

    /* NO HACE FALTA INICIALIZAR CADA VARIABLE, INTRODUCIR EL ARRAY COMPLETO
    $articulo1 = array("Codigo" => 1, "Descripcion" => "Arroz",
        "Existencias" => 9);
    $articulo2 = array("Codigo" => 5, "Descripcion" => "Detergente",
        "Existencias" => 2);
    $articulo3 = array("Codigo" => 15, "Descripcion" => "Ketchup",
        "Existencias" => 15);
    $articulo4 = array("Codigo" => 10, "Descripcion" => "Carne",
        "Existencias" => 20); */

    $arrayArticulos = array(
        array("Codigo" => 1, "Descripcion" => "Arroz", "Existencias" => 9),
        array("Codigo" => 5, "Descripcion" => "Detergente", "Existencias" => 32),
        array("Codigo" => 15, "Descripcion" => "Ketchup", "Existencias" => 15),
        array("Codigo" => 10, "Descripcion" => "Carne", "Existencias" => 20)
    );

    function mayorExistencias($arrayArticulos)
    {
        $maxExistencia = 0;
        foreach ($arrayArticulos as $articulo) {
            if ($articulo["Existencias"] > $maxExistencia) {
                $descripcion = $articulo["Descripcion"];
                $maxExistencia = $articulo["Existencias"];
            }
        }
        return $descripcion;
    }

    function sumarExistencias($arrayArticulos)
    {
        foreach ($arrayArticulos as $articulo) {
            $existencias = $articulo["Existencias"];
        }
        return $existencias;
    }

    function mostrarArray($arrayArticulos)
    {
        /* print "<h1>Tabla de Productos</h1>
            <table>";
        foreach ($arrayArticulos as $articulo) {
            foreach ($articulo as $key => $elemento) {
                print "<tr>
                            <td style='border: 1px solid black'>$key</td>
                            <td style='border: 1px solid black'>$elemento</td>
                        </tr>";
            }
            print "<br>";
        }
        print "</table>"; */
        for ($i = 0; $i < count($arrayArticulos); $i++) {
            print $arrayArticulos[$i]["Codigo"] . " " . $arrayArticulos[$i]["Descripcion"] . " " .
                $arrayArticulos[$i]["Existencias"] . "<br>";
        }
    }

    print mayorExistencias($arrayArticulos) . "<br>";
    print sumarExistencias($arrayArticulos) . "<br>";
    mostrarArray($arrayArticulos);

    ?>
</body>

</html>