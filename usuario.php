<?php
class Usuario {
    private $datos = [
        'id' => '',
        'username' => '',
        'email' => '',
        'nombres' => '',
        'apellidos' => '',
        'foto' => '',
        'rol_id' => ''
    ];

    public function __get($campo) {
        return $this->datos[$campo];
    }

    public function __set($campo, $valor) {
        $this->datos[$campo] = $valor;
    }

    public function buscarPorId(int $userid) {
        // conectar a la base de datos
        $cnn = new Conexion();
        // definir la consulta
        $sql = sprintf("select * from usuarios where id=%d",$userid);
        // ejecutar la consulta
        $rst = $cnn->query($sql);
        $cnn->close();
        // evaluar el resultado
        if (!$rst) { // if ($rst == false)
            die('Error al ejecutar la consulta MySQL');
        } elseif ($rst->num_rows == 1) { // mysqli_result
            // registro encontrado
            $r = $rst->fetch_assoc();
            $this->id = $userid;
            $this->username = $r['username'];
            $this->email = $r['email'];
            $this->nombres = $r['nombres'];
            $this->apellidos = $r['apellidos'];
            $this->foto = $r['foto'];
            $this->rol_id = $r['rol_id'];

            return true;
        } else {
            // registro no encontrado
            return false;
        }
    }

    public function nuevo() {}
    public function actualizar() {}
    public function eliminar() {}
    public function login() {}
    public function cambiarRol() {}
    
}