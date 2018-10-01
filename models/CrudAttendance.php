<?php
require_once "conexion.php";
class CrudAttendance extends Conexion{
  //Register of student

  public function searchAttendanceModel($eventPersonId,$dateA,$turn,$table){
    $conexion = new Conexion();
    //$stmt = $conexion->prepare("SELECT * FROM $table WHERE dateA ='".$dateA."'");
    $stmt = $conexion->prepare("SELECT * FROM $table WHERE event_person_id=:eventPersonId AND dateA ='".$dateA."' AND turn=:turn");
    $stmt->bindParam(":eventPersonId",$eventPersonId,PDO::PARAM_INT);
    //$stmt->bindParam(":dateA",$dateA);
    $stmt->bindParam(":turn",$turn,PDO::PARAM_STR);
    $stmt->execute();
    if (!empty($stmt->fetch())) {
      return '0';
    }else{
      return '1';
    }

    //return $stmt;
  }

  public function newAttendanceModel($eventPersonId,$dateA,$timeA,$turn,$tabla){
    //var_dump($datos);
    $conexion = new Conexion();
    $stmt = $conexion->prepare("INSERT INTO $tabla
                                                  ( id,
                                                    event_person_id,
                                                    dateA,
                                                    timeA,
                                                    turn
                                                    )
                                  VALUES (null,
                                              :event_person_id,
                                              :dateA,
                                              :timeA,
                                              :turn
                                              )");
    $stmt->bindParam(":event_person_id",$eventPersonId,PDO::PARAM_INT);
    $stmt->bindParam(":dateA",$dateA);
    $stmt->bindParam(":timeA",$timeA);
    $stmt->bindParam(":turn",$turn,PDO::PARAM_STR);
    //echo $stmt;
//var_dump($datosModel);
    if($stmt->execute()){
      return "cas";
    }else{
      return "error";
    }
  //
     $stmt->close();
   }


  //View of Student
  //******************************
    public function viewAttendanceStudentModel($id,$date,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("SELECT * FROM $tabla  WHERE student_id=:student_id AND date_attendance=:date_attendance");

      $stmt->bindParam(":student_id",$id,PDO::PARAM_INT);
      $stmt->bindParam(":date_attendance",$date);
      //echo $date;
      //var_dump($stmt);
      $stmt->execute();
      return $stmt->fetchAll();
      $stmt->close();
    }

    //Actualizar asistencia
    //************************************************
    public function updateAttendanceModel($datosModel,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("UPDATE $tabla
                                  SET student_id=:student_id,
                                      date_attendance=:date_attendance,
                                      status=:status,
                                      user_id=:user_id,
                                      date_update=:date_update
                                  WHERE attendance_id=:attendance_id");

      $stmt->bindParam(":attendance_id",$datosModel["attendance_id"],PDO::PARAM_INT);
      $stmt->bindParam(":student_id",$datosModel["student_id"],PDO::PARAM_INT);
      $stmt->bindParam(":date_attendance",$datosModel["date_attendance"]);
      $stmt->bindParam(":status",$datosModel["status"],PDO::PARAM_STR);
      $stmt->bindParam(":user_id",$datosModel["user_id"],PDO::PARAM_INT);
      $stmt->bindParam(":date_update",$datosModel["date_update"]);

      if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }


    //Editar usuarios
    //************************************************
    public function editStudentModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("SELECT *
                                  FROM $tabla
                                  WHERE student_id=:student_id");
      $stmt->bindParam(":student_id",$datos,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();
    }



    //Actualizar usuarios
    //************************************************
    public function deleteStudentModel($datos,$tabla){
      $conexion = new Conexion();
      $stmt = $conexion->prepare("DELETE FROM $tabla WHERE student_id=:student_id");
      $stmt->bindParam(":student_id",$datos,PDO::PARAM_INT);

    if($stmt->execute()){
        return "success";
      }else{
        return "error";
      }

      $stmt->close();
    }


}
?>
