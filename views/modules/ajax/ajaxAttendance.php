<?php
require_once "../../../controllers/ControllerAttendance.php";
require_once "../../../models/CrudAttendance.php";
require_once "../../../models/maestro.php";



class AjaxAttendance {

  private $id;
  private $eventPersonId;
  private $dateA;
  private $timeA;
  private $turn;

  function __construct($id=NULL,$eventPersonId=NULL,$dateA=NULL,$timeA=NULL,$turn=NULL)
  {
     $this->id = $id;
     $this->eventPersonId = $eventPersonId;
     $this->dateA = $dateA;
     $this->timeA = $timeA;
     $this->turn = $turn;
  }

  public function saveAttendance(){
     $newAttendance = ControllerAttendance::newAttendanceController($this->eventPersonId,$this->dateA,$this->timeA,$this->turn);
     return $newAttendance;
  }

  public function searchAttendance(){
    $search = ControllerAttendance::searchAttendanceController($this->eventPersonId,$this->dateA,$this->turn);
    return $search;
  }

  public function __get($var)
  {
    return $this->$var;

  }

  public function __set($var,$valor)
  {
    $this->$var=$valor;
  }

}

if (isset($_POST['eventPersonId'])) {
  //$dateA = date("Y-m-d H:i:s");
  $dateA = date("Y-m-d");

  $timeA = date("H:i:s");

  $turno = date('A', strtotime($timeA));

  if (trim($turno)=="PM") {
    $turno = 'tarde';
  }else{
    $turno = 'mañana';
  }


  $create = new AjaxAttendance(null,$_POST['eventPersonId'],$dateA,$timeA,$turno);
  //Maestro::debbugPHP($create);
  $searchAttendance = $create->searchAttendance();
  Maestro::debbugPHP($searchAttendance);

  if ($searchAttendance=='1') {
    $result = $create->saveAttendance();
  }
  //Maestro::debbugPHP($result);
  // if ($result) {
  //   echo $result;
  // }

}
