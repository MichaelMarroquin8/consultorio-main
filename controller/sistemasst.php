<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo Categoria */
    require_once("../models/Sistemasst.php");
    $sistema = new Sistema();

    
    switch($_GET["op"]){


        case "get_sistemas_designacion";
            $datos = $sistema->get_sistemas_designacion();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_designacion":
            $sistema->update_sistemas_designacion($_POST["sis_descrip"]);
        break;

        case "get_sistemas_capacitacion";
            $datos = $sistema->get_sistemas_capacitacion();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_capacitacion":
            $sistema->update_sistemas_capacitacion($_POST["sis_descrip"]);
        break;

        case "get_sistemas_evaluacioni";
            $datos = $sistema->get_sistemas_evaluacioni();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_evaluacioni":
            $sistema->update_sistemas_evaluacioni($_POST["sis_descrip"]);
        break;

        case "get_sistemas_plana";
            $datos = $sistema->get_sistemas_plana();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_plana":
            $sistema->update_sistemas_plana($_POST["sis_descrip"]);
        break;

        case "get_sistemas_perfils";
            $datos = $sistema->get_sistemas_perfils();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_perfils":
            $sistema->update_sistemas_perfils($_POST["sis_descrip"]);
        break;

        case "get_sistemas_identificacion";
            $datos = $sistema->get_sistemas_identificacion();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_identificacion":
            $sistema->update_sistemas_identificacion($_POST["sis_descrip"]);
        break;

        case "get_sistemas_medidas";
            $datos = $sistema->get_sistemas_medidas();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas__medidas":
            $sistema->update_sistemas__medidas($_POST["sis_descrip"]);
        break;

        case "get_sistemas_evaluacionm";
            $datos = $sistema->get_sistemas_evaluacionm();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_evaluacionm":
            $sistema->update_sistemas_evaluacionm($_POST["sis_descrip"]);
        break;

        case "get_sistemas_investigacion";
            $datos = $sistema->get_sistemas_investigacion();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_investigacion":
            $sistema->update_sistemas_investigacion($_POST["sis_descrip"]);
        break;

        case "get_sistemas_auditoria";
            $datos = $sistema->get_sistemas_auditoria();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_auditoria":
            $sistema->update_sistemas_auditoria($_POST["sis_descrip"]);
        break;

        case "get_sistemas_seguimiento";
            $datos = $sistema->get_sistemas_seguimiento();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_seguimiento":
            $sistema->update_sistemas_seguimiento($_POST["sis_descrip"]);
        break;

        case "get_sistemas_revicion";
            $datos = $sistema->get_sistemas_revicion();
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_revicion":
            $sistema->update_sistemas_revicion($_POST["sis_descrip"]);
        break;

        case "get_sistemas_accion";
            $datos = $sistema->get_sistemas_accion();
            if (is_array($datos) == true and count($datos) > 0) 
            {
                foreach ($datos as $row) {
                    $output["sis_descrip"] = $row["sis_descrip"];
                }
                echo json_encode($output);
            }
        break;

        case "update_sistemas_accion":
            $sistema->update_sistemas_accion($_POST["sis_descrip"]);
        break;
            
    }
?>