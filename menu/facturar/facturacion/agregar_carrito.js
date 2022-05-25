let botonSend = document.getElementById("boton");
let campoCodigo = document.getElementById("cod_articulo");
let formulario = document.getElementById("formulario_carga_articulo");
let divNotificacion = document.getElementById("cajaNotificacion");

let contador = 0;
let idProducto = 0;
let totalCarro = 0;
let carrito = [];
let buscar = 0;

let carro = (totCarro)=>{
let indexVal;
	if (carrito.length === 0) {
		carrito.push(totCarro);
	}else if(carrito.length === 1){
		if (carrito[0].codigo === totCarro.codigo) {
			carrito[0].cantidad +=totCarro.cantidad;
		}else{
			carrito.push(totCarro);
		}
	}else if(carrito.length>1){
		for (var i = 0;i<carrito.length;i++) {
			if (carrito[i].codigo === totCarro.codigo) {
				indexVal = carrito.indexOf(carrito[i]);
				break; 
			}
		}
		if (indexVal>=0) {
			carrito[indexVal].cantidad+=totCarro.cantidad;	
		}else{
			carrito.push(totCarro);
		}
	}
}


function insertar(nuevoProd){
	let caja = document.getElementById("txtTabla");
	let nuevo = document.createElement("tr");
	caja.classList.add(`text-center`);
	++idProducto;
	nuevoProd.codigo = parseInt(nuevoProd.codigo);
	nuevoProd.cantidad = parseInt(prompt("ingresa la cantidad"));
	nuevoProd.precio = parseFloat(nuevoProd.precio).toFixed(2);
	let nuevaBusqueda = nuevoProd.buscar;
	let nuevoTotal = nuevoProd.factotal;
	nuevo.classList.add(`${idProducto}`);
	nuevo.innerHTML =`<td>${nuevoProd.codigo}</td>
					  <td>${nuevoProd.descripcion}</td>
					  <td id="h-${idProducto}">${nuevoProd.cantidad}</td>
					  <td>${nuevoProd.precio}</td>
					  <td>${nuevoProd.iva}</td>
					  <td><a id=${idProducto} class='${buscar}'><i class="fas fa-trash-alt"></i></a></td>`;
	caja.append(nuevo);
	eliminar(idProducto,nuevoProd);
	contador = (contador+nuevoProd.cantidad);
	let canasta = nuevoProd.cantidad*nuevoProd.precio;
	totalCarro = (totalCarro+parseFloat(canasta));
	updateDisplay(contador);
	updateTotal(totalCarro);
	nuevoProd.buscar = buscar;
	++buscar;
	carro(nuevoProd);
}

let updateDisplay = (val)=>document.getElementById("cantidadElementos").innerHTML = val;
let updateTotal = (val)=>document.getElementById("total").innerHTML = parseFloat(val.toFixed(2));

if (contador == 0 && totalCarro == 0 ) {
	updateDisplay(0);
	document.getElementById("total").innerHTML = 0;
}

let  eliminar =(id,nuevoProd)=>{
	let indexProd;
	let btnEliminar = document.getElementById(id);
	btnEliminar.addEventListener("click", function(){
		let cantidadFactura = document.getElementById(`h-${id}`);
		cantidadFactura = parseInt(cantidadFactura.innerText);
		btnEliminar.parentElement.parentElement.remove();
		for (var i =0;i<carrito.length;i++) {
			if (carrito[i].codigo === nuevoProd.codigo) {
				let resta = carrito[i].cantidad-cantidadFactura;
				if (resta>0) {
					carrito[i].cantidad -= cantidadFactura;
					break;
				}else if(resta === 0){
					carrito.splice(i,1);
					break;
				}
			}
		}
				
		contador = (contador-cantidadFactura);
		let canasta = cantidadFactura*nuevoProd.precio;
		totalCarro = (totalCarro-parseFloat(canasta));
		updateDisplay(contador);
		updateTotal(totalCarro);
	});
}

let notificacionError = ()=>{
	let divNuevo = document.createElement("div");
	divNuevo.classList.add("alert","alert-danger","alert-dismissible","fade","show");
	divNuevo.setAttribute("role","alert");
	divNuevo.innerHTML+="<i class='text-dark mr-2 fas fa-exclamation-circle'></i>";
	divNuevo.innerHTML+="<strong class='text-dark'>Debes ingresar un articulo valido</strong>";
	divNotificacion.append(divNuevo);
	setTimeout(function(){
	 divNuevo.remove();
	},900);
}

let notificacionCarrito = ()=>{
	let divNuevo = document.createElement("div");
	divNuevo.classList.add("alert","alert-danger","alert-dismissible","fade","show");
	divNuevo.setAttribute("role","alert");
	divNuevo.innerHTML+="<i class='text-dark mr-2 fas fa-exclamation-circle'></i>";
	divNuevo.innerHTML+="<strong class='text-dark'>El carrito esta vacio</strong>";
	divNotificacion.append(divNuevo);
	setTimeout(function(){
	 divNuevo.remove();
	},900);
}
	
let notificacionOk = ()=>{
	let divNuevo = document.createElement("div");
	divNuevo.classList.add("alert","alert-success","alert-dismissible","fade","show");
	divNuevo.setAttribute("role","alert");
	divNuevo.innerHTML+="<i class='text-dark mr-2 fas fa-shopping-basket'></i>";
	divNuevo.innerHTML+="<strong class='text-dark'>Articulo agregado correctamente</strong>";
	divNotificacion.append(divNuevo);
	setTimeout(function(){
	 divNuevo.remove();
	},900);
}

botonSend.addEventListener("click",function(e){
	e.preventDefault();
	if (campoCodigo.value== "" || campoCodigo.value== 0) {
		notificacionError();
	}else{
			let peticion = new XMLHttpRequest;
	peticion.open('POST', `index_insertar.php?codigo=${campoCodigo.value}`);
		peticion.onreadystatechange = function(){
			if (peticion.readyState == 4 && peticion.status == 200){
				let datos = peticion;
				datos = JSON.parse(datos.response);
				insertar(datos);
				notificacionOk();
			}
		}
		peticion.send();
		formulario.reset();
	}
});

