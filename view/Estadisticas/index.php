<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>CRL-SENA</>::Home</title>
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
						<h3>Estadisticas</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="mb-3">
								<div class="row">
									<div class="col-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="stats-icon purple">
															<i class="iconly-boldShow"></i>
														</div>
													</div>
													<div class="col-md-8">
														<h6 class="text-muted font-semibold">Total de Casos</h6>
														<div class="number" id="lbltotal"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="stats-icon blue">
															<i class="iconly-boldProfile"></i>
														</div>
													</div>
													<div class="col-md-8">
														<h6 class="text-muted font-semibold">Total de Casos Abiertos</h6>
														<div class="number" id="lbltotalabierto"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-4">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-4">
														<div class="stats-icon green">
															<i class="iconly-boldAdd-User"></i>
														</div>
													</div>
													<div class="col-md-8">
														<h6 class="text-muted font-semibold">Total de Casos Cerrados</h6>
														<div class="number" id="lbltotalcerrado"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="card">
											<div class="card-header">
												<h4>Casos</h4>
											</div>
											<div class="card-body">
												<div id="divgrafico" style="height: 250px;"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		<?php require_once("../MainJs/js.php"); ?>

		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script type="text/javascript" src="home.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>