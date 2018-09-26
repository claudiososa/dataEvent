<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/png" href="img/escudoicono.png" />
	<link rel="stylesheet" href="views/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="views/css/style.css">
  <title>DataEvent</title>
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
		case 'Director/a':
						include "modules/navegacion/navDirector.php";
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
<br><br>
<!-- Footer -->
<footer class="text-center">
		<div class="footer-above">
				<div class="container">
						<div class="row">
								<div class="footer-col col-md-6">
										<h3>Colegio N° 5159</h3>
										<p>Tel: 3875619585<br>
										Av. Hipodromo de San Isidro Nº 750
												<br>Salta, Argentina</p>
								</div>
								<div class="footer-col col-md-6">

										<ul class="list-inline">
												<li class="list-inline-item">
														<a class="btn-social btn-outline" href="https://es-la.facebook.com/colegio5159/" target="_blank"><i class="fa fa-fw fa-facebook"></i></a>
												</li>

												<li class="list-inline-item">
														<a class="btn-social btn-outline" href="https://twitter.com/colegio5159" target="_blank"><i class="fa fa-fw fa-twitter"></i></a>
												</li>

											 		<li class="list-inline-item">
											 				<a class="btn-social btn-outline" href="https://www.youtube.com/channel/UClOHoEv4-gkvCeYLaXRGegg" target="_blank"><i class="fa fa-fw fa-youtube"></i></a>
											 		</li>
													<li class="list-inline-item">
											 				<a class="btn-social btn-outline" href="http://www.colegio5159.com.ar/sitioweb/"><i class="fa fa-fw fa-laptop" target="_blank"></i></a>
											 		</li>
													<li class="list-inline-item">
											 				<a class="btn-social btn-outline"  href="https://www.google.com.ar/maps/place/Colegio+5159/@-24.7880002,-65.4586804,15z/data=!4m5!3m4!1s0x0:0x3dfe960212925c9f!8m2!3d-24.7880002!4d-65.4586804" target="_blank"><i class="fa fa-fw fa-map-marker"></i></a>
											 		</li>

										</ul>


								</div>

						</div>
				</div>
		</div>
		<div class="footer-below">
				<div class="container">
						<div class="row">
								<div class="col-lg-12">
										Copyright &copy; www.colegio5159.com.ar 2017
								</div>
						</div>
				</div>
		</div>
</footer>
	<script src="views/js/validarRegistro.js" type="text/javascript">

	</script>	<!-- Latest compiled and minified JavaScript -->
	<script src="views/js/jquery.min.js" type="text/javascript"></script>
	<script src="views/js/pooper.min.js" type="text/javascript"></script>
	<script src="views/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="views/js/loginJs.js"></script>
</body>

</html>
