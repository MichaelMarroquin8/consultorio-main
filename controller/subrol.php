<?php
    require_once("../config/conexion.php");
    require_once("../models/Subrol.php");
    $subrol = new Subrol();
    $subrols = new Subrol();

    switch($_GET["op"]){
        case "combo":
            $datos = $subrol->get_subrol($_POST["rol_id"]);
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['rols_id']."'>".$row['rols_nom']."</option>";
                }
                echo $html;
            }
        break;

        case "combo1":
            $datos = $subrols->get_subrols();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['rols_id']."'>".$row['rols_nom']."</option>";
                }
                echo $html;
            }
        break;
    }
?>