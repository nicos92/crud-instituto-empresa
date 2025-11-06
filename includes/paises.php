<div class="input-group m-1 col-md-4">
    <span class="input-group-text" id="inputGroupPrepend">País:</span>
    <select name="pais" id="pais" class="form-select" required>
        <?php
        $cmdPaises = "SELECT id, pais FROM paises;";
        $paises = mysqli_query($conn, $cmdPaises);
        if (mysqli_num_rows($paises)) {
            while ($row = mysqli_fetch_array($paises)) {
                $selected = (isset($pais_actual) && $row['pais'] == $pais_actual) ? 'selected' : '';
                echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['pais'] . "</option>";
            }
        }
        ?>
    </select>
    <div class="invalid-feedback">
        Please select a valid state.
    </div>
</div>
