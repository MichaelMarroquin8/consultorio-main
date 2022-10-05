<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
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
						<h3>DASHBOARD</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="mb-3">
								<div class="row">
									<div class="card">
										<div class="card-header">
											<h4>CONTROL DE RIESGOS LABORALES</h4>
										</div>
										<div class="card-body">
											<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<iframe src="../../public/videos/ANIMACION FINAL.mp4" style="width:100%" height="300" allowfullscreen></iframe>
													</div>
												</div>
											</div>
											<a class="btn btn-primary block"  href="../Estadisticas/">Ver estadisticas</a>
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

	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>