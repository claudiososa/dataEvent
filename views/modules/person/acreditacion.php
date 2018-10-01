<?php
if($_SESSION["typeUser"]<>'Admin' && $_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}
?>

<div class="container containerSearch">
	<div class="row rowSearchPerson">
		<div class="col-sm-6">
			<div class="card ">
				<div class="card-body cardBodySearch">
					<h5 class="card-title">Buscar Persona:</h5>


					<form  class="formSearchPerson" align="center" action="" name="searchPerson" method="POST">

								<div class="input-group divSearchDni">
									<div class="input-group-prepend">
										<span class="input-group-text dni" ><img src="img/man-user.svg" alt=""></span>
									</div>
									<input  class="form-control searchDni" type="text" name="dni"  placeholder="Buscar DNI"  autofocus>
								</div>
								<div class="input-group divSearchApellido">
									<div class="input-group-prepend">
										<span class="input-group-text apellido"><img src="img/man-user.svg" alt=""></span>

									</div>
									<input class="form-control searchApellido" type="text" name="lastname"  placeholder="Apellido">

								</div>
<!--
								<div id="name">
									<input type="text" name="lastname" value="" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Apellido">
								</div> -->

						<!-- <div class="input-group">

								<input  class="form-control searchDni" type="text" name="dni"  placeholder="Buscar por DNI"  autofocus>
								<div class="input-group-prepend">
									<span class="input-group-text" id="validationTooltipUsernamePrepend"><img src="img/locked-padlock.svg" alt=""></span>
								</div>


						</div> -->

						<!-- <input class="form-control" name="user" type="text" placeholder="Ingrese Usuario" autofocus> -->

						<!-- <input style="background-image:url('img/locked-padlock.svg');" class="form-control formPass" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required> -->


					<button class="btn btn-primary btnSearchPerson"  name="searchPersonSubmit" type="submit" id="btnvalidar" value="Buscar">Buscar</button>
					</form>
					<!-- <button type="button" class="btn btn-light btnLogin">Ingresar</button> -->
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body cardBodyModificarPerson">
					<h5 class="card-title">Agregar Persona</h5>
					<button class="btn btn-primary btnSearchPerson" href="index.php?action=createPerson" name="searchPersonSubmit">Nueva Persona</button>
				</div>
			</div>
		</div>
	</div>

</div><br>
<!-- <section class="success" id="about">
	<div class="card-block">
		<h5	 class="card-title" align="center">Agregar Persona :</h5>
	</div>
	<div class="card-block" align="center"><a class="btn btn-outline"  href="index.php?action=createPerson" >Nueva Persona</a></div>
	<hr>

	<div class="card-block">
		<form class="form-inline" action="" method="post">
			<br><br>
			<input type="text" name="dni" value="" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="DNI">
			<div id="name">
		  	<input type="text" name="lastname" value="" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Apellido">
			</div>
			<div class="card-block"align="center">
				<button type="submit" class="btn btn-outline" name="searchPersonSubmit"value="Buscar">&nbsp;&nbsp;Buscar&nbsp;&nbsp;</button></div>
		</form>
	<br><br>
</section> -->

<?php
if($_POST){
  $resultado = new ControllerPerson();
  $dato=$resultado->searchPersonController('dni');


	if ($dato == 0) {
		echo "<p>Persona no encontrada, revise el numero DNI</p>";
	}else{
		//var_dump($dato);
		foreach ($dato as $key => $item) {
			require_once "forms/formEditarPersona.php";
		}

	}


}
?>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('#name').hide();
});

</script>
