<body>
	<div class="container-fluid">
		<h1 class="py-2 px-5 text-light bg-danger">LOGO</h1>		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<h1 class="display-3">FACTURACION</h1>
		    </div>
			<div class="col-4"></div>
			<div class="col-3 m-auto">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="#">USUARIO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../index.php">VOLVER</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-4 mx-auto">
				<form class="form-group" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="exampleInputEmail2">DNI</label>
						<input type="text" name="buscar_dni" class="my-2 form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail2">CUIT</label>
						<input type="text" name="buscar_cuit" class="my-2 form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail2">RAZON SOCIAL</label>
						<input type="text" name="buscar_razon_social" class="my-2 form-control">
					</div>
					<div class="row w-75 mt-5 mx-auto">
						<button type="submit" class="mt-3 btn btn-primary btn-block">GENERAR FACTURA</button>
						<a href="../../clientes/index.php" class="mt-3 btn btn-primary btn-block">ALTA CLIENTE</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
	

