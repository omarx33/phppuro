<?php
include'../autoload.php';
$conexion = new Conexion();
$conexion = $conexion->get_conexion();
$opcion = $_REQUEST['op'];

switch ($opcion) {
  case 1:
  try {
    $query = "SELECT * FROM usuarios";
    $statement = $conexion->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = [
      "sEcho"=>1,
      "iTotalRecords"=>count($result),
      "iTotalDisplayRecords"=>count($result),
      "aaData"=>$result
    ];
    echo json_encode($json);
  } catch (\Exception $e) {
    echo "error".$e->getMessage();
  }

    break;

  default:
    // code...
    break;
}


 ?>
