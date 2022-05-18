<div class='container mt-5'> 
	<table class='table table-inverse'>
		<thead class='bg-dark text-light text-center'>
			<tr>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>DNI</th>
				<th>IVA</th>
				<th>ELIMINAR</th>
			</tr>
		</thead>
		<tbody class='bg-dark text-light text-center'>
			<tr>
				<td id="nombre"><?php echo $resultado['nombre']; ?></td>
				<td id="apellido"><?php echo $resultado['apellido']; ?></td>
				<td id="dni"><?php echo $resultado['dni']; ?></td>
				<td id="iva"><?php echo $cliente; ?></td>
				<td><a href='index.php'><i class='fas fa-trash-alt'></i></a></td>
			</tr>
		</tbody>
	</table>
	<hr>
</div>
<div class="container mt-5 mx-auto" id="cajaNotificacion"></div>
<div class="container">
	<div class="row">
		<div class="col-3 mx-auto">
			<form class="form-group" id="formulario_carga_articulo" method="post" action=''>
				<div class="form-group row">
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cod_articulo" name="cod_articulo" placeholder="INGRESA EL CODIGO DEL ARTICULO">
					</div>
				</div>
				<div class="form-group row">
					<div class="col mt-2">
						<button type="submit" name="boton" id="boton" class="btn btn-info mx-auto"><i class="fas fa-cart-plus"></i></button>
						<button type="submit" class="btn btn-primary mx-auto" id="boton_buscar"><i class="fas fa-search-plus"></i></button>
						<button type="button" class="btn btn-success" id="altaCobro"><i class="fas fa-cash-register"></i></button>
						<a class="btn btn-danger" id="boton_reload"><i class="fas fa-sync-alt"></i></a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-3 mx-auto">
			<div class="card text-center">
				<div class="card-body">
					<h5 class="card-title">TOTAL ARTICULOS</h5>
					<h5 class="text-center d-inline-block"><i class="fas fa-shopping-basket mr-1"></i></h5>
					<h5 class="card-text d-inline-block mr-3" id="cantidadElementos"></h5>
				</div>
			</div>
		</div>
		<div class="col-3 mx-auto">
			<div class="card text-center">
				<div class="card-body">
					<h5 class="card-title">TOTAL</h5>
					<h5 class="text-center d-inline-block"><i class="fas fa-dollar-sign mr-1"></i></h5>
					<h5 class="card-text d-inline-block mr-3" id="total"></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container w-50" id ="tabla_busqueda" class="tabla_busqueda"></div>
<div class="container-fluid">
	<div class="mt-5">
		<div class="card">
			<div class="card-body">
				<table id="tabla" class="table table-dark">
					<thead>
						<tr class="text-center">
							<th>COD</th>
							<th>DESCRIPCION</th>
							<th>CANTIDAD</th>
							<th>PRECIO</th>
							<th>IVA</th>
							<th>ELIMINAR</th>
						</tr>
					</thead>
					<tbody id="txtTabla"></tbody>	
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Cobro</h5>
   				<button type="button" class="btn close" data-dismiss="modal" aria-label="Close">x</button>
   			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<h4 class="text-dark">CLIENTE</h4>
				  			<p class="text-dark"><?php echo $resultado['nombre']." ".$resultado['apellido'];?></p>
						</div>
						<div class="col-3 dniCliente">
							<h4 class="text-dark">DNI</h4>
				  			<p class="text-dark"><?php echo $resultado['dni']; ?></p>
						</div>	
						<div class="col-3">
						   	<h4 class="text-dark">TOTAL</h4>
						   	<p class="d-inline-block"><i class="fas fa-dollar-sign mr-1"></i></p>
						   	<h5 class="text-dark d-inline-block" id="clienteTotal"></h5>	
						</div>
					</div>
				</div>
				<div class="pagoCliente mb-2">
					<h4 class="text-dark mb-3">SELECCIONA LA FORMA DE PAGO</h4>
				   	<select class="form-select" aria-label="Default select example">
						<option selected value="1">Efectivo</option>
					  	<option value="2">Tarjeta</option>
						<option value="3">QR</option>
						<option value="4">Otros Pagos</option>
					</select>
				</div> 
				<div class="container-fluid">
					<div class="row mb-3">
						<div class="col-7">
							<div class="input-group">
	  							<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
	  							<input type="text" class="form-control" placeholder="Ingresa el dinero" id="inputCobro">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
			    <button type="button" id="ingresarFactura" class="btn btn-primary">Cobrar<i class="fas fa-cash-register mx-2"></i></button>
			</div>
    	</div>
  	</div>
</div>

<script type="text/javascript" src="agregar_carrito.js"></script>
<script type="text/javascript" src="funciones.js"></script>
<script type="text/javascript" src="carrito.js"></script>
