let btnDevolucion = document.getElementById("btnDevolucion");
let inputNum = document.getElementById("inputNum");
let formDevolucion = document.getElementById("formDevolucion");
let cajaDevolucion = document.getElementById("cajaDevolucion");
let cajaInput = document.getElementById("cajaInput");
let idCliente = document.getElementById("idCliente");
let idIva = document.getElementById("idIva");
let btnDevol = document.getElementById("btnDevol");
let inputDevol = document.getElementById("inputDevol");
let formDevII = document.getElementById("formDevII");
let tbody = document.getElementById("tbodyDevol");
let contador = document.getElementById("contador");
let totalNc = document.getElementById("totalNc");
let btnSendnc = document.getElementById("btnSendnc");
let newArray = [];
let numFactura = [];
let bolsa = [];
let contProd = 0;
let datosFac;

let setCantidad=(cantDevol,totalDevol)=>{
	if (bolsa[0]>0) {
		bolsa[0] = bolsa[0] + cantDevol;
		bolsa[1] = bolsa[1] + totalDevol;
		bolsa[1] = parseFloat(bolsa[1].toFixed(2));
		totalNc.innerHTML = `<i class="fa-solid fa-dollar-sign mx-2"></i>${bolsa[1]}`;
		contador.innerHTML = `<i class="fa-solid fa-basket-shopping mx-2"></i>${bolsa[0]}`;	
	}else{
		bolsa[0] = cantDevol;
		bolsa[1] = totalDevol;
		totalNc.innerHTML = `<i class="fa-solid fa-dollar-sign mx-2"></i>${bolsa[1]}`;
		contador.innerHTML = `<i class="fa-solid fa-basket-shopping mx-2"></i>${bolsa[0]}`;
	}
// cuanta la cantidad de articulos y los muestra en pantalla
// cuenta la cantidad de dinero que se acumula en la NC y los muestra en pantalla
}

let cargarDatos = (datos)=>{
	idCliente.innerHTML = datos.cliente;
	idIva.innerHTML = datos.iva;
	if (datos.iva == "Consumidor Final") {
		idDni.innerHTML = datos.num_dni;	
	}else{
		idDni.innerHTML = datos.num_cuit;	
	}
//carga de datos en la pantalla con la respuesta generada por el servidor
}

let consultarProd = ()=>{
	let nuevoDevol = inputDevol.value;
	nuevoDevol = parseInt(nuevoDevol);
	numFactura.push(nuevoDevol);
	formDevII.reset(); 
	devolucionDb('start_devol.php', numFactura)
	  .then(data => {
	  	respuestaNota(data);
	  });
	numFactura.pop();
	//consulta al servidor con los datos de los articulos
}

let insertar = (data)=>{
	let cantidadArt = data.length;
	if (cantidadArt>0) {
		let totalDev = 0;
			for (var i = 0;i<data.length; i++) {
				totalDev+= data[i].cantidad;
			}
			totalDev = parseInt(totalDev);
		return totalDev;
		// devuelve la cantidad total de articulos en la FC original
	}
}

let respuestaNota = (respuesta)=>{
	if(respuesta.includes('pertenece')){
		swal({
		  text: "El Articulo no pertenece a la Factura Original",
		  icon: "error",
		  timer: 2800,
		  });
		}
	if(respuesta.includes('existe')){
		swal({
		  text: "El Articulo no existe",
		  icon: "error",
		  timer: 1800,
		  });
		}
	if(Array.isArray(respuesta)){
		ingreCant(insertar(respuesta),respuesta);
	}
//respuesta del servidor con los datos de los articulos en la FC original, si el articulo no existe devuelve error
//si el articulo no esta incluido en la FC original, devuelve error
//si el articulo esta en la factura, procede con la devolucion
}

let cargarArt = (valorDevol,productoDev)=>{
	let tr = document.createElement("tr");
	tr.setAttribute("id",contProd);
	tr.innerHTML = `<th>${productoDev[0].codigo}</th>
									<td>${productoDev[0].descripcion}</td>
									<td>${valorDevol}</td>
									<td>${productoDev[0].precio}</td>
									<td>${productoDev[0].iva}</td>
									<td><i class="btn btn-primary fa-solid fa-trash-can" id="${contProd}"></i></td>`;
	tbody.append(tr);
	// carga los articulos a la NC
	let btnStartdevol = document.getElementById(contProd);
	btnStartdevol.addEventListener("click",()=>{
		btnStartdevol.remove();
		function1(valorDevol,productoDev[0].codigo,productoDev[0].precio,productoDev);
	});
	contProd = (contProd+1);
}
//
let function1 = (cantidadArt,codigo,precio,proStar)=>{
	let cantidaDevolver = cantidadArt;
	let indexVal;
	let suma;
	bolsa[0] = bolsa[0]-cantidadArt;
	bolsa[1] = parseFloat((bolsa[1]-(cantidadArt*precio)).toFixed(2));
	totalNc.innerHTML = `<i class="fa-solid fa-dollar-sign mx-2"></i>${bolsa[1]}`;
	contador.innerHTML = `<i class="fa-solid fa-basket-shopping mx-2"></i>${bolsa[0]}`;	
	codigo = parseInt(codigo);
	
	for (var i = 0;i<newArray.length;i++) {
		if (newArray[i].articulo === codigo) {
			indexVal= newArray.indexOf(newArray[i]);
		}
	}
	suma = newArray[indexVal].cantidad+cantidaDevolver;
	if (suma===insertar(proStar)) {
			newArray.splice(indexVal,1);
	}else{
			newArray[indexVal].cantidad = suma;
	}
//resta y actualiza los valores en la NC
}

let ingreCant =(cantidad,producto)=>{
	swal({
  	title:"Ingresa la cantidad",
  	content: "input",
		})
	.then((value) => {
		let saber;
		let error;
		let resta;
		let insertDat;
		let codArt = producto[0].codigo;
		let precioArt = producto[0].precio;
		value = parseInt(value);
		codArt = parseInt(codArt);
		if (newArray.length === 0) {
			cantidad = cantidad-value;
			if (cantidad>=0) {
				insertDat = { "cantidad" : cantidad,"articulo" : codArt, 'total' : insertar(producto),datosFac };
				newArray.push(insertDat);
				cargarArt(value,producto);
				cantiDev = (value*precioArt);
				cantiDev = parseFloat(cantiDev.toFixed(2));
				setCantidad(value,cantiDev);
			}else{
				swal({
				  text: "Estas devolviendo unidades de mas",
				  icon: "error",
				  timer: 1800,
				});
			}
		}else if (newArray.length>=1) {
			for (var i = 0;i<newArray.length;i++) {
				if (newArray[i].articulo === codArt) {
					saber = newArray.indexOf(newArray[i]);
				}
			}
			if (saber>=0) {
				if (value>newArray[saber].cantidad) {
					swal({
					  text: "Estas devolviendo unidades de mas",
					  icon: "error",
					  timer: 1800,
					});
				}else{
					resta = (newArray[saber].cantidad-value);
					newArray[saber].cantidad = resta;
					cargarArt(value,producto);
					cantiDev = (value*precioArt);
					setCantidad(value,cantiDev);	
				}
			}
			if (saber === undefined) {
				resta = cantidad-value;
				if (resta>=0) {
					insertDat = { "cantidad" : resta,"articulo" : codArt, 'total' : insertar(producto) };
					newArray.push(insertDat);
					cargarArt(value,producto);
					cantiDev = (value*precioArt);
					setCantidad(value,cantiDev);	
				}else{
					swal({
					  text: "Estas devolviendo unidades de mas",
					  icon: "error",
					  timer: 1800,
					});
				}
			}
		}
	});
}
	//contar la cantidad de veses que se cargo el articulo y restar a la cantidad total de la FC original
	//si la cantidad ingresada es igual a la cantidad total, no permitir cargar mas articulos// xx
	//si de la resta, sobran unidades, permitir cargar hasta que el stock de las cantidades 
	//disponibles llegue a 0
  //consulta por la cantidad de articulos a devolver,
  //de ingresar mas alerta del error, si la cantidad son inferiores procede con la devolucion
 
btnDevolucion.addEventListener("click",()=>{
	inputNum = parseInt(inputNum.value);
	devolucionDb("devolucion.php", inputNum)
	.then(data => {
		notifacionNota(data);
		cargarDatos(data);
		datosFac = data;
	});
	numFactura.push(inputNum);
	formDevolucion.reset();	
	inputNum = document.getElementById("inputNum");
	btnDevol.addEventListener("click",consultarProd)
	//consulta el NUM de FC, si los datos estan OK, procede con la devolucion
});

let notifacionNota = (notificacion)=>{
	if(notificacion === "no hay resultados"){
		swal({
		  title: "Ingresa un Numero Valido",
		  icon: "error",
		  timer: 1800,
		  });
	}else{
		swal({
			  title: "Datos Correctos",
			  icon: "success",
			  timer: 1800,
		  });
		setTimeout(function(){
			let style = "display: none;";
			cajaInput.setAttribute("style", style);
			cajaDevolucion.removeAttribute("style",style);
		}, 1800);
	}
//devuelve el resultado de la busqueda del NUM de factura, si el numero es incorrecto,devuelve error
//si el numero es correcto, procede con la devolucion
}

async function devolucionDb(url = '', data) {
  	const response = await fetch(url, {
	    method: 'POST',
	    headers: {
		      'Content-Type': 'application/json'
	          },
	    body: JSON.stringify(data) 
	 	});
	return response.json();
	//envio de datos al servidor
}

let setClick = () =>{
swal("Finalizar Nota de Credito", {
  buttons: {
    cancel: "Cancelar",
    catch: {
      text: "Continuar",
      value: "catch",
    },
  },
})
.then((value) => {
  switch (value) {
    case "catch":
    	async function postData(url = '', data) {
		 		const response = await fetch(url, {
		    method: 'POST', 
		    headers: {
		      'Content-Type': 'application/json'
		    },
		    body: JSON.stringify(data) 
		  });
		  return response.json(); 
		}
		postData('altanc.php', newArray)
		  .then(data => {
	    	 	swal("NC Terminada","Num NC 000-00001","success", {
	  	  	// timer:1900,
		     	buttons : false,
		    });
		  });
  }
});
}

btnSendnc.addEventListener('click', setClick);
