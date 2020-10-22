<?php
if (isset($_GET["nombre"])) {
    print_r($_GET);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo Formularios</title>
</head>

<body>
    <h1>Ejemplo de procesado de formularios</h1>
    <form action="" method="GET">
        Introduzca su nombre:<input type="text" name="nombre"><br/>
        Introduzca sus apellidos:<input type="text" name="apellidos"><br/>
        Edad:<input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>