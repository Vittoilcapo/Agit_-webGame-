function pegar(vidaRival){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var myDiv = document.getElementById("logUsuario");
      myDiv.innerHTML = xhttp.responseText;

      var myScripts = myDiv.getElementsByTagName("script");
      if (myScripts.length > 0) {
          eval(myScripts[0].innerHTML);
      }

    }
  };

  var myDiv = document.getElementById("arma1").style.display

  if (myDiv == 'none') {
    xhttp.open("POST", "procesoAjaxParaUsuario.php", true);
    xhttp.send();
  }else {
    xhttp.open("POST", "UsuarioConArma.php", true);
    xhttp.send();
  }
}

        function pegar2(){
            //window.location.href = ('insertarDatosPartida.php');

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                var myDiv = document.getElementById("logRival");
                myDiv.innerHTML = xhttp.responseText;

                var myScripts = myDiv.getElementsByTagName("script");
                if (myScripts.length > 0) {
                    eval(myScripts[0].innerHTML);
                }
              }
            };
            var myDiv = document.getElementById("arma2").style.display

            if (myDiv == 'none') {
              xhttp.open("POST", "procesoAjaxParaRival.php", true);
              xhttp.send();
            }else {
              xhttp.open("POST", "RivalConArma.php", true);
              xhttp.send();
            }


        }
