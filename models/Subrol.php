<?php
    class Subrol extends Conectar{

        public function get_subrol($rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_subrol WHERE rol_id=? AND est=1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $rol_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_subrols(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_subrol WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>