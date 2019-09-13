document.addEventListener('DOMContentLoaded', function() {
  inicio.iniciarJuego();
}, false);

var inicio= {
  iniciarJuego: function(){
    console.log("Anda joya");
    var r= new Rectangulo(10,10,100,100);
    dimensiones.iniciar();
    mainBucle.iterar();
  }
}
