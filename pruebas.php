<?php
require 'libs/conexion.php';
require 'models/usuario.php';

$username = 'bidkar';
$password = '123';

$usuario = Usuario::login($username, $password);

var_dump($usuario);