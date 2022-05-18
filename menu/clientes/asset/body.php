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
				<h1 class="text-center my-5">ALTA CLIENTE NUEVO</h1>
			</div>
<div class="container">
	<form name="formulario_client" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div class="col-6 mx-auto"> 
					<div class="input-group mb-3">
		  			<span class="input-group-text" id="basic-addon1">NOMBRE</span>
		  			<input type="text" class="form-control" name="nombre_cliente" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
		  			<span class="input-group-text" id="basic-addon1">APELLIDO</span>
		  			<input type="text" class="form-control" name="apellido_cliente" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				<div class="input-group mb-3">
		  		<div class="input-group-text">
		    		<input class="form-check-input" type="radio" name="input" value="DNI" aria-label="Radio button for following text input">
		  		</div>
		  		<input type="text" class="form-control" name="input_dni" placeholder="DNI" aria-label="Text input with radio button">
				</div>
				<div class="input-group mb-3">
		  		<div class="input-group-text">
		    		<input class="form-check-input" type="radio" name="input" value="CUIT" aria-label="Radio button for following text input">
		  		</div>
		  		<input type="text" class="form-control" name="input_cuit" placeholder="CUIT"  aria-label="Text input with radio button">
				</div>
					<div class="input-group mb-3">
		  		<div class="input-group-text">
		    		<input class="form-check-input" type="checkbox" value="RAZON_SOCIAL" name="input_razon_social" aria-label="Radio button for following text input">
		  		</div>
		  		<input type="text" class="form-control" placeholder="RAZON SOCIAL" name="razon_social_cliente"aria-label="Text input with radio button">
				</div>
				 
				<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">IVA</label>
  <select name="iva"class="form-select" id="inputGroupSelect01">
    <option selected>SELECCIONA LA CONDICION ANTE EL IVA</option>
    <option value="consumidor_final">CONSUMIDOR FINAL</option>
    <option value="monotributista">MONOTRIBUTISTA</option>
    <option value="responsable_inscripto">RESPONSABLE INSCRIPTO</option>
    <option value="exento">EXENTO</option>
  </select>
</div>

			<div class="input-group mb-3">
  			<span class="input-group-text" id="basic-addon1">DIRECCION</span>
  			<input type="text" class="form-control" name="domicilio_cliente" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
  			<span class="input-group-text" id="basic-addon1">LOCALIDAD</span>
  			<input type="text" class="form-control" name="localidad_cliente" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
  			<span class="input-group-text" id="basic-addon1">TELEFONO</span>
  			<input type="text" class="form-control" name="telefono_cliente" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
  			<span class="input-group-text" id="basic-addon1">EMAIL</span>
  			<input type="text" class="form-control" name="email_cliente" aria-label="Username" aria-describedby="basic-addon1">
			</div>
		
		</div>
		<div class="container mt-5 mb-3">
				<div class="row-cols-4">
			<button type="submit" class="mx-auto btn btn-primary d-block">ALTA CLIENTE</button>
		</div>
		<div class="row-cols-4 ">
			<a href="../index.php" class="mx-auto btn btn-primary mt-3 d-block">VOLVER</a>
		</div>
		</div>
	
		
	</form>
</div>

<div class="col-4 mx-auto text-center text-light">
	<?php if (!empty($error)){
		echo "<div class='mt-4 text-center alert alert-danger' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>COMPLETA TODOS LOS CAMPOS<i class='fas fa-ban mx-3'></i></h5></div>";
										}elseif (!empty($correcto)) {
		echo "<div class='mt-4 text-center alert alert-success' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>NUEVO CLIENTE<i class='fas fa-check mx-3'></i></h5></div>";
										}elseif (!empty($existe)) {
		echo "<div class='mt-4 text-center alert alert-primary' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>CLIENTE YA EXISTENTE<i class='fas fa-user mx-3'></i></h5></div>";
										}
										?>
</div>
</header>
</body>
	

