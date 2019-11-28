<?php
class usuario{

  var $usuario_id;
  var $usuario_nombre;
  var $usuario_dinero;
  var $usuario_nivel;
  var $inventario_id;
  var $velocidad;
  var $fuerza;
  var $agilidad;
  var $imagen;


  function setUsuario($id_usuario){
  include_once("connectBD.php");
   $Sentencia_sql="select u.usuario_id, u.usuario_nombre, u.usuario_dinero, u.usuario_nivel, u.inventario_id, e.estadisticas_velocidad, e.estadisticas_fuerza, e.estadisticas_agilidad, i.inventario_skin_foto from
                    usuario u join estadisticas e join inventario_skin i where u.usuario_id =".$id_usuario." and e.usuario_id = u.usuario_id and i.inventario_id = u.inventario_id;";
   $resultado = conectar($Sentencia_sql);

  while ($usuario = mysqli_fetch_array($resultado)){
    $this->usuario_id = $usuario ["usuario_id"];
    $this->usuario_nombre = $usuario ["usuario_nombre"];
    $this->usuario_dinero = $usuario ["usuario_dinero"];
    $this->usuario_nivel = $usuario ["usuario_nivel"];
    $this->inventario_id = $usuario["inventario_id"];
    $this->fuerza = $usuario["estadisticas_fuerza"];
    $this->agilidad = $usuario["estadisticas_agilidad"];
    $this->velocidad = $usuario["estadisticas_velocidad"];
    $this->imagen = $usuario["inventario_skin_foto"];

  }

}





}




 ?>
