let botonSend = document.getElementById("boton");
let campoCodigo = document.getElementById("cod_articulo");
let formulario = document.getElementById("formulario_carga_articulo");
let divNotificacion = document.getElementById("cajaNotificacion");

let contador = 0;
let idProducto = 0;
let totalCarro = 0;
let carrito = [];
let buscar = 0;

function insertar(nuevoProd){
let caja = document.getElementById("txtTabla");
let nuevo = document.createElement("tr");
caja.classList.add(`text-center`);
++idProducto;
nuevoProd.codigo = parseInt(nuevoProd.codigo);
nuevoProd.cantidad = prompt("ingresa la cantidad");
nuevoProd.precio = parseFloat(nuevoProd.precio).toFixed(2);
let nuevaBusqueda = nuevoProd.buscar;
let nuevoTotal = nuevoProd.factotal;
nuevo.classList.add(`${idProducto}`);
nuevo.innerHTML =`<td>${nuevoProd.codigo}</td>
				  <td>${nuevoProd.descripcion}</td>
				  <td>${nuevoProd.cantidad}</td>
				  <td>${nuevoProd.precio}</td>
				  <td>${nuevoProd.iva}</td>
				  <td><a id=${idProducto} class='${buscar}'><i class="fas fa-trash-alt"></i></a></td>`;
caja.append(nuevo);
eliminar(idProducto,nuevoProd);
contador = parseInt(contador)+parseInt(nuevoProd.cantidad);
let canasta = nuevoProd.cantidad*nuevoProd.precio;
totalCarro = (totalCarro+parseFloat(canasta));
updateDisplay(contador);
updateTotal(totalCarro);
nuevoProd.buscar = buscar;
++buscar;
carrito.push(nuevoProd);
}

let ajusteCarrito = (nuevoProd)=>{
	let indicador = carrito.indexOf(nuevoProd);
	carrito.splice(indicador, 1);
}

let updateDisplay = (val)=>document.getElementById("cantidadElementos").innerHTML = val;
let updateTotal = (val)=>document.getElementById("total").innerHTML = parseFloat(val.toFixed(2));

if (contador == 0 && totalCarro == 0 ) {
	updateDisplay(0);
	document.getElementById("total").innerHTML = 0;
}

let  eliminar =(id,nuevoProd)=>{
	let btnEliminar = document.getElementById(id);
	btnEliminar.addEventListener("click", function(){
	btnEliminar.parentElement.parentElement.remove();
	contador = parseInt(contador)-parseInt(nuevoProd.cantidad);
	let canasta = nuevoProd.cantidad*nuevoProd.precio;
	totalCarro = (totalCarro-parseFloat(canasta));
	updateDisplay(contador);
	updateTotal(totalCarro);
	ajusteCarrito(nuevoProd,btnEliminar)
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

