<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body class="container">
    <h1>INSERTE LOS DATOS DEL LIBRO</h1>

    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="form-group">
            <label for="">Titulo:*</label>
            <input type="text"
                   class="form-control" name="titulo">
        </div>
        <div class="form-group">
            <label for="">Año de edicion:*</label>
            <input type="number"
                   class="form-control" name="añoEdicion">
        </div>
        <div class="form-group">
            <label for="">Precio:*</label>
            <input type="number"
                   class="form-control" name="precio" step="any">
        </div>
        <div class="form-group">
            <label for="">Fecha de adquisición:*</label>
            <input type="date"
                   class="form-control" name="fechaAdquisicion" step="any">
        </div>
        <button type="submit" class="btn btn-primary">Guardar datos del libro</button>
    </form>
</body>
</html>