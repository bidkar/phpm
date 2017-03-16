<?php
class Roles {
	protected $datos = [
		'id' => '',
		'nombre' => '',
		'descripcion' => ''
	];

	public function __get($campo) {
        return $this->datos[$campo];
    }

    public function __set($campo, $valor) {
        $this->datos[$campo] = $valor;
    }

	public static function getRoles() {
		$cnn = new Conexion();
		$sql = sprintf("select * from roles");

		$rst = $cnn->query($sql);
		if (!$rst) {
            die('Error al ejecutar la consulta MySQL');
        } elseif ($rst->num_rows >= 1) {
			$resultado = [];
            while ($r = $rst->fetch_assoc()) {
				$rol = new Roles();
				$rol->id = $r['id'];
				$rol->nombre = $r['nombre'];
				$rol->descripcion = $r['descripcion'];
				array_push($resultado, $rol);
			}

            return $resultado;
        } else {
            return false;
        }
	}
}