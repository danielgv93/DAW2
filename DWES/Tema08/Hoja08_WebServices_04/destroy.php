<?php
$url_servicio = "zoologico.laravel/rest/elefante/borrar";
$curl = curl_init($url_servicio);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$animales = json_decode($response);

var_dump($animales);