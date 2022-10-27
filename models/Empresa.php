<?php
class Empresa extends Conectar
{

    //Modelo empresa para crear las empresas
    public function insert_empresa($usu_id, $emp_nit, $emp_r_social, $emp_n_trab, $emp_re_legal, $emp_acti_eco, $emp_nriesgo, $emp_arl, $emp_tel, $emp_dir, $emp_cnom, $emp_ccar, $emp_ctel, $emp_cemail)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_empresa (emp_id, usu_id, emp_nit, emp_r_social, emp_n_trab, emp_re_legal, emp_acti_eco, emp_nriesgo, emp_arl, emp_tel, emp_dir, emp_cnom, emp_ccar, emp_ctel, emp_cemail, fech_crea, fech_modi, fech_elim, est) VALUES (NULL, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->bindValue(2, $emp_nit);
        $sql->bindValue(3, $emp_r_social);
        $sql->bindValue(4, $emp_n_trab);
        $sql->bindValue(5, $emp_re_legal);
        $sql->bindValue(6, $emp_acti_eco);
        $sql->bindValue(7, $emp_nriesgo);
        $sql->bindValue(8, $emp_arl);
        $sql->bindValue(9, $emp_tel);
        $sql->bindValue(10, $emp_dir);
        $sql->bindValue(11, $emp_cnom);
        $sql->bindValue(12, $emp_ccar);
        $sql->bindValue(13, $emp_ctel);
        $sql->bindValue(14, $emp_cemail);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo empresa para actualizar las empresas
    public function update_empresa($emp_id, $emp_nit, $emp_r_social, $emp_n_trab, $emp_re_legal, $emp_acti_eco, $emp_nriesgo, $emp_arl, $emp_tel, $emp_dir, $emp_cnom, $emp_ccar, $emp_ctel, $emp_cemail)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_empresa set
                emp_nit = ?,
                emp_r_social = ?,
                emp_n_trab = ?,
                emp_re_legal = ?,
                emp_acti_eco = ?,
                emp_nriesgo = ?,
                emp_arl = ?,
                emp_tel = ?,
                emp_dir = ?,
                emp_cnom = ?,
                emp_ccar = ?,
                emp_ctel = ?,
                emp_cemail = ?
                WHERE
                emp_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emp_nit);
        $sql->bindValue(2, $emp_r_social);
        $sql->bindValue(3, $emp_n_trab);
        $sql->bindValue(4, $emp_re_legal);
        $sql->bindValue(5, $emp_acti_eco);
        $sql->bindValue(6, $emp_nriesgo);
        $sql->bindValue(7, $emp_arl);
        $sql->bindValue(8, $emp_tel);
        $sql->bindValue(9, $emp_dir);
        $sql->bindValue(10, $emp_cnom);
        $sql->bindValue(11, $emp_ccar);
        $sql->bindValue(12, $emp_ctel);
        $sql->bindValue(13, $emp_cemail);
        $sql->bindValue(14, $emp_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo empresa para visualizar todas las empresas
    public function get_empresa()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
            tm_empresa.emp_id,
            tm_empresa.usu_id,
            tm_empresa.emp_nit,
            tm_empresa.emp_r_social,
            tm_empresa.emp_n_trab,
            tm_empresa.emp_re_legal,
            tm_empresa.emp_acti_eco,
            tm_empresa.emp_nriesgo,
            tm_empresa.emp_arl,
            tm_empresa.emp_tel,
            tm_empresa.emp_dir,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape
            FROM 
            tm_empresa
            INNER join tm_usuario on tm_empresa.usu_id = tm_usuario.usu_id
            WHERE
            tm_empresa.est = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_empresas($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_empresa WHERE usu_id=? AND est=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_empresas_x_id($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_empresa WHERE usu_id=? AND est=1;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
   
    public function get_empresa_x_id($emp_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        tm_empresa.emp_id,
        tm_empresa.usu_id,
        tm_empresa.emp_nit,
        tm_empresa.emp_r_social,
        tm_empresa.emp_n_trab,
        tm_empresa.emp_re_legal,
        tm_empresa.emp_acti_eco,
        tm_empresa.emp_nriesgo,
        tm_empresa.emp_arl,
        tm_empresa.emp_tel,
        tm_empresa.emp_dir,
        tm_empresa.emp_cnom,
        tm_empresa.emp_ccar,
        tm_empresa.emp_ctel,
        tm_empresa.emp_cemail,
        tm_empresa.fech_crea,
        tm_usuario.usu_nom,
        tm_usuario.usu_ape,
        tm_usuario.usu_correo
        FROM 
        tm_empresa
        INNER join tm_usuario on tm_empresa.usu_id = tm_usuario.usu_id
        WHERE
        tm_empresa.est = 1
        AND tm_empresa.emp_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emp_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function listar_empresa_x_asig($usu_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        tm_empresa.emp_id,
        tm_empresa.usu_id,
        tm_empresa.emp_nit,
        tm_empresa.emp_r_social,
        tm_empresa.emp_n_trab,
        tm_empresa.emp_re_legal,
        tm_empresa.emp_acti_eco,
        tm_empresa.emp_nriesgo,
        tm_empresa.emp_arl,
        tm_empresa.emp_tel,
        tm_empresa.emp_dir,
        tm_usuario.usu_nom,
        tm_usuario.usu_ape
        FROM 
        tm_empresa
        INNER join tm_usuario on tm_empresa.usu_id = tm_usuario.usu_id
        WHERE
        tm_empresa.est = 1
        AND tm_empresa.usu_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    //Modelo empresa eliminar empresa(se cambio el estado del usuario a 0)
    public function delete_empresa($emp_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "call sp_d_empresa_01(?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emp_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_empresadetalle($emp_id, $usu_id, $empd_descrip)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO td_empresadetalle (empd_id,emp_id,usu_id,empd_descrip,fech_crea,est) VALUES (NULL,?,?,?,now(),'1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emp_id);
        $sql->bindValue(2, $usu_id);
        $sql->bindValue(3, $empd_descrip);
        $sql->execute();
        /* TODO: Devuelve el ultimo ID (Identty) ingresado */
        $sql1 = "select last_insert_id() as 'empd_id';";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $resultado = $sql1->fetchAll(pdo::FETCH_ASSOC);
    }

    public function listar_empresadetalle_x_emp($emp_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
            td_empresadetalle.empd_id,
            td_empresadetalle.empd_descrip,
            td_empresadetalle.fech_crea,
            tm_usuario.usu_nom,
            tm_usuario.usu_ape,
            tm_usuario.rol_id,
            tm_usuario.rols_id
            FROM 
            td_empresadetalle
            INNER join tm_usuario on td_empresadetalle.usu_id = tm_usuario.usu_id
            WHERE 
            emp_id =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $emp_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
