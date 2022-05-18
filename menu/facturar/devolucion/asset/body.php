<body>
	<div class="container-fluid p-0">
		<div class="col-12">
			<h1 class="py-2 text-light px-5 bg-danger">LOGO</h1>	
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-3 py-2">DEVOLUCION</h1>
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
	<div class="container mt-5" id="cajaInput">
		<div class="row">
			<div class="col-auto">
		    	<label class="col-form-label">Ingresa el numero de Factura</label>
		  	</div>
			<div class="col-auto">
				<form class="form-group" id="formDevolucion">
					<input type="text" id="inputNum" class="form-control" placeholder="000-0000">	
			</div>
			<div class="col-auto">
				<button type="button" id="btnDevolucion" class="btn btn-success">Devolucion</button>
			</div>
			</form>
		</div>
	</div>
	<div class="container my-5 border rounded py-5" style="display: none;" id="cajaDevolucion">
		<div class="row justify-content-center">
			<div class="col-3 d-inline-block mx-auto"> 
				<div class="card">
					<div class="card-header">
						<p class="card-text fw-bold">Cliente</p>
					</div>
					<div class="card-body">
						<p class="card-text" id="idCliente"></p>
					</div>
				</div>	
			</div>
			<div class="col-3 d-inline-block mx-auto"> 
				<div class="card">
					<div class="card-header">
						<p class="card-text fw-bold">Dni/Cuit</p>
					</div>
					<div class="card-body">
						<p class="card-text" id="idDni"></p>
					</div>
				</div>	
			</div>
			<div class="col-3 d-inline-block mx-auto"> 
				<div class="card">
					<div class="card-header">
						<p class="card-text fw-bold">Iva</p>
					</div>
					<div class="card-body">
						<p class="card-text" id="idIva"></p>
					</div>
				</div>	
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-11 mx-auto d-block"> 
				<div class="card">
					<div class="card-header">
						<p class="card-text fw-bold">Ingresa los Articulos que se van a devolver</p>
					</div>
					<div class="card-body">
						<div>
							<form id="formDevII" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" id="inputDevol" placeholder="CODIGO">
								</div>
								<div class="col-auto">
								    <button type="button" class="btn btn-primary mb-3" id="btnDevol"><i class="fa-solid fa-circle-plus mx-2"></i>Agregar Articulo</button>
								</div>
							</form>
						</div>
						<div class="col-6 d-inline-block">
							<div class="card">
								<div class="card-body">
								    <h5 class="card-title">Total Articulos</h5> 
								    <p id="contador" class="card-text fs-2"><i class="fa-solid fa-basket-shopping mx-2"></i>0</p>
								</div>
							</div>
						</div>
						<div class="col-5 d-inline-block">
							<div class="card">
								<div class="card-body">
								    <h5 class="card-title">Total</h5>
								    <p id="totalNc" class="card-text fs-2"><i class="fa-solid fa-dollar-sign mx-2"></i>0.00</p>
								</div>
							</div>
						</div>
						<table class="table mt-3 text-center">
							<thead>
							    <tr>
							      <th scope="col">Codigo</th>
							      <th scope="col">Descripcion</th>
							      <th scope="col">Cantidad</th>
							      <th scope="col">Precio</th>
							      <th scope="col">Iva</th>
							      <th scope="col">Eliminar</th>
							    </tr>
							</thead>
							<tbody id="tbodyDevol"></tbody>
						</table>
						<div class="row justify-content-center align-items-center">
							<button type="button" class="btn btn-primary w-25" id="btnSendnc">Devolver</button>	
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>	
</body>
<script type="text/javascript" src="js/devolucion.js"></script>