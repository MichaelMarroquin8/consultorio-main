<?php
    class Sistema extends Conectar{

        
         public function get_sistemas_designacion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=1 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_capacitacion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=2 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_evaluacioni(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=3 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_plana(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=4 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_perfils(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=5 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_identificacion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=6 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_medidas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=7 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_evaluacionm(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=8 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_investigacion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=9 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_auditoria(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=10 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_seguimiento(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=11 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_revicion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=12 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_sistemas_accion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_sistemasst WHERE sis_sst=13 and est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        
        public function update_sistemas_designacion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_capacitacion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=2";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_evaluacioni($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=3";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_plana($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=4";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_perfils($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=5";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_identificacion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=6";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas__medidas($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=7";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_evaluacionm($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=8";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_investigacion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=9";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_auditoria($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=10";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_seguimiento($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=11";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_revicion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=12";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_sistemas_accion($sis_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_sistemasst set sis_descrip=? where sis_sst=13";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sis_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        
    }
?>