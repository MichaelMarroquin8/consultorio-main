<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>CRL-SENA</>::Mis Casos</title>
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
						<h3>Mis Casos</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="col-12">
								<div class="row">
									<section class="section">
										<div class="card">
											<div class="card-header">
												Listado de casos
											</div>
											<div class="card-body">
												<table class="table" id="ticket_data">
													<thead>
														<tr>
															<th style="width: 5%;">Nro.Ticket</th>
															<th class="d-none d-sm-table-cell" style="width: 10%;">empresa</th>
															<th style="width: 15%;">Categoria</th>
															<th class="d-none d-sm-table-cell" style="width: 40%;">Titulo</th>
															<th class="d-none d-sm-table-cell" style="width: 5%;">Estado</th>
															<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Creaci贸n</th>
															<th class="d-none d-sm-table-cell" style="width: 10%;">Fecha Asignaci贸n</th>
															<th class="d-none d-sm-table-cell" style="width: 10%;">Soporte</th>
															<th class="text-center" style="width: 5%;"></th>
														</tr>
													</thead>
													<tbody>

													</tbody>
												</table>
											</div>
										</div>

									</section>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		<?php require_once("modalasignar.php");?>
		<?php require_once("../MainJs/js.php"); ?>

		<script type="text/javascript" src="consultarcaso.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>