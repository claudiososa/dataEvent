<?php
require_once "conexion.php";
class EventPerson extends Conexion{

  public function searchEventPersonIdModel($event_id,$person_id){

    $conexion = new Conexion();
    $stmt = $conexion->prepare("SELECT id FROM event_persons WHERE event_id=:event_id AND person_id=:person_id");
    $stmt->bindParam(":event_id",$event_id,PDO::PARAM_INT);
    $stmt->bindParam(":person_id",$person_id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function saveConfirmModel($id){
    $conexion = new Conexion();
    $stmt = $conexion->prepare("UPDATE event_persons SET confirmation='SI' WHERE id=:id");
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    if ($stmt->execute()) {
      return true;
    }else{
      return false;
    }

  }
}
?>
