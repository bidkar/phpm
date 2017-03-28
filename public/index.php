<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location:../views/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Plataforma educativa CETis108</title>
</head>
<body>
	<h1>Plataforma educativa CETis108</h1>
	<a href="../views/login.php">Iniciar sesión</a>
</body>
</html>