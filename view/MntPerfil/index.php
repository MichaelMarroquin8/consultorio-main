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
	<title>CRL-SENA</>::Mantenimiento SubCategoria</title>
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
						<h3>SubCategorias</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="col-12">
								<div class="row">
									<section class="section">
										<div class="card">
											<div class="card-header">
												SubCategoria
											</div>
											<div class="card-body">
												<div class="col-lg-6">
													<fieldset class="form-group">
														<label class="form-label semibold" for="exampleInput">Nueva Contraseña</label>
														<input type="password" class="form-control" id="txtpass" name="txtpass">
													</fieldset>
												</div>

												<div class="col-lg-6">
													<fieldset class="form-group">
														<label class="form-label semibold" for="exampleInput">Confirmar Contraseña</label>
														<input type="password" class="form-control" id="txtpassnew" name="txtpassnew">
													</fieldset>
												</div>

												<div class="col-lg-12">
													<button type="button" id="btnactualizar" class="btn btn-rounded btn-inline btn-primary">Actualizar</button>
												</div>
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
		<!-- Contenido -->
		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="mntperfil.js"></script>
	</body>
	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>