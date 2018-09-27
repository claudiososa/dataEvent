<?php
require_once "../../../controllers/controllerPerson.php";
require_once "../../../models/crudPerson.php";
require_once "../../../models/maestro.php";


class AjaxPerson{

  public $personId;

  public function confirmarDatos(){
    $dato = $this->personId;

    $guardar = ControllerPerson::actualizarConfirmarDatos($dato);
    Maestro::debbugPHP($guardar);
    echo $guardar;
  }
}

if (isset($_POST['personId'])) {
  $a = new AjaxPerson();
  $a->personId = $_POST['personId'];
  //Maestro::debbugPHP($a);
  $a->confirmarDatos();
}
