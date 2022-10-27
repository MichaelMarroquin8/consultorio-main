<?php
    class Documento extends Conectar{

        //Modelo para insertar los documentos del caso subidos
        public function insert_documento($tick_id,$doc_nom){
            $conectar= parent::conexion();
            /* consulta sql */
            $sql="INSERT INTO td_documento (doc_id,tick_id,doc_nom,fech_crea,est) VALUES (null,?,?,now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tick_id);
            $sql->bindParam(2,$doc_nom);
            $sql->execute();
        }

        //Modelo para visualizar los documentos subidos
        public function get_documento_x_ticket($tick_id){
            $conectar= parent::conexion();
            
            /* consulta sql */
            $sql="call sp_l_documento_01(?)";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tick_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(pdo::FETCH_ASSOC);
        }

        
        //Modelo para insertar los documentos detalle del caso subidos
        public function insert_documento_detalle($tickd_id,$det_nom){
            $conectar= parent::conexion();
            /* consulta sql */
            $sql="INSERT INTO td_documento_detalle (det_id,tickd_id,det_nom,est) VALUES (null,?,?,1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tickd_id);
            $sql->bindParam(2,$det_nom);
            $sql->execute();
        }
        
        //Modelo para visualizar los documentos subidos
        public function get_documento_detalle_x_ticketd($tickd_id){
            $conectar= parent::conexion();
            /* consulta sql */
            $sql="SELECT * FROM td_documento_detalle WHERE tickd_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$tickd_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(pdo::FETCH_ASSOC);
        }


        //Modelo para insertar los documentos del sisitema de gestion subidos
        public function insert_documento_usuario($empd_id,$docs_nom){
            $conectar= parent::conexion();
            /* consulta sql */
            $sql = "INSERT INTO td_documento_empresa (docs_id,empd_id,docs_nom,fech_crea,est) VALUES (NULL,?,?,now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$empd_id);
            $sql->bindParam(2,$docs_nom);
            $sql->execute();
        }

        //Modelo para visualizar los documentos sisitema de gestion subidos
        public function get_documentos_x_emp($empd_id){
            $conectar= parent::conexion();
            /* consulta sql */
            $sql="SELECT * FROM td_documento_empresa WHERE empd_id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1,$empd_id);
            $sql->execute();
            return $resultado = $sql->fetchAll(pdo::FETCH_ASSOC);
        }
    }
?>