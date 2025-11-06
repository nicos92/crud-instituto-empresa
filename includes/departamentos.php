<div class="input-group m-1 col-md-4">
    <span class="input-group-text" id="inputGroupPrepend">Departamento:</span>
    <select name="departamento" id="departamento" class="form-select" required>
        <?php
        $cmdDepartamentos = "SELECT id, departamento FROM departamentos;";
        $departamentos = mysqli_query($conn, $cmdDepartamentos);
        if (mysqli_num_rows($departamentos)) {
            while ($row = mysqli_fetch_array($departamentos)) {
                $selected = (isset($departamento_actual) && $row['departamento'] == $departamento_actual) ? 'selected' : '';
                echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['departamento'] . "</option>";
            }
        }
        ?>
    </select>
</div>
