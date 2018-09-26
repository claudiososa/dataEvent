<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="views/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/style.css">
    <title>Data Event</title>
    <script src="views/js/jquery.min.js" type="text/javascript"></script>
    <script src="views/js/pooper.min.js" type="text/javascript"></script>
    <script src="views/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="views/js/loginJs.js"></script>
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
