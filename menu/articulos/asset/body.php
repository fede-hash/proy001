<body>
	<header>
		<form name="alta_articulos" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="container-fluid">
				<div class="col-12">
				<h1 class="py-2 text-light px-5 bg-danger">LOGO</h1>	
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-4">
							<div class="jumbotron jumbotron-fluid">
								<div class="container">
									<h1 class="display-3">ARTICULOS</h1>
									<p class="lead">Alta de Articulos</p>
								</div>
							</div>
				    </div>
				    <div class="col-4"></div>
					<div class="col-3 m-auto">
				    			<ul class="nav">
				    				<li class="nav-item">
				    					<a class="nav-link" href="#">USUARIO</a>
				    				</li>
				    				<li class="nav-item">
				    					<a class="nav-link" href="../index.php">SALIR</a>
				    				</li>
				    			</ul>
				    </div>
		 		</div>
			</div>
			<div class="container">
	<div class="row">
		<div class="col-4">
			<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">CODIGO</span>
  			</div>
  			<input type="text" class="form-control" name="codigo_articulo" placeholder="ASIGNA CODIGO INTERNO DEL ARTICULO" aria-label="Username" aria-describedby="basic-addon1">
			</div>
		</div>
	<div class="col-4">
			<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">DESCRIPCION</span>
  			</div>
  			<input type="text" class="form-control" name="descripcion_articulo"placeholder="INGRESA DESCRIPCION DEL ARTICULO" aria-label="Username" aria-describedby="basic-addon1">
			</div>
	</div>
	<div class="col-4">
			<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">EAN</span>
  			</div>
  			<input type="text" class="form-control" name="codigo_ean" maxlength="13" placeholder="INGRESA CODIGO EAN" aria-label="Username" aria-describedby="basic-addon1">
			</div>
	</div>


	</div>
			</div>
<hr>
			<div class="container">
				<div class="row">
					<div class="col-4">
							<div class="jumbotron jumbotron-fluid">
								<div class="container">
									<h1 class="display-3">STOCK</h1>
									<p class="lead">Ingresa la cantidad de Articulos</p>
								</div>
							</div>
				    </div>
				</div>
			</div>
			<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<span class="input-group-text" id="basic-addon1">BULTOS</span>
	  			</div>
	  			<input type="text" class="form-control" name="bultos_articulo" placeholder="BULTOS/CAJA" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="col-3">
					<div class="input-group mb-3">
		  			<div class="input-group-prepend">
		    			<span class="input-group-text" id="basic-addon1">FACTOR</span>
		  			</div>
		  			<input type="text" class="form-control" name="unidades_articulo" placeholder="CANTIDAD DE UNIDADES POR BULTOS" aria-label="Username" aria-describedby="basic-addon1">
					</div>
			</div>
		</div>
			</div>
<hr>
			<div class="container">
				<div class="row">
					<div class="col-4">
							<div class="jumbotron jumbotron-fluid">
								<div class="container">
									<h1 class="display-3">PRECIO</h1>
									<p class="lead">Ingresa el precio del Articulo</p>
								</div>
							</div>
				    </div>
				</div>
			</div>
			<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<span class="input-group-text" id="basic-addon1">PRECIO</span>
	  			</div>
	  			<input type="text" class="form-control" name="precio_articulo" placeholder="PRECIO SIN IVA" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="col-3">
				<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<span class="input-group-text" id="basic-addon1">MARGEN</span>
	  			</div>
	  			<input type="text" class="form-control" name="margen_articulo" placeholder="INGRESA %" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>
			<div class="col-1"></div>
			
			<div class="col-2 mt-1 form-check">
  				<input class="form-check-input" type="radio" name="radio1" value="21" id="flexRadioDefault1">
 				 <label class="form-check-label" for="flexRadioDefault1">
  				 IVA 21 %
 				 </label>
			</div>
			<div class="col-auto"></div>
			<div class="col-2 mt-1 form-check">
  				<input class="form-check-input" type="radio" name="radio1" value="10,5" id="flexRadioDefault2">
 				<label class="form-check-label" for="flexRadioDefault2">
  				IVA 10.5 %
  				</label>
			</div>
		</div>
			</div>
			<div class="container">
				<div class="row my-5">
					<div class="col-4"></div>
						<button type="submit" class="col-4 btn btn-primary">ALTA</button>
				</div>
			</div>
		
			<div class="container">
				<div class="row">
					<div class="col-4"></div>
					<div class="col-4">
							<?php 
							if (!empty($error)) {
							echo "<div class='alert alert-danger' role='alert'>
						<strong>INFO</strong> COMPLETA TODOS LOS CAMPOS </div>";
							}
							if (!empty($iva)) {
							echo "<div class='alert alert-success' role='alert'>
						<strong>INFO</strong> NUEVO ARTICULO DADO DE ALTA </div>";
							}
							
						?>
					</div>
					</div>
				</div>
			</div>
		</form>
	</header>
</body>
	

