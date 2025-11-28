<?php
require_once "../src/datos.php";
require_once "../src/validaciones.php";
require_once "../src/vistas.php";

$errores = [];
$resumen = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = limpiarDato($_POST["nombre"]);
    $apellidos = limpiarDato($_POST["apellidos"]);
    $dni = limpiarDato($_POST["dni"]);
    $email = limpiarDato($_POST["email"]);
    $telefono = limpiarDato($_POST["telefono"]);
    $fecha_alta = $_POST["fecha_alta"];
    $provincia = $_POST["provincia"];
    $sede = $_POST["sede"];
    $departamento = $_POST["departamento"];

    // Validaciones
    if (!validarDni($dni)) $errores[] = "El DNI no tiene formato válido (8 números + letra).";
    if (!validarEmail($email)) $errores[] = "El correo electrónico no es válido.";
    if (!validarTelefono($telefono)) $errores[] = "El teléfono debe tener 9 dígitos.";
    if (!validarRelacionProvinciaSede($provincia, $sede, $sedes)) {
    $errores[] = "La provincia seleccionada no corresponde con la sede elegida.";
}


    if (empty($errores)) {
        $resumen = [
            "Nombre" => $nombre,
            "Apellidos" => $apellidos,
            "DNI" => $dni,
            "Email" => $email,
            "Teléfono" => $telefono,
            "Fecha de Alta" => $fecha_alta,
            "Provincia" => $provincias[$provincia],
            "Sede" => $sedes[$sede]["nombre"],
            "Departamento" => $departamentos[$departamento]
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Empleados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Alta de Empleados</h2>

    <?php mostrarErrores($errores); ?>

    <?php if ($resumen): ?>
        <div class="block">
            <h3 class="block-title">Resumen del alta</h3>
            <ul>
                <?php foreach ($resumen as $campo => $valor): ?>
                    <li><strong><?= $campo ?>:</strong> <?= $valor ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <form method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label>DNI:</label>
            <input type="text" name="dni" required placeholder="12345678A">

            <label>Email:</label>
            <input type="email" name="email" required placeholder="ejemplo@correo.com">

            <label>Teléfono:</label>
            <input type="text" name="telefono" required placeholder="9 dígitos">

            <label>Fecha de Alta:</label>
            <input type="date" name="fecha_alta" required>

            <label>Provincia:</label>
            <?php pintarSelect("provincia", $provincias); ?>

            <label>Sede:</label>
            <?php pintarSelectSedes("sede", $sedes); ?>

            <label>Departamento:</label>
            <?php pintarSelect("departamento", $departamentos); ?>

            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
