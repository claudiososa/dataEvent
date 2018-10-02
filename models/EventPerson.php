<?php
require_once "conexion.php";
class EventPerson extends Conexion{

  public function searchEventPersonIdModel($event_id,$person_id){

    $conexion = new Conexion();
    $stmt = $conexion->prepare("SELECT id,visitor_id,detalle_visitor_id FROM event_persons WHERE event_id=:event_id AND person_id=:person_id");
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
      return $id;
    }else{
      return 0;
    }

  }



  public function createEventPersonModel($tabla,$personId,$eventId,$visitorId,$detalleVisitorId,$confirmation,$dateConfirmation){

    $conexion = new Conexion();
    $stmt = $conexion->prepare("INSERT INTO $tabla (id,event_id,person_id,visitor_id,detalle_visitor_id,confirmation,date_confirmation)
                                VALUES (null,:eventId,:personId,:visitorId,:detalleVisitorId,:confirmation,:dateConfirmation)");

    $stmt->bindParam(":personId",$personId,PDO::PARAM_INT);
    $stmt->bindParam(":eventId",$eventId,PDO::PARAM_INT);
    $stmt->bindParam(":visitorId",$visitorId,PDO::PARAM_INT);
    $stmt->bindParam(":detalleVisitorId",$detalleVisitorId,PDO::PARAM_INT);
    $stmt->bindParam(":confirmation",$confirmation,PDO::PARAM_STR);
    $stmt->bindParam(":dateConfirmation",$dateConfirmation);

  if($stmt->execute()){
      $lastId = $conexion->lastInsertId();
      return $lastId;
    }else{
      return "error";
    }
    $stmt->close();


  }

}
?>
