var dimensiones = {
  ancho: window.innerWidth || document.documentElement.clientWidth || document.body.clientWithd,
  alto: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
  iniciar: function(){
    window.addEventListener("resize", function(evento){
      dimensiones.ancho = window.innerWidth || document.documentElement.clientWidth || document.body.clientWithd;
      dimensiones.alto= window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
      console.log("Ancho: " + dimensiones.ancho + "Alto: " + dimensiones.alto);

    });
  }
};
