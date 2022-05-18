<body>
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
						<h1 class="display-3 py-2">FACTURACION</h1>
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
	<div class="container mt-5">
		<div class="row">
			<div class="caja1">
				<h1 class="text-light text-center mt-5"><a href="facturacion/index.php">FACTURAR</a></h1>
			</div>
			<div class="caja1">
				<h1 class="text-light text-center mt-5"><a id="btnEnlace" data-bs-toggle="modal" data-bs-target="#exampleModal">DEVOLUCION</a></h1><!-- href="devolucion/index.php" -->
			</div>
			<div class="caja1">
				<h1 class="text-light text-center mt-5"><a href="">COBROS</a></h1>
			</div>
			<div class="caja1">
				<h1 class="text-light text-center mt-5"><a href="">RETIRO</a></h1>
			</div>
		</div>
	</div>
	<div>
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">SE NECESITAN PERMISOS ESPECIALES</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
	    	  <div class="modal-body">
      			<div class="col-7 mx-auto">
      				<form id="formLogin">
					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Usuario</label>
					    <input type="text" class="form-control" id="userSistema">
					  </div>
					  <div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Password</label>
					    <input type="password" class="form-control" id="passSistema">
					  </div>
					
      			</div>
    		  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">VOLVER</button>
		        <button type="submit" id="btnModal" class="btn btn-primary">CONTINUAR</button>
		      </div>
		      </form>
    		</div>
 		 </div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/archivo1.js"></script>
