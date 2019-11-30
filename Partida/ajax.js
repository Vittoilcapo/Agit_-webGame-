function pegar(vidaRival){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("logUsuario").innerHTML = xhttp.responseText;

    }
  };

  xhttp.open("POST", "procesoAjaxParaUsuario.php", true);
  xhttp.send();
}

        function pegar2(vidaUsuario){
          alert(vidaUsuario);
            //window.location.href = ('insertarDatosPartida.php');

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("logRival").innerHTML = xhttp.responseText;

              }
            };

            xhttp.open("POST", "procesoAjaxParaRival.php", true);
            xhttp.send();



        }
