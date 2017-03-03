<?php
require 'conexion.php';
require 'usuario.php';

$username = 'bidkar';
$password = '123';

$usuario = Usuario::login($username, $password);

var_dump($usuario);