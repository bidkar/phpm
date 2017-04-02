<?php
// require __DIR__ . '/../app/mysql/conexion.php';
// require __DIR__ . '/../mvc/models/usuario.php';
require_once __DIR__ . "/../app/autoload.php";

$usuario = new MVC\Models\Usuario;
var_dump($usuario->buscarPorId(1));