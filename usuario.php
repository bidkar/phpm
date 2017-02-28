<?php
class Usuario {
    private $datos = [
        'id' => '',
        'username' => '',
        'password' => '',
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
        $this->datos[$campo] = ($campo == 'password') ? md5($valor) : $valor;
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

    public function buscarPorUsername() {
        $cnn = new Conexion();
        $sql = sprintf("select username from usuarios where username = '%s'", $this->username);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error al ejecutar la consulta');
        } else {
            if ($rst->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function buscarPorEmail() {
        $cnn = new Conexion();
        $sql = sprintf("select username from usuarios where email = '%s'", $this->email);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error al ejecutar la consulta');
        } else {
            if ($rst->num_rows == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function nuevo() {
        $cnn = new Conexion();
        $sql = sprintf("insert into usuarios (username,password,email,nombres,apellidos,foto,rol_id) values ('%s','%s','%s','%s','%s','%s',%d)", $this->username, $this->password, $this->email, $this->nombres, $this->apellidos, $this->foto, $this->rol_id);

        $rst = $cnn->query($sql);
        if (!$rst) {
            die('Error en la ejecucion de la consulta');
        } else {
            $this->id = $cnn->insert_id;
            $cnn->close();

            return true;
        }
    }

    public function cambiarPerfil() {
        $cnn = new Conexion();
        $sql = sprintf("update usuarios set nombres='%s', apellidos='%s', foto='%s'", $this->nombres, $this->apellidos, $this->foto);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error en la ejecucion de la consulta');
        } else {
            return true;
        }
    }

    public function changePassword() {
        $cnn = new Conexion();
        $sql = sprintf("update usuarios set password='%s'", $this->password);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error en la ejecucion de la consulta');
        } else {
            return true;
        }
    }

    public function cambiarRol() {
        $cnn = new Conexion();
        $sql = sprintf("update usuarios set rol_id=%d", $this->rol_id);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error en la ejecucion de la consulta');
        } else {
            return true;
        }
    }

    public static function eliminar(int $id) {
        $cnn = new Conexion();
        $sql = sprintf("delete from usuarios where id=%d", $id);

        $rst = $cnn->query($sql);
        $cnn->close();
        if (!$rst) {
            die('Error en la ejecucion de la consulta');
        } else {
            return true;
        }
    }

    public function login() {}
    
}