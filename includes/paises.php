<div class="input-group m-1 col-md-4">
    <label for="pais" class="form-label">País:</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-globe"></i></span>
        <select name="pais" id="pais" class="form-select" required>
            <?php
            $cmdPaises = "SELECT id, pais FROM paises;";
            $paises = mysqli_query($conn, $cmdPaises);
            echo "<option value='' disabled selected>Seleccionar país</option>";
            if (mysqli_num_rows($paises)) {
                while ($row = mysqli_fetch_array($paises)) {
                    $selected = (isset($pais_actual) && $row['pais'] == $pais_actual) ? 'selected' : '';
                    echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['pais'] . "</option>";
                }
            }
            ?>
        </select>
        <div class="valid-feedback">
            Seleccionado correctamente!
        </div>
    </div>
</div>
