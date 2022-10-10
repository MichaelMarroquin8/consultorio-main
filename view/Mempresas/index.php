<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<title>CRL-SENA</>::Empresas usuario</title>
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
						<h3>Mis empresas</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="col-12">
								<div class="row">
									<section class="section">
										<div class="card">
											<div class="card-header">
												Listado de empresas
											</div>
											<div class="card-body">
												<table class="table" id="empresa_data">
													<thead>
														<tr>
															<th style="width: 10%;">Usuario</th>
															<th style="width: 10%;">Nit</th>
															<th style="width: 20%;">Razon Social</th>
															<th class="d-none d-sm-table-cell" style="width: 10%;">No. Trabajadores</th>
															<th class="d-none d-sm-table-cell" style="width:  15%;">Representante legal</th>
															<th class="d-none d-sm-table-cell" style="width: 15%;">Actividad economica</th>
															<th class="text-center" style="width: 10%;">Nivel de riesgo</th>
															<th class="d-none d-sm-table-cell" style="width: 5%;">ARL</th>
															<th class="text-center" style="width: 5%;">Telefono</th>
															<th class="text-center" style="width: 5%;">Direccion</th>
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
		<?php require_once("modalmantenimiento.php");?>
		
		<?php require_once("../MainJs/js.php"); ?>

		<script type="text/javascript" src="mntempresa.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>