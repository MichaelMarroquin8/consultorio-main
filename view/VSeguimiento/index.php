<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
<?php
	/////////////ENLISTAR LOS FICHEROS EXISTENTES///////////////////////////////////////////////
	$listar = null;
	$directorio = opendir("../../public/documents/documentos/VSeguimiento/");

	while ($elemento = readdir($directorio)) {
		if ($elemento != '.' && $elemento != '..') {
			if (is_dir("../../public/documents/documentos/" . $elemento)) {
				$listar .= "<a class=' col-md-6 btn btn-primary block' href='../../public/documents/documentos/VSeguimiento/$elemento' target='_blank'> 
      $elemento/</a>
      <br><br>";
			} else {
				$listar .= "<a class=' col-md-6 btn btn-primary block' href='../../public/documents/documentos/VSeguimiento/$elemento' target='_blank'> 
      $elemento</a>
      <br><br>";
			}
		}
	}

		/////////////ENLISTAR LOS FICHEROS EXISTENTES///////////////////////////////////////////////
		$listarv = null;
		$directoriov = opendir("../../public/videos/VSeguimiento/");
	
		while ($elemento = readdir($directoriov)) {
			if ($elemento != '.' && $elemento != '..') {
				if (is_dir("../../public/documents/documentos/" . $elemento)) {
					$listarv .= "<a class=' col-md-6 btn btn-primary block' href='../../public/videos/VSeguimiento/$elemento' target='_blank'> 
		  $elemento/</a>
		  <br><br>";
				} else {
					$listarv .= "<a class=' col-md-6 btn btn-primary block' href='../../public/videos/VSeguimiento/$elemento' target='_blank'> 
		  $elemento</a>
		  <br><br>";
				}
			}
		}

	?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="../../public/vendors/toastify/toastify.css">
	<title>CRL-SENA</>::Seguimiento</title>
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
									<h3>Seguimiento de indicadores</h3>
								</div>
								<div class="col-12 col-md-6 order-md-2 order-first">
									<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
											<li class="breadcrumb-item active" aria-current="page">Seguimiento</li>
										</ol>
									</nav>
								</div>
							</div>
						</div>
						<section id="content-types">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="card">
										<div class="card-content">
											<img class="card-img-top img-fluid" src="../../public/images/samples/descarga.jpg" alt="Card image cap" style="height: 20rem">
											<div class="card-body">
												<h4 class="card-title">formato: Seguimiento de indicadores</h4>
												<p class="card-text">
												Espacio habilitado para acceder a documentos modelo y/o formatos que orientan frente a la implementaci&oacute;n y cumplimiento de este requisito.
												</p>
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
											<img class="card-img-top img-fluid" src="../../public/images/samples/descarga.jpg" alt="Card image cap" style="height: 20rem">
											<div class="card-body">
												<h4 class="card-title">guia o video: Seguimiento de indicadores</h4>
												<p class="card-text">
												En este apartado podr&aacute; acceder al video o gu&iacute;a que orientan frente a la elaboraci&oacute;n de los documentos o formatos propuestos.
												</p>
												<?php
												echo $listarv;
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>


			<?php require_once("../MainJs/js.php"); ?>

	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>