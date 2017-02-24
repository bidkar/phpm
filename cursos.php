<?php
class Curso {
    private $datos = [
        'id' => '',
        'nombre' => '',
        'introduccion' => '',
        'fecha_inicio' => '',
        'fecha_fin' => '',
        'autor_id' => ''
    ];

    public function __get($campo) {
        return $this->datos[$campo];
    }

    public function __set($campo, $valor) {
        $this->datos[$campo] = $valor;
    }
}