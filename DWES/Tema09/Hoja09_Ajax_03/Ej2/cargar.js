$(document).ready(function () {
    $("#texto").click(function () {
        $("div").load("contenido.txt");
    })
    $("#php").click(function () {
        $("div").load("php.php");
    })
})