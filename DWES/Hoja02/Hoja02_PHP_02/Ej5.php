<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        $temporal = "Juan";
        print ("$temporal -> ");
        print (gettype($temporal).("<br>"));
        $temporal = 3.14;
        print ("$temporal -> ");
        print (gettype($temporal).("<br>"));
        $temporal = false;
        print ("$temporal -> ");
        print (gettype($temporal).("<br>"));
        $temporal = 3;
        print ("$temporal -> ");
        print (gettype($temporal).("<br>"));
        $temporal = null;
        print ("$temporal -> ");
        print (gettype($temporal));
    ?>
</body>
</html>