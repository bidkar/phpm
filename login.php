<?php
require 'conexion.php';
require 'usuario.php';

$error = false;
if (isset($_POST['txtUsuario'])) {
    if (isset($_POST['txtPassword'])) {
        $user = $_POST['txtUsuario'];
        $passwd = $_POST['txtPassword'];

        $usuario = Usuario::login($user, $passwd);

        if (!$usuario) {
            // login incorrecto
            $error = true;
        } else {
            // login correcto
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <style>
    .error {
        color: red;
    }
    </style>
</head>
<body>
    <div class="error">
    <?= ($error) ? 'Usuario o contraseña incorrecta':'';  ?>
    </div>
    <form action="#" method="post">
        <label for="txtUsuario">Usuario:</label>
        <input type="text" name="txtUsuario" id="txtUsuario" required>
        <div class="divider"></div>
        <label for="txtPassword">Contraseña:</label>
        <input type="password" name="txtPassword" id="txtPassword">
        <div class="divider"></div>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>