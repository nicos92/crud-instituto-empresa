<div class="input-group m-1 col-md-4">
    <label for="departamento" class="form-label">Departamento:</label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-building"></i></span>
        <select name="departamento" id="departamento" class="form-select" required>
            <?php
            $cmdDepartamentos = "SELECT id, departamento FROM departamentos;";
            $departamentos = mysqli_query($conn, $cmdDepartamentos);
            echo "<option value='' disabled selected>Seleccionar departamento</option>";
            if (mysqli_num_rows($departamentos)) {
                while ($row = mysqli_fetch_array($departamentos)) {
                    $selected = (isset($departamento_actual) && $row['departamento'] == $departamento_actual) ? 'selected' : '';
                    echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['departamento'] . "</option>";
                }
            }
            ?>
        </select>
        <div class="valid-feedback">
            Seleccionado correctamente!
        </div>
    </div>
</div>
