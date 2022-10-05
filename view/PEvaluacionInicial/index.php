<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="../../public/vendors/toastify/toastify.css">
	<title>CRL-SENA</>::Evaluación inicial</title>
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
									<h3>Evaluación inicial</h3>
								</div>
								<div class="col-12 col-md-6 order-md-2 order-first">
									<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
											<li class="breadcrumb-item active" aria-current="page">Evaluación inicial</li>
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
												<h4 class="card-title">Formato de descarga Accion de mejoramiento</h4>
												<p class="card-text">
													A travez de aqui podras descargar los documentos los cuales debes diligenciar para completar este modulo.
												</p>
												<p class="card-text">
													Para proceder con la descarga oprime el boton DESCARGAR.
												</p>
												<a href="../../public/documents/documentos/" class="btn btn-primary block" download>DESCARGAR</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="card">
										<div class="card-content">
											<div class="card-body">
												<h4 class="card-title mb-0">Guia para subida de documentos</h4>
											</div>
											<div class="embed-responsive embed-responsive-item embed-responsive-16by9 w-100">
												<iframe src="https://www.youtube.com/embed/2b9txcAt4e0" style="width:100%" height="300" allowfullscreen></iframe>
											</div>
											<div class="card-body">
												<p class="card-text">
													Video de explicación para subida de documentos para cada empresa.
												</p>
												<a href="../../view/Documentos/" class="btn btn-primary block">DESCARGAR</a>
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

			<script type="text/javascript" src="documentos.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>