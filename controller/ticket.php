<?php
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket = new Ticket();

    require_once("../models/Usuario.php");
    $usuario = new Usuario();

    require_once("../models/Empresa.php");
    $empresa = new Empresa();

    require_once("../models/Documentos.php");
    $documento = new Documento();

    switch($_GET["op"]){

        case "insert":
            $datos=$ticket->insert_ticket($_POST["usu_id"],$_POST["emp_id"],$_POST["cat_id"],$_POST["cats_id"],$_POST["tick_titulo"],$_POST["tick_descrip"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach ($datos as $row){
                    $output["tick_id"] = $row["tick_id"];

                    if (empty($_FILES['files']['name'])){

                    }else{
                        $countfiles = count($_FILES['files']['name']);
                        $ruta = "../public/documents/document_caso/".$output["tick_id"]."/";
                        $files_arr = array();

                        if (!file_exists($ruta)) {
                            mkdir($ruta, 0777, true);
                        }

                        for ($index = 0; $index < $countfiles; $index++) {
                            $doc1 = $_FILES['files']['tmp_name'][$index];
                            $destino = $ruta.$_FILES['files']['name'][$index];

                            $documento->insert_documento( $output["tick_id"],$_FILES['files']['name'][$index]);

                            move_uploaded_file($doc1,$destino);
                        }
                    }
                }
            }
            echo json_encode($datos);
        break;

        case "update":
            $ticket->update_ticket($_POST["tick_id"]);
            $ticket->insert_ticketdetalle_cerrar($_POST["tick_id"],$_POST["usu_id"]);
        break;

        case "reabrir":
            $ticket->reabrir_ticket($_POST["tick_id"]);
            $ticket->insert_ticketdetalle_reabrir($_POST["tick_id"],$_POST["usu_id"]);
        break;

        case "asignar":
            $ticket->update_ticket_asignacion($_POST["tick_id"],$_POST["usu_asig"]);
        break;

        case "listar_x_asig":
            $datos=$ticket->listar_ticket_x_asig($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $datos2=$empresa->get_empresa_x_id($row["emp_id"]);
                foreach($datos2 as $row2){
                    $sub_array[] = '<span>'. $row2["emp_r_social"].'</span>';
                }
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];

                if ($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<span class="badge bg-success">Abierto</span>';
                }else{
                    $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="badge bg-danger">Cerrado</span></a>';
                }

                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="badge bg-secondary">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<span class="badge bg-warning">Sin Asignar</span>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        $sub_array[] = '<span class="badge bg-success">'. $row1["usu_nom"].'</span>';
                    }
                }

                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listar_x_usu":
            $datos=$ticket->listar_ticket_x_usu($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $datos2=$empresa->get_empresa_x_id($row["emp_id"]);
                foreach($datos2 as $row2){
                    $sub_array[] = '<span>'. $row2["emp_r_social"].'</span>';
                }
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];

                if ($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<span class="badge bg-success">Abierto</span>';
                }else{
                    $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="badge bg-danger">Cerrado</span></a>';
                }

                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="badge bg-secondary">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<span class="badge bg-warning">Sin Asignar</span>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        $sub_array[] = '<span class="badge bg-success">'. $row1["usu_nom"].'</span>';
                    }
                }

                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listar":
            $datos=$ticket->listar_ticket();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tick_id"];
                $datos2=$empresa->get_empresa_x_id($row["emp_id"]);
                foreach($datos2 as $row2){
                    $sub_array[] = '<span>'. $row2["emp_r_social"].'</span>';
                }
                $sub_array[] = $row["cat_nom"];

                $sub_array[] = $row["tick_titulo"];

                if ($row["tick_estado"]=="Abierto"){
                    $sub_array[] = '<span class="badge bg-success">Abierto</span>';
                }else{
                    $sub_array[] = '<a onClick="CambiarEstado('.$row["tick_id"].')"><span class="badge bg-danger">Cerrado</span><a>';
                }

                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));

                if($row["fech_asig"]==null){
                    $sub_array[] = '<span class="badge bg-secondary">Sin Asignar</span>';
                }else{
                    $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_asig"]));
                }

                if($row["usu_asig"]==null){
                    $sub_array[] = '<a onClick="asignar('.$row["tick_id"].');"><span class="badge bg-warning">Sin Asignar</span></a>';
                }else{
                    $datos1=$usuario->get_usuario_x_id($row["usu_asig"]);
                    foreach($datos1 as $row1){
                        $sub_array[] = '<span class="badge bg-success">'. $row1["usu_nom"].'</span>';
                    }
                }

                $sub_array[] = '<button type="button" onClick="ver('.$row["tick_id"].');"  id="'.$row["tick_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "listardetalle":
            $datos=$ticket->listar_ticketdetalle_x_ticket($_POST["tick_id"]);
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
                                                    <?php echo $row["tickd_descrip"];?>
                                                </p>

                                                <br>
                                                    <?php
                                                        $datos_det=$documento->get_documento_detalle_x_ticketd($row["tickd_id"]);
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
                                                                                    <td><?php echo $row_det["det_nom"]; ?></td>
                                                                                    <td>
                                                                                        <a href="../../public/documents/document_detalle/<?php echo $row_det["tickd_id"]; ?>/<?php echo $row_det["det_nom"]; ?>" target="_blank" class="badge bg-light-success">ver<i class="fa fa-eye"></i></a>
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

        case "mostrar";
            $datos=$ticket->listar_ticket_x_id($_POST["tick_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["tick_id"] = $row["tick_id"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["cat_id"] = $row["cat_id"];

                    $output["tick_titulo"] = $row["tick_titulo"];
                    $output["tick_descrip"] = $row["tick_descrip"];

                    if ($row["tick_estado"]=="Abierto"){
                        $output["tick_estado"] = '<span class="badge bg-success">Abierto</span>';
                    }else{
                        $output["tick_estado"] = '<span class="badge bg-danger">Cerrado</span>';
                    }

                    $output["tick_estado_texto"] = $row["tick_estado"];

                    $output["fech_crea"] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_ape"] = $row["usu_ape"];
                    $output["emp_r_social"] = $row["emp_r_social"];
                    $output["cat_nom"] = $row["cat_nom"];
                    $output["cats_nom"] = $row["cats_nom"];
                }
                echo json_encode($output);
            }   
        break;

        case "insertdetalle":
            $datos=$ticket->insert_ticketdetalle($_POST["tick_id"],$_POST["usu_id"],$_POST["tickd_descrip"]);
            
            if (is_array($datos)==true and count($datos)>0){
                foreach ($datos as $row){
                    /* TODO: Obtener tikd_id de $datos */
                    $output["tickd_id"] = $row["tickd_id"];
                    /* TODO: Consultamos si vienen archivos desde la vista */
                    if (empty($_FILES['files']['name'])){

                    }else{
                        /* TODO:Contar registros */
                        $countfiles = count($_FILES['files']['name']);
                        /* TODO:Ruta de los documentos */
                        $ruta = "../public/documents/document_detalle/".$output["tickd_id"]."/";
                        /* TODO: Array de archivos */
                        $files_arr = array();
                        /* TODO: Consultar si la ruta existe en caso no exista la creamos */
                        if (!file_exists($ruta)) {
                            mkdir($ruta, 0777, true);
                        }

                        /* TODO:recorrer todos los registros */
                        for ($index = 0; $index < $countfiles; $index++) {
                            $doc1 = $_FILES['files']['tmp_name'][$index];
                            $destino = $ruta.$_FILES['files']['name'][$index];

                            $documento->insert_documento_detalle( $output["tickd_id"],$_FILES['files']['name'][$index]);

                            move_uploaded_file($doc1,$destino);
                        }
                    }
                }
            }
            echo json_encode($datos);
        break;

        case "total";
            $datos=$ticket->get_ticket_total();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "totalabierto";
            $datos=$ticket->get_ticket_totalabierto();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "totalcerrado";
            $datos=$ticket->get_ticket_totalcerrado();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

        case "grafico";
            $datos=$ticket->get_ticket_grafico();  
            echo json_encode($datos);
        break;

    }
?>