<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Resultado</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body class="container mt-5">
    <section class="border">
        <div class="row justify-content-center">
            <h1>EL NUMERO <?php $_POST["numero"] ?> ES:</h1>
        </div>
        <div class="row justify-content-center ">
            <h1 class="text-danger font-weight-bold">
                <?php
                if (isset($_POST["numero"])) {
                    $numero = $_POST["numero"];
                    if ($numero % 2 == 0) {
                        print "PAR";
                    } else {
                        print "IMPAR";
                    }
                }
                ?></h1>
        </div>
        <div class="row justify-content-center">
            <a href="par.html"><button class="btn btn-primary mb-3">VOLVER</button></a>
        </div>
    </section>

</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>