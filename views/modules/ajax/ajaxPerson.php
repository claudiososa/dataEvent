<?php
require_once "../../../controllers/controllerPerson.php";
require_once "../../../models/crudPerson.php";
require_once "../../../models/maestro.php";
require_once "../../../models/tfpdf/tfpdf.php";

class AjaxPerson {

  public $personId;
  public $lastname;
  public $firstname;
  public $dni;
  public $email;
  public $movil;
  public $location;
  public $province;


  public function createPerson(){
    //$dato = $this->personId;
    $arrayPerson = array(
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'dni' => $this->dni,
            'email' => $this->email,
            'movil' => $this->movil,
            'location' => $this->location,
            'province' => $this->province
    );
    //Maestro::debbugPHP($arrayPerson);
    $create = ControllerPerson::createPersonController($arrayPerson);
    //Maestro::debbugPHP($guardar);
    echo $create;
  }

  public function updatePerson(){
    //$dato = $this->personId;
    $arrayPerson = array(
            'personId' => $this->personId,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'dni' => $this->dni,
            'email' => $this->email,
            'movil' => $this->movil,
            'location' => $this->location,
            'province' => $this->province
    );
    //Maestro::debbugPHP($arrayPerson);
    $guardar = ControllerPerson::updatePersonController($arrayPerson);
    //Maestro::debbugPHP($guardar);
    echo $guardar;
  }

  public function createPdf($data){
    $pdf = new tFPDF();
    $pdf->AddPage(L,A4);
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->AddFont('DejaVu', 'B', 'DejaVuSansCondensed-Bold.ttf', true);
    $pdf->SetFont('DejaVu','',20);
    $pdf->Image("../../../img/certificado.jpg",0,0);
    $nombreCompleto =$data['lastname'].", ".$data['firstname'];
    $longitudCompleta = str_pad($nombreCompleto, 45);
    $pdf->Ln(63);
    $pdf->Write (7,"                     ");
    $pdf->Cell(100,10,$nombreCompleto,0,0);
    $pdf->Cell(70);
    $pdf->Cell(40,10,$data['dni'],0,0,'C');
    $pdf->Write (7," ");
    $pdf->Write (7,"                        ");
    $pdf->Write (7,"                                                  ");
    $pdf->Write (7,"                                     ");
    $nombreArchivo = $data['dni'].".pdf";
    $pdf->Output("../../download/$nombreArchivo","F");
  }

  public function searchDni(){
    $person=0;
    $search = ControllerPerson::searchDniPersonController($this->dni);
    //Maestro::debbugPHP($search);
    echo $search;
  }

  public function searchPersonId(){
    $searchPerson = ControllerPerson::searchPersonIdController($this->personId);
    return $searchPerson;
  }
}

/******************************************************/

if (isset($_POST['personId'])) {
//Maestro::debbugPHP($_POST);
  $a = new AjaxPerson();

  $a->personId = $_POST['personId'];
  $a->lastname = $_POST['lastname'];
  $a->firstname = $_POST['firstname'];
  $a->dni = $_POST['dni'];
  $a->email = $_POST['email'];
  $a->movil = $_POST['movil'];
  $a->location = $_POST['location'];
  $a->province = $_POST['province'];
//Maestro::debbugPHP($a);
  $a->updatePerson();
}

/******************************************************/

if (isset($_POST['searchDni'])) {
  $person = new AjaxPerson();
  $person->dni = $_POST['dni'];


  $person->searchDni();
}

/******************************************************/

if (isset($_POST['saveNew'])) {

  $a = new AjaxPerson();

  $a->personId = $_POST['personId'];
  $a->lastname = $_POST['lastname'];
  $a->firstname = $_POST['firstname'];
  $a->dni = $_POST['dni'];
  $a->email = $_POST['email'];
  $a->movil = $_POST['movil'];
  $a->location = $_POST['location'];
  $a->province = $_POST['province'];
//Maestro::debbugPHP($a);
  $a->createPerson();
}

if (isset($_POST['personIdPrint'])) {
  $person = new AjaxPerson();
  $person->personId = $_POST['personIdPrint'];

  $data = $person->searchPersonId();
    //Maestro::debbugPHP($data);
  echo $data['dni'];
  $person->createPdf($data);

}
