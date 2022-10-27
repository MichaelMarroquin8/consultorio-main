<?php
require_once("../config/conexion.php");

require_once("../models/Empresa.php");
$empresa = new Empresa();

require_once("../models/Usuario.php");
$usuario = new Usuario();

require_once("../models/Documento.php");
$documento = new Documento();

switch ($_GET["op"]) {

    /* Controller para crear Empresas */
    case "guardaryeditar":
            $empresa->insert_empresa($_POST["usu_id"],$_POST["emp_nit"],$_POST["emp_r_social"],$_POST["emp_n_trab"],$_POST["emp_re_legal"],$_POST["emp_acti_eco"],$_POST["emp_nriesgo"],$_POST["emp_arl"],$_POST["emp_tel"],$_POST["emp_dir"],$_POST["emp_cnom"],$_POST["emp_ccar"],$_POST["emp_ctel"],$_POST["emp_cemail"]);
    break;


    case "editar":
        $empresa->update_empresa($_POST["emp_id"],$_POST["emp_nit"],$_POST["emp_r_social"],$_POST["emp_n_trab"],$_POST["emp_re_legal"],$_POST["emp_acti_eco"],$_POST["emp_nriesgo"],$_POST["emp_arl"],$_POST["emp_tel"],$_POST["emp_dir"],$_POST["emp_cnom"],$_POST["emp_ccar"],$_POST["emp_ctel"],$_POST["emp_cemail"]);
    break;

    /* Controller para listar Empresas */
    case "listar":
        $datos = $empresa->get_empresa();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            if ($row["usu_id"] == null) {
                $sub_array[] = '<a><span class="badge bg-warning">Sin Asignar</span></a>';
            } else {
                $datos1 = $usuario->get_usuario_x_id($row["usu_id"]);
                foreach ($datos1 as $row1) {
                    $sub_array[] = '<span class="badge bg-success">' . $row1["usu_nom"] . '</span>';
                }
            }
            $sub_array[] = $row["emp_nit"];
            $sub_array[] = $row["emp_r_social"];
            $sub_array[] = $row["emp_n_trab"];
            $sub_array[] = $row["emp_re_legal"];
            $sub_array[] = $row["emp_acti_eco"];
            $sub_array[] = $row["emp_nriesgo"];
            $sub_array[] = $row["emp_arl"];
            $sub_array[] = $row["emp_tel"];
            $sub_array[] = $row["emp_dir"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["emp_id"] . ');"  id="' . $row["emp_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["emp_id"] . ');"  id="' . $row["emp_id"] . '" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case "listar_x_asig":
        $datos = $empresa->listar_empresa_x_asig($_POST["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            if ($row["usu_id"] == null) {
                $sub_array[] = '<a><span class="badge bg-warning">Sin Asignar</span></a>';
            } else {
                $datos1 = $usuario->get_usuario_x_id($row["usu_id"]);
                foreach ($datos1 as $row1) {
                    $sub_array[] = '<span class="badge bg-success">' . $row1["usu_nom"] . '</span>';
                }
            }
            $sub_array[] = $row["emp_nit"];
            $sub_array[] = $row["emp_r_social"];
            $sub_array[] = $row["emp_n_trab"];
            $sub_array[] = $row["emp_re_legal"];
            $sub_array[] = $row["emp_acti_eco"];
            $sub_array[] = $row["emp_nriesgo"];
            $sub_array[] = $row["emp_arl"];
            $sub_array[] = $row["emp_tel"];
            $sub_array[] = $row["emp_dir"];

            $sub_array[] = '<button type="button" onClick="ver(' . $row["emp_id"] . ');"  id="' . $row["emp_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

        /* Controller para Eliminar Empresas */
    case "eliminar":
        $empresa->delete_empresa($_POST["emp_id"]);
        break;

        /* Controller para actualizar contraseña */
    case "mostrar";
        $datos = $empresa->get_empresa_x_id($_POST["emp_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["usu_id"] = $row["usu_id"];
                $output["emp_nit"] = $row["emp_nit"];
                $output["emp_r_social"] = $row["emp_r_social"];
                $output["emp_n_trab"] = $row["emp_n_trab"];
                $output["emp_re_legal"] = $row["emp_re_legal"];
                $output["emp_acti_eco"] = $row["emp_acti_eco"];
                $output["emp_nriesgo"] = $row["emp_nriesgo"];
                $output["emp_arl"] = $row["emp_arl"];
                $output["emp_tel"] = $row["emp_tel"];
                $output["emp_dir"] = $row["emp_dir"];
                $output["emp_cnom"] = $row["emp_cnom"];
                $output["emp_ccar"] = $row["emp_ccar"];
                $output["emp_ctel"] = $row["emp_ctel"];
                $output["emp_cemail"] = $row["emp_cemail"];
                $output["usu_correo"] = $row["usu_correo"];
                $output["usu_nom"] = $row["usu_nom"];
                $output["usu_ape"] = $row["usu_ape"];
                $output["fech_crea"] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
            }
            echo json_encode($output);
        }
        break;

    
    case "insertdetalle":
        $datos = $empresa->insert_empresadetalle($_POST["emp_id"], $_POST["usu_id"],$_POST["tickd_descrip"]);

        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                /* TODO: Obtener tikd_id de $datos */
                $output["empd_id"] = $row["empd_id"];
                /* TODO: Consultamos si vienen archivos desde la vista */
                if (empty($_FILES['files']['name'])) {
                } else {
                    /* TODO:Contar registros */
                    $countfiles = count($_FILES['files']['name']);
                    /* TODO:Ruta de los documentos */
                    $ruta = "../public/documents/document_empresa/".$output["empd_id"]."/";
                    /* TODO: Array de archivos */
                    $files_arr = array();
                    /* TODO: Consultar si la ruta existe en caso no exista la creamos */
                    if (!file_exists($ruta)) {
                        mkdir($ruta, 0777, true);
                    }

                    /* TODO:recorrer todos los registros */
                    for ($index = 0; $index < $countfiles; $index++) {
                        $doc1 = $_FILES['files']['tmp_name'][$index];
                        $destino = $ruta . $_FILES['files']['name'][$index];

                        $documento->insert_documento_usuario($output["empd_id"], $_FILES['files']['name'][$index]);

                        move_uploaded_file($doc1, $destino);
                    }
                }
            }
        }
        echo json_encode($datos);
        break;

    case "listardetalle":
            $datos=$empresa->listar_empresadetalle_x_emp($_POST["emp_id"]);
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <?php echo date("d/m/Y", strtotime($row["fech_crea"]));?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user">
                                        <div class="activity-line-item-user-photo">
                                            <a href="#">
                                                <img src="../../public/images/<?php echo $row['rols_id'] ?>.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="activity-line-item-user-name"><?php echo $row['usu_nom'].' '.$row['usu_ape'];?></div>
                                        <div class="activity-line-item-user-status">
                                            <?php 
                                                if ($row['rols_id']==3){
                                                    echo 'Empresa';
                                                }elseif ($row['rols_id']==2){
                                                    echo 'Aprendiz';
                                                }else{
                                                    echo 'Instructor';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p>
                                                    <?php echo $row["empd_descrip"];?>
                                                </p>

                                                <br>
                                                    <?php
                                                        $datos_det=$documento->get_documentos_x_emp($row["empd_id"]);
                                                        if(is_array($datos_det)==true and count($datos_det)>0){
                                                            ?>
                                                                <p><strong>Documentos Adicionales</strong></p>
                                                                <p>
                                                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="width: 60%;"> Nombre</th>
                                                                            <th style="width: 40%;"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                            <?php
                                                                                foreach ($datos_det as $row_det){ 
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $row_det["docs_nom"]; ?></td>
                                                                                    <td>
                                                                                        <a href="../../public/documents/document_empresa/<?php echo $row_det["empd_id"]; ?>/<?php echo $row_det["docs_nom"]; ?>" target="_blank" class="badge bg-light-success">ver<i class="fa fa-eye"></i></a>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                    </tbody>
                                                                </table>

                                                                </p>
                                                            <?php
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </article>
                        <?php
                    }
                ?>
            <?php
        break;

    case "combo":
            $datos = $empresa->get_empresas($_POST["usu_id"]);
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['emp_id']."'>".$row['emp_r_social']."</option>";
                }
                echo $html;
            }
        break;      
}
