<?php
require_once "../../../controllers/controllerPerson.php";
require_once "../../../models/crudPerson.php";
require_once "../../../models/maestro.php";


class AjaxPerson {

  public $personId;
  public $lastname;
  public $firstname;
  public $dni;
  public $email;
  public $movil;
  public $location;


  public function updatePerson(){
    //$dato = $this->personId;
    $arrayPerson = array(
            'personId' => $this->personId,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'dni' => $this->dni,
            'email' => $this->email,
            'movil' => $this->movil,
            'location' => $this->location
    );
    //Maestro::debbugPHP($arrayPerson);
    $guardar = ControllerPerson::updatePersonController($arrayPerson);
    echo $guardar;
  }
}

if (isset($_POST['personId'])) {

  $a = new AjaxPerson();

  $a->personId = $_POST['personId'];
  $a->lastname = $_POST['lastname'];
  $a->firstname = $_POST['firstname'];
  $a->dni = $_POST['dni'];
  $a->email = $_POST['email'];
  $a->movil = $_POST['movil'];
  $a->location = $_POST['location'];
//Maestro::debbugPHP($a);
  $a->updatePerson();
}