<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="views/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/style.css">
    <title>Data Event</title>
    <script src="views/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="views/js/pooper.min.js" type="text/javascript"></script>
    <script src="views/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="views/modules/person/js/validationPerson.js"></script>
    <script type="text/javascript" src="views/js/loginJs.js"></script>
    <script type="text/javascript" src="views/js/functions.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> -->
<!-- <script type="text/javascript" src="views/modules/person/js/validationPerson.js"></script> -->
    <script type="text/javascript" src="views/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="views/js/tableExport/xlsx.core.min.js"></script>
    <script type="text/javascript" src="views/js/tableExport/FileSaver.min.js"></script>
    <script type="text/javascript" src="views/js/tableExport/tableexport.min.js"></script>
    <!-- <script src="views/js/sweetalert.min.js"></script> -->
    <style media="screen">

    input.form-control.formUser:-webkit-autofill {
    	-webkit-box-shadow: 0 0 0 30px white inset;
    }


    input.form-control.formPass:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px white inset;

    }
    </style>

  </head>

<body>
<?php
//echo $_SESSION["typeUser"];
  //<link rel="stylesheet" href="views/bootstrap/bootstrap.min.css">

if(isset($_SESSION["typeUser"])){
	switch ($_SESSION["typeUser"]) {
		case 'Admin':
			include "modules/navegacion/navAdmin.php";
			break;
		case 'Alumno':
				include "modules/navegacion/navAlumno.php";
				break;
		case 'Docente':
				include "modules/navegacion/navDocente.php";
				break;
		case 'Preceptor/a':
						include "modules/navegacion/navPreceptor.php";
						break;
		case 'operador':
						include "modules/navegacion/navOperador.php";
						break;
		case 'Vicedirector/a':
						include "modules/navegacion/navVicedirector.php";
						break;

			default:
			# code...
			break;
	}
}else{
	include "modules/navegacion/navInicial.php";
}
?>

<?php
$mvc = new MvcController();
$mvc -> enlacesPaginasController();
 ?>


	<!-- <script src="views/js/validarRegistro.js" type="text/javascript"></script>
	<script src="views/js/jquery.min.js"type="text/javascript"></script>
	<script src="views/js/pooper.min.js" type="text/javascript"></script>
	<script src="views/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="views/js/loginJs.js"></script> -->
</body>

</html>
