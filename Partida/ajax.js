function pegar(){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("logUsuario").innerHTML = xhttp.responseText;
    }
  };

  xhttp.open("GET", "procesoAjaxParaUsuario.php", true);
  xhttp.send();
}

        function pegar2(){
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("logRival").innerHTML = xhttp.responseText;
              }
            };

            xhttp.open("GET", "procesoAjaxParaRival.php", true);
            xhttp.send();



        }
