<?php
class usuario{

  public $usuario_id;
  public $usuario_dinero;
  public $usuario_nivel;
  public $inventario_id;


  function setUsuario($usuario_id){
  include_once("connectBD.php");
   $Sentencia_sql="select usuario_id, usuario_dinero, usuario_nivel, inventario_id from usuario where usuario_id =".$usuario_id.";";
   $resultado = conectar($Sentencia_sql);

  while ($usuario = mysqli_fetch_array($resultado)){
    $this-> usuario_id = $usuario ["usuario_id"];
    $this-> usuario_dinero = $usuario ["usuario_dinero"];
    $this-> usuario_nivel = $usuario ["usuario_nivel"];
    $this-> inventario_id = $usuario["inventario_id"];

  }

}



}




 ?>
