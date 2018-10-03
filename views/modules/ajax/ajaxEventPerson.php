<?php
require_once "../../../controllers/controllerEventPerson.php";
require_once "../../../models/EventPerson.php";
require_once "../../../models/maestro.php";



class AjaxEventPerson {

  private $id;
  private $personId;
  private $eventId;
  private $visitorId;
  private $detalleVisitorId;
  private $confirmation;
  private $dateConfirmation;

  function __construct($id=NULL,$personId=NULL,$eventId=NULL,$visitorId=NULL,$detalleVisitorId=NULL,$confirmation=NULL,$dateConfirmation=NULL)
  {
     $this->id = $id;
     $this->personId = $personId;
     $this->eventId = $eventId;
     $this->visitorId = $visitorId;
     $this->detalleVisitorId = $detalleVisitorId;
     $this->confirmation = $confirmation;
     $this->dateConfirmation = $dateConfirmation;
  }

  public function searchEventPersonId(){
     $update = ControllerEventPerson::searchEventPersonIdController($this->eventId,$this->personId);
     return $update;
  }

  public function saveConfirm(){
    $confirm = ControllerEventPerson::saveConfirmController($this->id);
    return $confirm;
  }

  public function createEventPersonId(){
    $create = ControllerEventPerson::createEventPersonController($this->personId,$this->eventId,
    $this->visitorId,$this->detalleVisitorId,$this->confirmation,$this->dateConfirmation);
    return $create;
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



/************************************************************/
if (isset($_POST['personId'])) {

  $dato = new AjaxEventPerson();
  $dato->personId = $_POST['personId'];
  $dato->eventId = $_POST['eventId'];
  $dato->visitorId = $_POST['visitorId'];
  $dato->detalleVisitorId = $_POST['detalleVisitorId'];

  $eventPersonId = $dato->searchEventPersonId();

  if ($eventPersonId) {
    $eventPerson = new AjaxEventPerson($eventPersonId['id'],null,null,$_POST['visitorId'],$_POST['detalleVisitorId']);
    //$data = $eventPerson->saveConfirm();

    $confirm = ControllerEventPerson::saveConfirmController($eventPersonId['id'],$_POST['visitorId'],$_POST['detalleVisitorId']);

    if ($confirm) {
      echo $confirm;
    }
    //Maestro::debbugPHP($confirm);
  }else{
    //existe algun error
  }

}

/************************************************************/

if (isset($_POST['newEventPerson'])) {
  //Maestro::debbugPHP($_POST);
  $dateConfirmation = date("Y-m-d");

  $dato = new AjaxEventPerson();
  $dato->personId = $_POST['personIdNew'];
  $dato->eventId = $_POST['eventIdNew'];
  $dato->visitorId = $_POST['visitorId'];
  $dato->detalleVisitorId = $_POST['detalleVisitorId'];
  $dato->confirmation = "SI";
  $dato->dateConfirmation = $dateConfirmation;


  //Maestro::debbugPHP($dato);
  $newEventPerson = $dato->createEventPersonId();
  //Maestro::debbugPHP($newEventPerson);
  echo $newEventPerson;



}
