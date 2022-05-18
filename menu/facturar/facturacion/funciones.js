let botonReload = document.getElementById("boton_reload");
let botonBuscar = document.getElementById("boton_buscar");

botonReload.addEventListener("click",function(){
	let confirmar = confirm("¿Queres reiniciar todos los datos?");
	if (confirmar == true) {
		location.reload();	
	}
});

botonBuscar.addEventListener("click",(e)=>{
	e.preventDefault();
if (campoCodigo.value === "") {
	notificacionError();
}else{
	let descripcionBuscar = campoCodigo.value;
	let peticionDescripcion = new XMLHttpRequest;
	peticionDescripcion.open("POST",`buscar.php?descripcion=${descripcionBuscar}`);
	peticionDescripcion.onreadystatechange = ()=>{
		if (peticionDescripcion.readyState == 4 && peticionDescripcion.status == 200) {
			let datosDescripcion = peticionDescripcion.response;
			datosDescripcion = JSON.parse(datosDescripcion);
			if (datosDescripcion.length == 0) {
				notificacionError();
			}else{
				iniciarbusqueda_descripcion(datosDescripcion);
			}
		}
	}
	peticionDescripcion.send();
	formulario.reset();
	}
});

let prodBuscar = [];

let saber = (boton) => {
 for (let prod of prodBuscar) {
	if (boton.id == prod.id) {
		insertar(prod)
		notificacionOk();	
	}
 }
}

let iniciarbusqueda_descripcion = (producto)=>{
 let divBusqueda = document.getElementById("tabla_busqueda");
 let cuadroBusqueda = document.createElement("div");
 
 cuadroBusqueda.classList.add("contenedor");
 
 let tablaBusqueda = document.createElement("table");
 
 tablaBusqueda.classList.add("table","table-striped","table-hover");
 tablaBusqueda.innerHTML+="<thead><tr><th>CODIGO</th><th>DESCRIPCION</th><th>STOCK</th><th class='text-center'>AGREGAR</th></tr></thead>";

for (productos in producto) {
	tablaBusqueda.innerHTML+=`<tbody><tr><td class='align-items-center align-middle'>${producto[productos].codigo}</td>
							  <td class='align-items-center align-middle'>${producto[productos].descripcion}</td>
							  <td class='align-items-center align-middle'>${producto[productos].stock}</td><td class='text-center'>
							  <button class='btn btn-primary' id='${producto[productos].id}' onclick='saber(this)'><i class='fas fa-cart-plus'>
							  </i></button></td></tr></tbody>`;	
							  prodBuscar.push(producto[productos]);
}

cuadroBusqueda.append(tablaBusqueda);
 	divBusqueda.append(cuadroBusqueda);
	cuadroBusqueda.innerHTML+="<button class='btn btn-dark my-3 w-100' id='BtnEliminarBusq'><i class='fas fa-times-circle'></i></button>";
	let btnCerrar = document.getElementById("BtnEliminarBusq");
	btnCerrar.addEventListener("click",()=>{
	cuadroBusqueda.remove();
	});
};