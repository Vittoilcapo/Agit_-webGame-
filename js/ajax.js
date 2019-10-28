var ajax = {
	cargarArchivo: function(ruta){
		var peticion = new XMLHttpRequest();

		peticion.onreadystatechange = function(){

			if (peticion.readyState == XMLHttpRequest.DONE){
				if (peticion.status == 200){ //200 = esta correcto
					console.log(JSON.parse(peticion.responseText));
				}else if (peticion.status == 400){//400 = error{
					console.log("error");
				}else {
					console.log("Resultado inesperado")
				}
			};
		}
		peticion.open("GET", ruta, true);
		peticion.send();

}
}


/* ESTADOS DE XMLHTTREQUEST
UNSENT - no iniciada
OPENED - conectado al servidor
HEADERS_RECIVED - peticion recibida
LOADING - procesando peticion
DONE - peticion finalizada, respuetsa preparada
*/