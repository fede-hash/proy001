<body>
	<header>
			<div class="container-fluid">
				<div class="col-12">
					<h1 class="py-2 text-light px-5 bg-danger">LOGO</h1>	
				</div>
			</div>
			<div class="mt-5 container">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
							<h1 class="text-center display-3">NOMBRE EMPRESA S.A</h1>
					</div>
	 		    </div>
			</div>
			<div class="container">
				<h1 class="text-center my-5">CREAR USUARIO NUEVO</h1>
			</div>
			<div class="container mb-5">
				<div class="row">
				<div class="col m-auto"></div>
				<div class="col-4">
						<form class="form-group" action="<?php echo ($_SERVER['PHP_SELF']); ?>" name="alta_usuario" method="POST">
							<fieldset class="form-group">
									<label for="formGroupExampleInput">NOMBRE</label>
									<input type="text" name="nombre" class="form-control" id="formGroupExampleInput" >
							</fieldset>
							<fieldset class="form-group">
									<label for="formGroupExampleInput2">APELLIDO</label>
									<input type="text" name="apellido" class="form-control" id="formGroupExampleInput2" >
							</fieldset>
							<fieldset class="form-group">
									<label for="formGroupExampleInput2">FECHA INGRESO</label>
									<input type="date" name="fecha_ingreso" class="form-control" id="formGroupExampleInput2" >
							</fieldset>
							<fieldset class="form-group">
									<label for="formGroupExampleInput2">USUARIO</label>
									<input type="text" name="usuario" class="form-control" id="formGroupExampleInput2" >
							</fieldset>
							<fieldset class="form-group">
									<label for="formGroupExampleInput2">PASSWORD</label>
									<input type="password" name="password" class="form-control" id="formGroupExampleInput2">
							</fieldset>
 							<div class="row">
								<div class="col-12 my-3">
									<h3 class="text-center">SELECCIONA LOS PERMISOS</h3>
								</div>
							</div>
							<div class="col-12">
									<div class="radio">
										<label>
											<input type="radio" name="radio1" id="gridRadios1" value="cajero" >
											CAJERO
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="radio1" id="gridRadios1" value="jefe_area" >
											JEFE DE AREA
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="radio1" id="gridRadios1" value="tesorero" >
											TESORERO
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="radio1" id="gridRadios1" value="sub_gerente" >
											SUB-GERENTE
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="radio1" id="gridRadios1" value="gerente" >
											GERENTE
										</label>
									</div>
							</div>
							<div class="row mt-4">
									<div class="col-2"></div>
									<div class="col">
										<input type="submit" class="btn btn-primary" value="CREAR">
									</div>
									<div class="col">
										<a class="btn btn-primary" href="../index.php">VOLVER</a>
									</div>
							</div>

							<div class="row">
									<div class="col-12">
										<?php if (!empty($error)){
											echo "<div class='mt-4 alert alert-danger' role='alert'>COMPLETA TODOS LOS CAMPOS</div>";
										}elseif (!empty($error_1)) {
											echo "<div class='mt-4 alert alert-danger' role='alert'>ESE USUARIO YA EXISTE</div>";
										}elseif (!empty($permisos)) {
											echo "<div class='mt-4 alert alert-danger' role='alert'>SELECIONA UNA CATEGORIA</div>";
										}elseif (!empty($tarea)) {
											echo "<div class='mt-4 alert alert-success' role='alert'>USUARIO CREADO</div>";
										}

										?>
									</div>
							</div>
						</form>
					</div>
				<div class="col m-auto"></div>
				</div>
			</div>
		</header>
</body>
	

