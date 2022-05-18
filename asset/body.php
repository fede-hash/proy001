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
				<h1 class="text-center my-5">INGRESA</h1>
			</div>
		<div class="container">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
						<form method="post" name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<fieldset class="mb-3 form-group">
								<label class="mb-2" class="mb-2" for="formGroupExampleInput">USUARIO</label>
								<input name="usuario" type="text" class="form-control" id="formGroupExampleInput" placeholder="INGRESE USUARIO">
							</fieldset>
							<fieldset class="form-group">
								<label class="mb-2" for="formGroupExampleInput2">PASSWORD</label>
								<input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="INGRESE PASSWORD">
							</fieldset>
							<div class="container">
									<div class="row">
										<div class="col-12">
											<?php
											if (!empty($incompleto)) {
												echo "<div class='mt-4 alert alert-danger' role='alert'>INGRESA TODOS LOS DATOS</div>";
											}
											if (!empty($error)) {
												echo "<div class='mt-4 alert alert-danger' role='alert'>DATOS INCORRECTOS</div>";
											}
											if(!empty($login)){
												echo "<div class='mt-4 alert alert-success' role='alert'>BIENVENIDO - ".$usuario." </div>";
											}
											?>
										</div>
									</div>
							</div>
							<div class="container mt-3 mb-5">
								<div class="row">
									<div class="col-3"></div>
									<div class="col-6">
										<button type="submit" class="w-100 mt-3 btn btn-block btn-primary">INGRESAR</button>
									</div>
								</div>
								<div class="row">
									<div class="col-3"></div>
									<div class="col-6">
											<a href="nuevo-usuario/index.php" class="w-100 mt-3 btn btn-block btn-primary" >CAMBIAR PASSWORD</a>
									</div>
								</div>
									<div class="row">
									<div class="col-3"></div>
									<div class="col-6">
										<a href="nuevo-usuario/index.php" class="w-100 mt-3 btn btn-block btn-primary" >NUEVO USUARIO</a>
									</div>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</header>
</body>
	

