<?php

function seleccionarProvincia($provincia_actual, $provincia){
    return $provincia_actual == $provincia ? " Selected " : "";
}
?>

<select name="provincia" class="form-control" required>
    <option value="">Seleccionar Provincia</option>
    <option value="Buenos Aires" <?php echo seleccionarProvincia($provincia_actual ?? " ", "Buenos Aires")?>>Buenos Aires</option>
    <option value="Córdoba" <?php echo seleccionarProvincia($provincia_actual ?? " ", "Córdoba") ?>>Córdoba</option>
    <option value="Santa Fé" <?php echo seleccionarProvincia($provincia_actual ?? " ", "Santa Fé") ?>>Santa Fé</option>
    <option value="Mendoza" <?php echo seleccionarProvincia($provincia_actual?? " ", "Mendoza") ?>>Mendoza</option>
</select><br />
