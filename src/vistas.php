<?php
function pintarSelect($name, $options, $selected = "") {
    echo "<select name='$name' required>";
    echo "<option value=''>Seleccione...</option>";
    foreach ($options as $id => $valor) {
        $sel = ($id == $selected) ? "selected" : "";
        echo "<option value='$id' $sel>$valor</option>";
    }
    echo "</select>";
}

function pintarSelectSedes($name, $sedes, $selected = "") {
    echo "<select name='$name' required>";
    echo "<option value=''>Seleccione...</option>";
    foreach ($sedes as $id => $s) {
        $sel = ($id == $selected) ? "selected" : "";
        echo "<option value='$id' $sel>{$s['nombre']}</option>";
    }
    echo "</select>";
}

function mostrarErrores($errores) {
    if (!empty($errores)) {
        echo "<div style='color:red; margin-bottom:15px;'>";
        foreach ($errores as $e) {
            echo "<p>⚠️ $e</p>";
        }
        echo "</div>";
    }
}
