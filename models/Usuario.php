<?php
class Usuario extends Conectar
{

    //Modelo usuario para iniciar sesion
    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            $rol = $_POST["rol_id"];
            if (empty($correo) and empty($pass)) {
                header("Location:" . conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and rol_id=? and est=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $pass);
                $stmt->bindValue(3, $rol);
                $stmt->execute();
                $resultado = $stmt->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_ape"] = $resultado["usu_ape"];
                    $_SESSION["rol_id"] = $resultado["rol_id"];
                    $_SESSION["rols_id"] = $resultado["rols_id"];
                    if ($_SESSION["rol_id"] == 1) {
                        header("Location:" . Conectar::ruta() . "view/Home/");
                    } else {
                        header("Location:" . Conectar::ruta() . "view/Estadisticas/");
                    }
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }

    //Modelo usuario agregar/insertar usuario
    public function insert_usuario($usu_tid, $usu_cc, $usu_nom, $usu_ape, $usu_ficha, $usu_correo, $usu_pass, $rol_id, $rols_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_usuario (usu_id, usu_tid, usu_cc, usu_nom, usu_ape, usu_ficha, usu_correo, usu_pass, rol_id, rols_id, fech_crea, fech_modi, fech_elim, est) VALUES (NULL,?,?,?,?,?,?,?,?,?,now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_tid);
        $sql->bindValue(2, $usu_cc);
        $sql->bindValue(3, $usu_nom);
        $sql->bindValue(4, $usu_ape);
        $sql->bindValue(5, $usu_ficha);
        $sql->bindValue(6, $usu_correo);
        $sql->bindValue(7, $usu_pass);
        $sql->bindValue(8, $rol_id);
        $sql->bindValue(9, $rols_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario actualizar usuario
    public function update_usuario($usu_id, $usu_tid, $usu_cc, $usu_nom, $usu_ape, $usu_ficha, $usu_correo, $usu_pass, $rol_id, $rols_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_usuario set
                usu_tid = ?,
                usu_cc = ?,
                usu_nom = ?,
                usu_ape = ?,
                usu_ficha = ?,
                usu_correo = ?,
                usu_pass = ?,
                rol_id = ?,
                rols_id = ?
                WHERE
                usu_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_tid);
        $sql->bindValue(2, $usu_cc);
        $sql->bindValue(3, $usu_nom);
        $sql->bindValue(4, $usu_ape);
        $sql->bindValue(5, $usu_ficha);
        $sql->bindValue(6, $usu_correo);
        $sql->bindValue(7, $usu_pass);
        $sql->bindValue(8, $rol_id);
        $sql->bindValue(9, $rols_id);
        $sql->bindValue(10, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario eliminar usuario(se cambio el estado del usuario a 0)
    public function delete_usuario($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "call sp_d_usuario_01(?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario mostar todos los usuarios usuario
    public function get_usuario()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "call sp_l_usuario_01()";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario para mostrar usuarios con el rol de aprendiz(se utiliza para asignar aprendiz a un caso)
    public function get_usuario_x_rol()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_usuario where est=1 and rol_id=2 and rols_id=2";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario para mostar usuarios con el rol de empresa(se utiliza para asignar un usuario a las empresas)
    public function get_usuario_x_rol2()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_usuario where est=1 and rols_id=3";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    //Modelo usuario para mostar usuarios con el rol de instructores(se utiliza para recorrer los correos de los instructores y enviar email)
    public function get_usuario_x_rol3()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_usuario where est=1 and rol_id=2 and rols_id=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario 
    public function get_usuario_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "call sp_l_usuario_02(?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario muestra las estadisticas totales
    public function get_usuario_total_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario muestra las estadisticas totales de los casos abiertos
    public function get_usuario_totalabierto_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado=Abierto";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario muestra las estadisticas totales de los casos cerrados
    public function get_usuario_totalcerrado_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) as TOTAL FROM tm_ticket where usu_id = ? and tick_estado=Cerrado";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_usuario_grafico($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total
                FROM   tm_ticket  JOIN  
                    tm_categoria ON tm_ticket.cat_id = tm_categoria.cat_id  
                WHERE    
                tm_ticket.est = 1
                and tm_ticket.usu_id = ?
                GROUP BY 
                tm_categoria.cat_nom 
                ORDER BY total DESC";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo usuario actualizar contraseña de usuario
    public function update_usuario_pass($usu_id, $usu_pass)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_usuario
                SET
                    usu_pass = ?
                WHERE
                    usu_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_pass);
        $sql->bindValue(2, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
