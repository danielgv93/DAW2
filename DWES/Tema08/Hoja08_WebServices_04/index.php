<?php
$url_servicio = "zoologico.laravel/rest";
$curl = curl_init($url_servicio);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$animales = json_decode($response);

var_dump($animales);