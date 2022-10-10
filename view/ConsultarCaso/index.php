<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
	<!DOCTYPE html>
	<html>
	<?php require_once("../MainHead/head.php"); ?>
	<title>CRL-SENA</>::Nuevo caso</title>
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
						<h3>Nuevo Caso</h3>
					</div>
					<div class="page-content">
						<section class="row">
							<div class="mb-3">
								<div class="row">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Ingrese informacion de su caso</h4>
										</div>
										<div class="card-content">
											<div class="card-body">
												<form method="post" id="ticket_form">
													<div class="row">

														<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

														<div class="col-lg-6">
															<fieldset class="form-group">
																<label class="form-label semibold" for="exampleInput">Empresa</label>
																<select id="emp_id" name="emp_id" class="form-control" data-placeholder="Seleccionar">
																</select>
															</fieldset>
														</div>

														<div class="col-lg-6">
															<fieldset class="form-group">
																<label class="form-label semibold" for="tick_titulo">Titulo</label>
																<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Titulo">
															</fieldset>
														</div>

														<div class="col-lg-4">
															<fieldset class="form-group">
																<label class="form-label semibold" for="exampleInput">Categoria</label>
																<select id="cat_id" name="cat_id" class="form-control" data-placeholder="Seleccionar">

																</select>
															</fieldset>
														</div>

														<div class="col-lg-4">
															<fieldset class="form-group">
																<label class="form-label semibold" for="exampleInput">SubCategoria</label>
																<select id="cats_id" name="cats_id" class="form-control" data-placeholder="Seleccionar">
																	<option label="Seleccionar"></option>
																</select>
															</fieldset>
														</div>

														<div class="col-lg-4">
															<fieldset class="form-group">
																<label class="form-label semibold" for="exampleInput">Documentos Adicionales</label>
																<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
															</fieldset>
														</div>

														<div class="col-lg-12">
															<fieldset class="form-group">
																<label class="form-label semibold" for="tick_descrip">Descripci贸n</label>
																<div class="summernote-theme-1">
																	<textarea id="tick_descrip" name="tick_descrip" class="summernote" name="name"></textarea>
																</div>
															</fieldset>
														</div>
														<div class="col-lg-12">
															<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
														</div>
													</div>
												</form>
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

		<script type="text/javascript" src="nuevocaso.js"></script>
	</body>

	</html>
<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}
?>