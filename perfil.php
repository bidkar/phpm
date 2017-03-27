<?php
require 'conexion.php';
require 'usuario.php';
require 'roles.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:login.php');
} else {
    $usuario = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Perfil del usuario</title>
</head>
<body>
	<h1>Perfil del usuario</h1>
	<form>
		<input type="text" name="nombres" id="nombres" placeholder="Nombres" value="<?= $usuario->nombres; ?>">
		<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?= $usuario->apellidos ?>">
		<input type="text" name="foto" id="foto" placeholder="Foto" value="<?= $usuario->foto; ?>">
		<div>
			<select name="rol_id" id="rol_id">
				<?php
				$roles = Roles::getRoles();
				if (!$roles) {
					echo '<option>Sin roles</option>';
				} else {
					foreach ($roles as $key => $rol) {
						if ($usuario->rol_id == $rol->id) {
							echo sprintf('<option value="%s" selected>%s</option>',$rol->id,$rol->nombre);
						} else {
							echo sprintf('<option value="%s">%s</option>',$rol->id,$rol->nombre);
						}
					}
				} ?>
			</select>
		</div>
	</form>
</body>
</html>