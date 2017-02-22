<?php
require 'conexion.php';
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apache + PHP works!</title>
</head>
<body>
    <?php echo '<h1>Apache + PHP works!</h1>'; ?>
    <?php
    $usuario = new Usuario();
    $usuario->id = 1;
    $usuario->nombre = 'Bidkar';
    ?>
    <!-- table>thead>th*2^tbody>tr>td*2 -->
    <table>
        <thead>
            <th>User ID</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $usuario->id; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
            </tr>
        </tbody>
    </table>
    <div style="padding:50px; background-color:gray;">
        <form action="#">
            <label for="userid">ID de Usuario</label>
            <input type="text" name="userid" id="userid">
            <button type="submit">Buscar por ID</button>
        </form>
    </div>
    <?php
    if (isset($_GET['userid'])) {
        $id = $_GET['userid'];
        $resultado = $usuario->findById($id);
        var_dump($resultado);
        var_dump($usuario);
    }
    ?>
</body>
</html>