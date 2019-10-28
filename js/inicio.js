document.addEventListener('DOMContentLoaded', function() {
  inicio.iniciarJuego();
}, false);

var inicio= {
  iniciarJuego: function(){
    console.log("Anda joya");
    ajax.cargarArchivo("mapa/mainmap.json");
    var r= new Rectangulo(10,10,100,100);
    teclado.iniciar();
    dimensiones.iniciar();
    mainBucle.iterar();
  }
}
