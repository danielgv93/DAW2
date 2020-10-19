<!-- FILTRADO DE TEXTO EN INPUTS (SEGURIDAD) -->
<?php
function filtrado($texto)
{
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
} ?>

<!-- ACTION DE UN FORM -->
<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>

<!-- IFISSET COMPLETO CON SEGURIDAD -->
<?php if (isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] === "POST") ?>

<!-- CREAR UN SELECT CON MEMORIA -->
<?php foreach ($liga as $equipo => $plantilla) : ?>
    <option value="<?= $equipo ?>" <?= $selectedProp = (isset($equipoSeleccionado) &&
                                        $equipoSeleccionado == $equipo) ? "selected" : ""; ?>><?= $equipo ?></option>
<?php endforeach ?>

<!-- CREAR UN RADIO CON MEMORIA -->
<label for="<?= $posicion ?>">
    <input type="radio" id="<?= $posicion ?>" <?= $checkedProp = (isset($posicionSeleccionada) &&
                                                    $posicionSeleccionada == $posicion) ? "checked" : ""; ?> name="posicion" value="<?= $posicion ?>">
    <?= $posicion ?></label>