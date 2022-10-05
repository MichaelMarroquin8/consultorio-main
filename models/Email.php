<?php
/* librerias necesarias para que el proyecto pueda enviar emails */
require('class.phpmailer.php');
include("class.smtp.php");

/* llamada de las clases necesarias que se usaran en el envio del mail */
require_once("../config/conexion.php");
require_once("../Models/Ticket.php");
require_once("../Models/Usuario.php");

class Email extends PHPMailer{

    //variable que contiene el correo del destinatario
    protected $gCorreo = 'michael_0902@hotmail.com';
    protected $gContrasena = '08022002Mm--';
    //variable que contiene la contraseña del destinatario

    public function ticket_abierto($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $usua = $row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
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
        $this->FromName = $this->tu_nombre = "Caso Abierto ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
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
                $usuna=$ros["usu_nom"];
                $usupa=$ros["usu_ape"];
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
        $this->FromName = $this->tu_nombre = "Caso Cerrado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Caso Cerrado";
        //Igual//
        $cuerpo = file_get_contents('../public/email/CerradoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $usun, $cuerpo);
        $cuerpo = str_replace("lblApeUsu", $usup, $cuerpo);
        $cuerpo = str_replace("lblNomUsua", $usuna, $cuerpo);
        $cuerpo = str_replace("lblApeUsua", $usupa, $cuerpo);
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

    public function crear_usuario($usu_correo,$usu_nombre){

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
        $cuerpo = str_replace("lblNomUsu", $usu_nombre, $cuerpo);
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Bienvenido al consultorio de riesgos laborales");
        return $this->Send();
    }

}
