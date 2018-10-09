<?php
//require_once "../models/crudPerson.php";

class ControllerPerson{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


	public function attendacePersonController($dateA,$eventPersonId){
		$result = Person::attendacePersonModel($dateA,$eventPersonId);
		return $result;
	}
	/**
	 * Buscar personas
	 */

	public function searchDniPersonController($dni){
		$result = Person::searchDniPersonModel($dni,'persons');
		return $result;
	}

	public function searchPersonIdController($personId){
		$result = Person::searchPersonIdModel($personId);
		return $result;
	}

	public function searchPersonController($typeSearch=NULL,$person_id=NULL){
		switch ($typeSearch) {
			case 'form':
				if(isset($_POST['searchPersonSubmit'])){
					$datosController = array (
																	'person_id'=>'',
																	'type'=>$_POST['typeuser'],
																	'firstname'=>$_POST['firstname'],
																	'lastname'=>$_POST['lastname'],
																	'dni'=>$_POST['dni']
																);
					$result = Person::searchPersonModel($datosController,'persons');
					return $result;
				}
				break;
				case 'dni':
					if(isset($_POST['searchPersonSubmit'])){
						$datosController = $_POST['dni'];
						$result = Person::searchDNIModel($datosController,'persons');
						return $result;
					}
					break;
				case 'inscription':
					if(isset($_POST['searchPersonSubmit'])){
						$datosController = array (
																		'person_id'=>'',
																		'type'=>$_POST['typeuser'],
																		'firstname'=>$_POST['firstname'],
																		'lastname'=>$_POST['lastname'],
																		'dni'=>$_POST['dni']
																	);
						$result = Person::searchPersonModel($datosController,'persons','inscription');
						return $result;
					}
					break;

			case 'person_id':
				$datosController = array (
															'person_id'=>$person_id,
															'type'=>'',
															'firstname'=>'',
															'lastname'=>'',
															'dni'=>''
														);
					$result = Person::searchPersonModel($datosController,'persons');
					return $result;
					break;

			default:
				# code...
				break;
		}

	}

	public function typePersonController($type=NULL){
		if(isset($type)){
			$datosController = array (
															'type'=>$_POST['typeuser'],
														);
			$result = Person::typePersonModel($datosController,'persons');
			return $result;
		}
	}
	//Registro usuarios

	public function registroPersonController(){
		if(isset($_POST["dniRegistro"])){

  		$datosController = array(
                      //"person"=>$_POST["personRegistro"],
                      "dni"=>$_POST["dniRegistro"],
                      "cuil"=>$_POST["cuilRegistro"],
                      "lastname"=>$_POST["lastnameRegistro"],
                      "firstname"=>$_POST["firstnameRegistro"],
                      "birthday"=>$_POST["birthdayRegistro"],
                      "sexo"=>$_POST["sexoRegistro"],
                      "phone"=>$_POST["phoneRegistro"],
                      "movil"=>$_POST["movilRegistro"],
  									  "email"=>$_POST["emailRegistro"],
  										"address"=>$_POST["addressRegistro"],
											"type"=>$_POST["typeRegistro"],
											"status"=>$_POST["statusRegistro"]

  									);
  		$respuesta = Person::registroPersonModel($datosController, "persons");

  		if ($respuesta =="success") {
  			return "success";
  		}else{
  			return "error";
  		}

		}
	}

	//Vista de usuarios
	//*******************************
  public function vistaPersonController($table,$type=NULL){
		$respuesta = Person::vistaPersonModel($table,$type);
		return $respuesta;
		//var_dump($respuesta[1][2]);
	}

	// Vista de usuarios - Listar Personas Confirmadas
	// ***********************************************

   public function vistaPersonControllerConfirmate($table,$type){
		$respuesta = Person::vistaPersonModelConfirmate($table,$type);
		return $respuesta;
		//var_dump($respuesta[1][2]);
	}

	// Editar usuarios
	//*********************************************************
	public function editarPersonController(){
		$datos = $_GET["id"];
		$respuesta=Person::editarPersonModel($datos,"persons");
		include_once 'views/modules/person/forms/formNewPerson.php';
	}


		//Actualizar Persona desde Pantalla de Confirmar datos
		//*********************************************************


		public function createPersonController($arrayPerson){
			$createPerson = Person::createPersonModel($arrayPerson,"persons");
			return $createPerson;
			if($createPerson == "success"){
				return 'success';
			}else {
				return "error";
			}
			//echo $respuesta;
		//}
	}

		public function updatePersonController($arrayPerson){
			$updatePerson = Person::updatePersonModel($arrayPerson,"persons");

			if($updatePerson == "success"){
				return 'success';
			}else {
				return "error";
			}
			//echo $respuesta;
		//}
	}



	/**
	 * cambiar confirmacion  de datos a 'si'
	 */

	public function actualizarConfirmarDatos($personId){
		$actualizar = Person::actualizarConfirmarDatos($personId,"persons");
		//return $personId."actualizar";
		if($actualizar == "success"){
			return 'success';
		}else {
			return "error";
		}
	}

	// Actualizar usuarios
	//*********************************************************
	public function actualizarPersonController(){
		if(isset($_POST["person_IdEditar"])){

			$datosController =  array(
                      "person_id"=>$_POST["person_IdEditar"],
											"dni"=>$_POST["dniRegistro"],
                      "cuil"=>$_POST["cuilRegistro"],
                      "lastname"=>$_POST["lastnameRegistro"],
                      "firstname"=>$_POST["firstnameRegistro"],
                      "birthday"=>$_POST["birthdayRegistro"],
                      "sexo"=>$_POST["sexoRegistro"],
                      "phone"=>$_POST["phoneRegistro"],
                      "movil"=>$_POST["movilRegistro"],
  									  "email"=>$_POST["emailRegistro"],
  										"address"=>$_POST["addressRegistro"],

                      /*"dni"=>$_POST["dniEditar"],
                      "cuil"=>$_POST["cuilEditar"],
                      "lastname"=>$_POST["lastnameEditar"],
                      "firstname"=>$_POST["firstnameEditar"],
                      "birthday"=>$_POST["birthdayEditar"],
                      "sexo"=>$_POST["sexoEditar"],
                      "phone"=>$_POST["phoneEditar"],
                      "movil"=>$_POST["movilEditar"],
  									  "email"=>$_POST["emailEditar"],
  										"address"=>$_POST["addressEditar"],*/
			);

		$respuesta = Person::actualizarPersonModel($datosController,"persons");
		if($respuesta == "success"){
			return 'success';
		}else {
			return "error";
		}
		//echo $respuesta;
	}
}


// Borar usuarios
//*********************************************************
public function borrarPersonController(){
	if(isset($_GET["idBorrar"])){
		$datos=$_GET["idBorrar"];
		$respuesta= Person::borrarPersonModel($datos,"persons");

		if($respuesta == "success"){
			header("location:index.php?action=person");
		}
	}
}


}

?>
