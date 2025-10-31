<select name="provincia" class="form-control" required>
    <?php
    $cmdDepartamentos = "SELECT id, provincia FROM provincias;";
    $departamentos = mysqli_query($conn, $cmdDepartamentos);
    if (mysqli_num_rows($departamentos)) {
        while ($row = mysqli_fetch_array($departamentos)) {
            $selected = (isset($departamento_actual) && $row['id'] == $departamento_actual) ? 'selected' : '';
            echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['provincia'] . "</option>";
        }
    }
    ?>
</select><br>
