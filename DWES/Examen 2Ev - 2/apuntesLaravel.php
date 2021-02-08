<?php

// RELLENAR TABLA INTERMEDIA CON ATTACH
$a = new Animal();
$a->especie = $animal["especie"];
$a->slug = Str::slug($animal["especie"]);
$a->peso = $animal["peso"];
$a->altura = $animal["altura"];
$a->fechaNacimiento = $animal["fechaNacimiento"];
$a->imagen = $animal["imagen"];
$a->alimentacion = $animal["alimentacion"];
$a->descripcion = $animal["descripcion"];
$a->save();
$a->cuidadores()->attach([
    Cuidador::all()->skip(0)->take(10)->random()->id,
    Cuidador::all()->skip(10)->take(10)->random()->id,
]);