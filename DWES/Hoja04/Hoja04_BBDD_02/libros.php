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
<body>
<div class="container">
    <h1 class="text-center">INSERTE LOS DATOS DEL LIBRO</h1>

    <form class="row justify-content-center m-2" method="post" action="libros_guardar.php">
        <div class="form-group">
            <label for="titulo">Titulo:*</label>
                <input type="text"
                       class="form-control" name="titulo" id="titulo">
        </div>
        <div class="form-group">
            <label for="añoEdicion">Año de edicion:*</label>
                <input type="number"
                       class="form-control" id="añoEdicion" name="añoEdicion">
        </div>
        <div class="form-group">
            <label for="precio">Precio:*</label>
                <input type="number"
                       class="form-control" name="precio" id="precio" step="any">
        </div>
        <div class="form-group">
            <label for="fechaAdquisicion">Fecha de adquisición:*</label>
                <input type="text"
                       class="form-control" name="fechaAdquisicion" id="fechaAdquisicion"
                       placeholder="YYYY-MM-DD">
        </div>
        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar datos del libro">
    </form>
    <a href="libros_datos.php">
        <button class="btn btn-primary ">MOSTRAR DATOS DE LIBROS</button>
    </a>
    <a href="libros_borrar.php">
        <button class="btn btn-primary ">Borrar Libros</button>
    </a>
</div>
</body>
</html>