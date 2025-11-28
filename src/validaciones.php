<?php
function limpiarDato($dato) {
    return htmlspecialchars(trim($dato));
}

function validarDni($dni) {
    return preg_match("/^[0-9]{8}[A-Za-z]$/", $dni);
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarTelefono($telefono) {
    return preg_match("/^[0-9]{9}$/", $telefono);
}
function validarRelacionProvinciaSede($provinciaId, $sedeId, $sedes) {
    if (!isset($sedes[$sedeId])) {
        return false; // sede inexistente
    }
    // comprobar si la provincia está dentro del array de esa sede
    return in_array($provinciaId, $sedes[$sedeId]["provincia"]);
}
