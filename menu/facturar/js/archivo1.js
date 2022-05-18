let btnEnlace = document.getElementById("btnEnlace");
let campoUser = document.getElementById("userSistema");
let campoPass = document.getElementById("passSistema");
let btnModal = document.getElementById("btnModal");

let user;

btnEnlace.addEventListener("click",()=>{
	formLogin.reset();
});

let notifPermisos = (title,text,icon)=>{
swal({
  title: title,
  text: text,
  icon: icon,
  timer: 2000,
    });
}

let devolucion = ()=>{
		setTimeout(function(){
			window.location.href = "devolucion/index.php"; 
		}, 1500);
}


btnModal.addEventListener("click",(e)=>{
	if (campoPass.value === "" && campoUser.value === "") {
         let titulo = "Datos Incorrectos";
         let texto = "";
         let icono = "error";
         notifPermisos(titulo,texto,icono);
	}else{
		if (campoUser.value === "") {
			let titulo = "Ingresa Usuario";
	        let texto = "";
	        let icono = "warning";
	        notifPermisos(titulo,texto,icono);
		}
		if(campoPass.value === ""){
		 	let titulo = "Ingresa Password";
	        let texto = "";
	        let icono = "warning";
	        notifPermisos(titulo,texto,icono);
			}
		if (campoPass.value != "" && campoUser.value != "") {
				user = [campoUser.value,campoPass.value];
				postData('archivo1.php', user)
  			.then(data => {
  		    if (data === true) {
  		    	let titulo = "Datos Correctos";
	      	  let texto = "";
	      	  let icono = "success";
	      	  notifPermisos(titulo,texto,icono);
	      	  devolucion();
  		    }else{
  		    	  let titulo = "No posee Permisos";
		      	  let texto = "";
		      	  let icono = "warning";
		      	  notifPermisos(titulo,texto,icono);
  		    }
     			});
		}
	}
		e.preventDefault();
});

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
