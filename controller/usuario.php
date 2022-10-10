<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    require_once("../models/Email.php");
    $email = new Email();

    switch($_GET["op"]){

        /* Controller para crear Usuario */
        case "guardaryeditar":
            if(empty($_POST["usu_id"])){       
                $usuario->insert_usuario($_POST["usu_tid"],$_POST["usu_cc"],$_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_ficha"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"],$_POST["rols_id"]);     
            }
            else {
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_tid"],$_POST["usu_cc"],$_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_ficha"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"],$_POST["rols_id"]);     
            }
        break;

        case "emailregistro":
            $email->crear_usuario($_POST["usu_correo"]);
        break;

        /* Controller para actualizar contraseña */
        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                if ($row["usu_tid"]=="1"){
                    $sub_array[] = '<span>CC</span>';
                }elseif ($row["usu_tid"]=="2"){
                    $sub_array[] = '<span>TI</span>';
                }elseif ($row["usu_tid"]=="3"){
                    $sub_array[] = '<span>CE</span>';
                }elseif ($row["usu_tid"]=="4"){
                    $sub_array[] = '<span>PEP</span>';
                }else{
                    $sub_array[] = '<span>N/a</span>';
                }
                $sub_array[] = $row["usu_cc"];
                $sub_array[] = $row["usu_nom"];
                $sub_array[] = $row["usu_ape"];
                $sub_array[] = $row["usu_ficha"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = $row["usu_pass"];

                if ($row["rols_id"]=="1"){
                    $sub_array[] = '<span class="badge bg-info">Instructor</span>';
                }elseif ($row["rols_id"]=="2"){
                    $sub_array[] = '<span class="badge bg-dark">Aprendiz</span>';
                }else{
                    $sub_array[] = '<span class="badge bg-success">Empresa</span>';
                }

                $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        /* Controller para Eliminar Usuario */
        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
        break;

        /* Controller para actualizar contraseña */
        case "mostrar";
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["usu_tid"] = $row["usu_tid"];
                    $output["usu_cc"] = $row["usu_cc"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["usu_ficha"] = $row["usu_ficha"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["rol_id"] = $row["rol_id"];
                    $output["rols_id"] = $row["rols_id"];
                }
                echo json_encode($output);
            }   
        break;

        /* Controller para actualizar contraseña */
        case "total";
            $datos=$usuario->get_usuario_total_x_id($_POST["usu_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        /* Controller para actualizar contraseña */
        case "totalabierto";
            $datos=$usuario->get_usuario_totalabierto_x_id($_POST["usu_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;
        
        /* Controller para actualizar contraseña */
        case "totalcerrado";
            $datos=$usuario->get_usuario_totalcerrado_x_id($_POST["usu_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        /* Controller para actualizar contraseña */
        case "grafico";
            $datos=$usuario->get_usuario_grafico($_POST["usu_id"]);  
            echo json_encode($datos);
        break;

        //controller usuario para mostrar usuarios con el rol de aprendiz(se utiliza para asignar aprendiz a un caso)
        case "combo";
            $datos = $usuario->get_usuario_x_rol();
            if(is_array($datos)==true and count($datos)>0){
                $html.= "<option label='Seleccionar'></option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['usu_id']."'>".$row['usu_cc']." - ".$row['usu_nom']." ".$row['usu_ape']."</option>";
                }
                echo $html;
            }
        break;

        //controller usuario para mostrar usuarios con el rol de empresa(se utiliza para asignar un usuario de empresa a una empresa)
        case "combo2";
            $datos = $usuario->get_usuario_x_rol2();
            if(is_array($datos)==true and count($datos)>0){
                $html.= "<option label='Seleccionar'></option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['usu_id']."'>".$row['usu_cc']." - ".$row['usu_nom']." ".$row['usu_ape']."</option>";
                }
                echo $html;
            }
        break;

        /* Controller para actualizar contraseña */
        case "password":
            $usuario->update_usuario_pass($_POST["usu_id"],$_POST["usu_pass"]);
        break;

    }
?>