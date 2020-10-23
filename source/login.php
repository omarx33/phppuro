<?php
include'../autoload.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$user = trim($_REQUEST['user']);
$pass = trim($_REQUEST['pass']);
$pass = md5($pass);

try {
$query = "SELECT * FROM usuarios  WHERE UPPER(user)=:user and password=:pass";
$statement = $conexion->prepare($query);
$statement->bindParam(":user",$user);
$statement->bindParam(":pass",$pass);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0){
  session_start();
  $dato = $result[0];
  $_SESSION[KEY.ID]=$dato['id'];
  $_SESSION[KEY.NOMBRES]=$dato['nombres'];
  $_SESSION[KEY.APELLIDOS]=$dato['apellidos'];
  echo json_encode(

array(
"title"=>"Bienvenido",
"text"=>$_SESSION[KEY.NOMBRES],
"type"=>"success"

)

  );
}else{
  echo json_encode(

array(
"title"=>"error",
"text"=>"acceso denegado",
"type"=>"error"

)

  );
}

} catch (\Exception $e) {
  echo"error".$e->getMessage();
}



 ?>
