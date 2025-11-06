<div class="input-group m-1 col-md-4">
    <label for="localidad" class="form-label">Localidad:</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-geo-alt"></i></span>
        <select name="localidad" id="localidad" class="form-select" required>
            <?php
            $cmdLocalidades = "SELECT id, localidad FROM localidades;";
            $localidades = mysqli_query($conn, $cmdLocalidades);
            echo "<option value='' disabled selected>Seleccionar localidad</option>";
            if (mysqli_num_rows($localidades)) {
                while ($row = mysqli_fetch_array($localidades)) {
                    $selected = (isset($localidad_actual) && $row['localidad'] == $localidad_actual) ? 'selected' : '';
                    echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['localidad'] . "</option>";
                }
            }
            ?>
        </select>
        <div class="valid-feedback">
            Seleccionado correctamente!
        </div>
    </div>
</div>
