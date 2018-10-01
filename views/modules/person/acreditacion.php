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
									<input  class="form-control searchDni" type="text" name="dni" id="dni" placeholder="Buscar DNI"  autofocus>
								</div>


					</form>
					<button class="btn btn-primary btnSearchPerson"  name="searchPersonSubmit"  id="btnSearchPerson" value="Buscar">Buscar</button>
					<!-- <button type="button" class="btn btn-light btnLogin">Ingresar</button> -->
				</div>
			</div>
		</div>

	</div>

</div><br>

<div class="containerPerson" id="formEditPerson">
	<?php require_once "forms/formEditarPersona.php"; ?>
</div>

<?php
if($_POST){
  $resultado = new ControllerPerson();
  $dato=$resultado->searchPersonController('dni');


	if ($dato == 0) {
		echo "<p>Persona no encontrada, revise el numero DNI</p>";
	}else{
		//var_dump($dato);


	}


}
?>
</div>

<script type="text/javascript" src="views/modules/person/js/validationPerson.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#name').hide();
	$('#formEditPerson').hide();
});

</script>
