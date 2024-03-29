<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
	if ($_SESSION["rol_id"] == 1) {
		header("Location:" . Conectar::ruta() . "view/Home/");
	}
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>CRL-SENA</>::Crear usuario</title>
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
						<h3>Empresas</h3>
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
												<button type="button" id="btnnuevo" class="btn btn-inline btn-primary">Nuevo Registro</button>
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