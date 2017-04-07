<?php
require __DIR__ . "/../config.php";
require __DIR__ . "/../app/autoload.php";


$usuario = new MVC\Models\Usuario;
var_dump($usuario->buscarPorId(1));

print_r($_GET['url']);
