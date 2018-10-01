<?php
require_once "../../../controllers/controllerEventPerson.php";
require_once "../../../models/EventPerson.php";
require_once "../../../models/maestro.php";



class AjaxEventPerson {

  private $id;
  private $personId;
  private $eventId;

  function __construct($id=NULL,$personId=NULL,$eventId=NULL)
  {
     $this->id = $id;
     $this->personId = $personId;
     $this->eventId = $eventId;
  }

  public function searchEventPersonId(){
     $update = ControllerEventPerson::searchEventPersonIdController($this->eventId,$this->personId);
     return $update;
  }

  public function saveConfirm(){
    $confirm = ControllerEventPerson::saveConfirmController($this->id);
    return $confirm;
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

if (isset($_POST['personId'])) {

  $dato = new AjaxEventPerson();
  $dato->personId = $_POST['personId'];
  $dato->eventId = $_POST['eventId'];

  $eventPersonId = $dato->searchEventPersonId();

  if ($eventPersonId) {
    $eventPerson = new AjaxEventPerson($eventPersonId['id']);
    $data = $eventPerson->saveConfirm();

    $confirm = ControllerEventPerson::saveConfirmController($eventPersonId['id']);

    if ($confirm) {
      echo $confirm;
    }
    //Maestro::debbugPHP($confirm);
  }else{
    //existe algun error
  }

}
