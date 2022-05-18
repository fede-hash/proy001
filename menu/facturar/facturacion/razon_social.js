let btnInsertar = document.getElementById("altaCobro");
let ivaCliente = document.getElementById('iva').innerText;
let razonSocialCliente = document.getElementById('razon_social').innerText;
let cuitCliente = document.getElementById('cuit').innerText;
let botonCobrar = document.getElementById("ingresarFactura");
let numFac ;
let cliente = [];
let completo = []; 

let modalTotal = (val)=>document.getElementById("clienteTotal").innerHTML = parseFloat(val.toFixed(2));

btnInsertar.addEventListener("click",()=>{
	if (carrito.length !== 0) {
		btnInsertar.setAttribute('data-toggle','modal');
		btnInsertar.setAttribute('data-target','#exampleModal');
		modalTotal(totalCarro);
	}else if(carrito.length == 0){
		notificacionCarrito();	
		btnInsertar.removeAttribute('data-target');
		btnInsertar.removeAttribute('data-toggle');
	}
});

let notifCobro = (title,text,icon)=>{
		swal({
			  title: title,
			  text: text,
			  icon: icon,
			  button: "Cerrar",
			  timer: 2000,
				});
}

let addNumfactura = ()=>{
	let conNumfactura = new XMLHttpRequest;
	conNumfactura.open("POST",`num_factura.php`);
	conNumfactura.onreadystatechange = ()=>{
		 if (conNumfactura.readyState == 4 && conNumfactura.status == 200) {
			let respNumfactura = conNumfactura.response;
			respNumfactura = JSON.parse(respNumfactura);
			respNumfactura = parseInt(respNumfactura);
			return numFac = respNumfactura+1;
		}
	}
	conNumfactura.send();
	}

addNumfactura();

let llamarCobro = ()=>{
	let inputCobrar = document.getElementById("inputCobro");
	inputCobrar = parseFloat(inputCobrar.value);
		if (inputCobrar>totalCarro || inputCobrar===totalCarro) {
			var titulo = `FACTURA N° 000-${numFac}`;
			var texto =`Su Vuelto es $ ${parseFloat(inputCobrar-totalCarro).toFixed(2)}`;
			var icono = "success";
			notifCobro(titulo,texto,icono);
			addFactura(completo);
			reiniciar();
		}else if(inputCobrar<totalCarro){
			var titulo = '';
			var texto = 'Resta Abonar $ '+parseFloat(totalCarro-inputCobrar).toFixed(2);
			var icono = "warning";
			notifCobro(titulo,texto,icono);
		}else if(!inputCobrar){
			var titulo = '';
			var texto = "Ingrese el dinero";
			var icono = "warning";
			notifCobro(titulo,texto,icono);
		}
}
	
let reiniciar = ()=>{
	setTimeout(function(){
			window.location.href = "../facturacion/index.php"; 
		}, 2000);
} 

let addFactura = (customer)=>{
	let cadenaNueva = JSON.stringify(customer);
	var url = 'insertar_factura.php';
	fetch(url, {
	  method: 'POST',
	  body: cadenaNueva,
	  headers: {
	    'Content-Type': 'application/json',
	  }
	})
}

botonCobrar.addEventListener("click",()=>{
	if (ivaCliente == 'Responsable Inscripto' || ivaCliente == 'Exento' && !razonSocialCliente == '' ) {
		cliente = [razonSocialCliente,cuitCliente,ivaCliente];
		completo = [cliente,carrito,totalCarro];
		llamarCobro();
	}
});