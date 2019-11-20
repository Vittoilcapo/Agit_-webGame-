<?php
class usuario{

  var $usuario_id;
  var $usuario_dinero;
  var $usuario_nivel;
  var $inventario_id;


  function setUsuario(){
  include_once("connectBD.php");
   $Sentencia_sql="select usuario_id, usuario_dinero, usuario_nivel, inventario_id from usuario where usuario_id =8;";
   $resultado = conectar($Sentencia_sql);

  while ($usuario = mysqli_fetch_array($resultado)){
    $this->usuario_id = $usuario ["usuario_id"];
    $this->usuario_dinero = $usuario ["usuario_dinero"];
    $this->usuario_nivel = $usuario ["usuario_nivel"];
    $this->inventario_id = $usuario["inventario_id"];

  }

}





}




 ?>
