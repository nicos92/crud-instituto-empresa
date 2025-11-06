<div class="input-group m-1 col-md-4">
    <span class="input-group-text" id="inputGroupPrepend">Provincia:</span>
    <select name="provincia" id="provincia" class="form-select" required>
        <?php
        $cmdProvincias = "SELECT id, provincia FROM provincias;";
        $provincias = mysqli_query($conn, $cmdProvincias);
        if (mysqli_num_rows($provincias)) {
            while ($row = mysqli_fetch_array($provincias)) {
                $selected = (isset($provincia_actual) && $row['provincia'] == $provincia_actual) ? 'selected' : '';
                echo "<option value='" . $row['id'] . "' " . $selected . " >" . $row['provincia'] . "</option>";
            }
        }
        ?>
    </select>
</div>
