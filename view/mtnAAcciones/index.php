<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>

	<?php
	/////////////ENLISTAR LOS FICHEROS EXISTENTES///////////////////////////////////////////////
	$listar = null;
	$directorio = opendir("../../public/documents/documentos/AAcciones/");
	$borrarFor = null;

	while ($elemento = readdir($directorio)) {
		if ($elemento != '.' && $elemento != '..') {
			if (is_dir("../../public/documents/documentos/" . $elemento)) {
				$listar .= "<a class=' col-md-6 btn btn-primary block' href='../../public/documents/documentos/AAcciones/$elemento' target='_blank'> 
      $elemento/</a>
      <br><br>";
			} else {
				$listar .= "<a class=' col-md-6 btn btn-primary block' href='../../public/documents/documentos/AAcciones/$elemento' target='_blank'> 
      $elemento</a>
      <br><br>";
			}
		}
	}

	if ($_POST["subir"] == "Cargar archivo") {
		$folder = "../../public/documents/documentos/AAcciones/";
		move_uploaded_file($_FILES["formato"]["tmp_name"], "$folder" . $_FILES["formato"]["name"]);
		echo "
		<div class='alert alert-success'><p class='hidd' align=center>El video  " . $_FILES["formato"]["name"] . " se ha cargado correctamente.<a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
	}

	/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////

	$borrarFor = ($_POST['borrarFor']);
	if (isset($_POST['borrar'])) {
		@unlink('../../public/documents/documentos/AAcciones/' . $borrarFor);
		echo "
	  <div class='alert alert-danger'><p class='hidd' align=center>El archivo  " . $_FILES["formato"]["name"] . " ha sido eliminado correctamente. <a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
	}


	/////////////ENLISTAR LOS FICHEROS EXISTENTES///////////////////////////////////////////////
	$listarv = null;
	$directoriov = opendir("../../public/videos/AAcciones/");

	while ($elemento = readdir($directoriov)) {
		if ($elemento != '.' && $elemento != '..') {
			if (is_dir("../../public/documents/documentos/" . $elemento)) {
				$listarv .= "<a class=' col-md-6 btn btn-primary block' href='../../public/videos/AAcciones/$elemento' target='_blank'> 
		  $elemento/</a>
		  <br><br>";
			} else {
				$listarv .= "<a class=' col-md-6 btn btn-primary block' href='../../public/videos/AAcciones/$elemento' target='_blank'> 
		  $elemento</a>
		  <br><br>";
			}
		}
	}

	if ($_POST["subir"] == "Cargar video") {
		$folder = "../../public/videos/AAcciones/";
		move_uploaded_file($_FILES["formato"]["tmp_name"], "$folder" . $_FILES["formato"]["name"]);
		echo "
		  <div class='alert alert-success'><p class='hidd' align=center>El video  " . $_FILES["formato"]["name"] . " se ha cargado correctamente.<a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
	}

	/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////

	$borrarForv = ($_POST['borrarForv']);
	if (isset($_POST['borrarv'])) {
		@unlink('../../public/videos/AAcciones/' . $borrarForv);
		echo "
		  <div class='alert alert-danger'><p class='hidd' align=center>El archivo  " . $_FILES["formato"]["name"] . " ha sido eliminado correctamente. <a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
	}

	?>

	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="../../public/vendors/toastify/toastify.css">
	<title>CRL-SENA</>::Acción de mejoramiento</title>
	</head>

	<body>

		<div id="app">
			<div id="main" class="layout-horizontal">
				<header class="mb-5">
					<?php require_once("../MainHeader/header.php"); ?>


					<?php require_once("../MainNav/nav.php"); ?>
				</header>
				<div class="content-wrapper container">
					<div class="page-heading">
						<div class="page-title">
							<div class="row">
								<div class="col-12 col-md-6 order-md-1 order-last">
									<h3>Acción de mejoramiento</h3>
								</div>
								<div class="col-12 col-md-6 order-md-2 order-first">
									<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
											<li class="breadcrumb-item active" aria-current="page">Acción de mejoramiento</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>


						<section id="content-types">
							<section id="content-types">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<h4 class="card-title">Formato de descarga Accion de mejoramiento</h4>
													<form method="post" enctype="multipart/form-data" ">
													<div class="" style=" margin-top:2%; padding:3%; border-radius:20px;">
														<input class="form-control" type="file" name="formato" id="formato" style="margin-bottom:2%;">
														<input class="btn btn-success" type="submit" name="subir" value="Cargar archivo" style="width:100%;">

													</form>

													<form method="post">
														<div class="" style="margin-top:2%;  padding:3%; border-radius:20px;">
															<input class="form-control" name="borrarFor" size="50" placeholder=" Ejemplo: 1.Nombre_Del_Formato.xls" style="margin-bottom:2%;" />
															<input class="btn btn-danger" type="submit" name="borrar" value="Borrar formato" style="width:100%;">
															<div class="col-md-6" style="margin-top:1%;">
															</div>
														</div>
													</form>

												</div>
												<?php
												echo $listar;
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="card">
										<div class="card-content">
											<div class="card-body">
												<h4 class="card-title">Formato guia de descarga Accion de mejoramiento</h4>
												<form method="post" enctype="multipart/form-data" ">
													<div class="" style=" margin-top:2%; padding:3%; border-radius:20px;">
													<input class="form-control" type="file" name="formato" id="formato" style="margin-bottom:2%;">
													<input class="btn btn-success" type="submit" name="subir" value="Cargar video" style="width:100%;">

												</form>

												<form method="post">
													<div class="" style="margin-top:2%;  padding:3%; border-radius:20px;">
														<input class="form-control" name="borrarForv" size="50" placeholder=" Ejemplo: 1.Nombre_Del_Formato.xls" style="margin-bottom:2%;" />
														<input class="btn btn-danger" type="submit" name="borrarv" value="Borrar video" style="width:100%;">
														<div class="col-md-6" style="margin-top:1%;">
														</div>
													</div>
												</form>
											</div>
											<?php
											echo $listarv;
											?>
											<div class="col-lg-12">
												<fieldset class="form-group">
													<label class="form-label semibold" for="sis_descrip">Links</label>
													<textarea type="text" class="form-control" id="sis_descrip" name="sis_descrip" readonly></textarea>
												</fieldset>
											</div>
											<div class="col-lg-6">
												<button type="button" id="btneditar" class="btn btn-inline btn-primary">Editar</button>
											</div>
										</div>
									</div>
								</div>
							</section>
						</section>
					</div>
				</div>
			</div>
		</div>
		<?php require_once("modaleditar.php");?>
		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="sistemasst.js"></script>
	</body>
</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>