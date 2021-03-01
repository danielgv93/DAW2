<?php
class modelo {
    public function getAñosPermiso(): int
    {
        $fechaFormateada = Carbon::parse($this->fechaPermisoConducir);
        return $fechaFormateada->diffInYears(Carbon::now());

    }
}