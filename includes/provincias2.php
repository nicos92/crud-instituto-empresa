<div class="input-group m-1 col-md-4">
    <label for="provincia" class="form-label">Provincia:</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost"></i></span>
        <select name="provincia" id="provincia" class="form-select" required>
            <?php
            $cmdProvincias = "SELECT id, provincia FROM provincias;";
            $provincias = mysqli_query($conn, $cmdProvincias);
            echo "<option value='' disabled selected>Seleccionar provincia</option>";
            if (mysqli_num_rows($provincias)) {
                while ($row = mysqli_fetch_array($provincias)) {
                    $selected = (isset($provincia_actual) && $row['provincia'] == $provincia_actual) ? 'selected' : '';
                    echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['provincia'] . "</option>";
                }
            }
            ?>
        </select>
        <div class="valid-feedback">
            Seleccionado correctamente!
        </div>
    </div>
</div>
