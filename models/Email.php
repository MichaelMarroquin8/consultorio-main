<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/* llamada de las clases necesarias que se usaran en el envio del mail */


require_once("../config/conexion.php");
require_once("../models/Ticket.php");
require_once("../models/Usuario.php");

class Email extends PHPMailer{

    //variable que contiene el correo del destinatario
    protected $gCorreo = "cgts2018@senacgts.org";
    protected $gContrasena = 'cgts2018';
    //variable que contiene la contraseña del destinatario

    

    public function ticket_abierto($tick_id){
        $ticket = new Ticket();
        $Usuario = new Usuario();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $usua = $row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }   

        $correos = $Usuario->get_usuario_x_rol3();
        foreach ($correos as $ruw) {
            $correosinst=$ruw["usu_correo"];
            $this->addAddress($correosinst);
        }
        //IGual//
        // $this->IsSMTP();
        $this->SMTPDebug = 3;
        $this->Host = "localhost";
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->FromName = $this->tu_nombre = "Caso Abierto ".$id;
        $this->addAddress($correo);
        $this->CharSet = 'UTF-8';
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Caso abierto";
        //Igual//
        $cuerpo = file_get_contents('../public/email/NuevoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usu, $cuerpo);
        $cuerpo = str_replace("lblApeUsu", $usua, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Caso Abierto");
        return $this->Send();
    }

    public function ticket_cerrado($tick_id){
        $ticket = new Ticket();
        $Usuario = new Usuario();

        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usun = $row["usu_nom"];
            $usup = $row["usu_ape"];
            $usuas= $row["usu_asig"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];

            $apre = $Usuario->get_usuario_x_id($usuas);
            foreach ($apre as $ros){
                $usunombre=$ros["usu_nom"];
                $usuapellido=$ros["usu_ape"];
            }
        }

        //IGual//
       // $this->IsSMTP();
       $this->SMTPDebug = 3;
       $this->Host = "localhost";
       $this->SMTPAuth = true;
       $this->Username = $this->gCorreo;
       $this->Password = $this->gContrasena;
       $this->From = $this->gCorreo;
       $this->FromName = $this->tu_nombre = "Caso cerrado ".$id;
       $this->addAddress($correo);
       $this->CharSet = 'UTF-8';
       $this->WordWrap = 50;
       $this->IsHTML(true);
       $this->Subject = "Caso cerrado";
        //Igual//
        $cuerpo = file_get_contents('../public/email/CerradoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usun, $cuerpo);
        $cuerpo = str_replace("lblApeUsu", $usup, $cuerpo);
        $cuerpo = str_replace("lblNomUsua", $usunombre, $cuerpo);
        $cuerpo = str_replace("lblApeUsua", $usuapellido, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Caso Cerrado");
        return $this->Send();
    }

    public function ticket_asignado($tick_id){
        $ticket = new Ticket();
        $Usuario = new Usuario();

        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usuas= $row["usu_asig"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];

            $apre = $Usuario->get_usuario_x_id($usuas);
            foreach ($apre as $ros){
                $usun=$ros["usu_nom"];
                $usua=$ros["usu_ape"];
            }
        }

        

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.office365.com';//Aqui el server
        $this->Port = 587;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'tls';
        $this->FromName = $this->tu_nombre = "Caso Asignado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Caso Asignado";
        //Igual//
        $cuerpo = file_get_contents('../public/email/AsignarTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usun, $cuerpo);
        $cuerpo = str_replace("lblApeUsu", $usua, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Caso Asignado");
        return $this->Send();
    }

    public function crear_usuario($usu_correo){

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.office365.com';//Aqui el server
        $this->Port = 587;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'tls';
        $this->CharSet = 'UTF8';
        $this->addAddress($usu_correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Bienvenido";
        //Igual//
        $cuerpo = file_get_contents('../public/email/NuevoUsuario.html'); /* Ruta del template en formato HTML */
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Bienvenido al consultorio de riesgos laborales");
        return $this->Send();
    }

}
