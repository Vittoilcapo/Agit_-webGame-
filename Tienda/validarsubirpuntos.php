<?php
include_once('usuario.php');


session_start();
include_once("../Tienda/connectBD.php");

$usuario_id = $_SESSION['ClaseUsuario']->usuario_id;


if (isset($_POST['btnIngresar'])){
  if(trim($_REQUEST['ingresa_fuerza'])=="" or trim($_REQUEST['ingresa_agilidad'])=="" or trim($_REQUEST['ingresa_velocidad'])==""){


  ?>
  <script>
  alert("no puede dejar campos vacios");
  window.location="subirpuntos.php";
  </script>
<?php
}else{
echo "puede ingresar";

}

}


$sql="select puntoDisponibles from estadisticas where usuario_id=$usuario_id;";
$resultado=conectar($sql);

while ($mostrar=mysqli_fetch_array($resultado)){
  $disponiblesActual=$mostrar[0]; //Obtenemos la cantidad de puntos ganados por el usuario para invertir
}

//obtenemos los valores actuales de sus estadisticas
$fuerzaActual= $_SESSION['ClaseUsuario']->fuerza;
$agilidadActual= $_SESSION['ClaseUsuario']->agilidad;
$velocidadActual= $_SESSION['ClaseUsuario']->velocidad;

$totalActual= $fuerzaActual + $velocidadActual +$agilidadActual; //Guardamos el total en una variable, nos servira para descontar los puntos que invierte el usuario


//obtenemos los valores que quiere aumentar
                $_SESSION['fuerza']=$_REQUEST['ingresa_fuerza'];
                $_SESSION['agilidad']=$_REQUEST['ingresa_agilidad'];
                $_SESSION['velocidad']=$_REQUEST['ingresa_velocidad'];

//guardamos los valores actuales mas los que el usuario se quiere aumentar
                $fuerza=$_SESSION['fuerza'] + $fuerzaActual;
                $agilidad=$_SESSION['agilidad'] + $agilidadActual;
                $velocidad=$_SESSION['velocidad'] + $velocidadActual;

//guardamos el total final de todos los puntos gastados y los que ya tenia
$total= $fuerza + $agilidad + $velocidad;
$disponibles= $disponiblesActual + $fuerzaActual + $agilidadActual+ $velocidadActual; //Verificamos cual es valor maximo que puede alcanzar las estadisticas  del usuario en base a la suma de sus estadisticas y sus puntos disponibles
$resta=$total - $totalActual; //guardamos los puntos que gasta, para restarlos de los que ya tiene
$quedan=$disponiblesActual - $resta; //guardamos la resta de los puntos que tiene menos los que gasto

/*
echo "puntos actuales: ".$disponiblesActual;
echo "<br>";
echo "diferencia: ".$resta;
echo "<br>";
echo "le quedaran: ".$quedan;
*/

if ($total > $disponibles){
  echo "no te haga el langa perri que eso punto no los tene";
}elseif ($total <= $disponibles){

$sql1="update `juego`.`estadisticas` SET `estadisticas_velocidad`=$velocidad, `estadisticas_fuerza`=$fuerza, `estadisticas_agilidad`=$agilidad WHERE (`usuario_id` =$usuario_id );";
$resultado= conectar($sql1);

$sql3="update `juego`.`estadisticas` SET `puntoDisponibles` =$quedan WHERE (`usuario_id`=$usuario_id)";
$resultado= conectar($sql3);
}




 ?>
