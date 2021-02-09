<?php

// RELLENAR TABLA INTERMEDIA CON ATTACH
$animal = array("especie"=>"leon", ".....");
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



// Actualizar con imagen
$animal = new Animal();
$animal->especie = $request->especie;
$animal->peso = $request->peso;
$animal->altura = $request->altura;
$animal->fechaNacimiento = $request->fechaNacimiento;
$animal->alimentacion = $request->alimentacion;
$animal->descripcion = $request->descripcion;
if ($request->imagen !== null) {
    $animal->imagen = $request->imagen->storeAs("img", $request->imagen->getClientOriginalName());
}
$animal->save();