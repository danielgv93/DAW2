<?php
$datos = [
    "especie" => "Oso",
    "altura" => 100,
    "peso" => 200,
    "fechaNacimiento" => "2000-05-05",
    "imagen" => "oso.jpg",
    "alimentacion" => "omnivoro",
    "descripcion" => "Lorem ipsum"
];

$url_servicio = "zoologico.laravel/rest/insertar";
$curl = curl_init($url_servicio);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $datos);
$response = curl_exec($curl);
$animales = json_decode($response);

var_dump($animales);