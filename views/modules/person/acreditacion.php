<?php
if($_SESSION["typeUser"]<>'Admin' && $_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}
?>
<div class="container containerSearch">
	<div class="row rowSearchPerson ">
		<div class="col-md-6  offset-md-3 col-xs-12">
			<div class="card" style="width:360px;border-radius:10px;margin:auto;">
				<div class="card-body cardBodySearch">
					<!-- <h5 class="card-title mb-1">Buscar Persona:</h5> -->


					<form  class="form-inline formSearchPerson" action="" name="searchPerson" id="formSearchPerson" method="POST">

								<div class="input-group divSearchDni pr-2">
									<div class="input-group-prepend">
										<span class="input-group-text dni" ><img src="img/man-user.svg" alt=""></span>
									</div>
									<input  class="form-control searchDni" type="text" name="dni" id="dni" placeholder="DNI"  autofocus>
								</div>

								<button class="btn btn-primary btnSearchPerson"  name="searchPersonSubmit"  id="btnSearchPerson" value="Buscar">Buscar</button>

					</form>
					<!-- <button type="button" class="btn btn-light btnLogin">Ingresar</button> -->
				</div>
			</div>
		</div>

	</div>

</div>
<section id="eventImg" class="pt-5">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-8">
				<img  class="banner1 pt-3 img-fluid rounded mx-auto d-block"src="img/fondo.jpg" alt="bannerCIENASUD2018">

			</div>

		</div>
	</div>

</section>
<div class="containerPerson mt-4" id="formEditPerson">
	<?php require_once "forms/formEditarPersona.php"; ?>
</div>

<?php
// if($_POST){
//   $resultado = new ControllerPerson();
//   $dato=$resultado->searchPersonController('dni');
//
//
// 	if ($dato == 0) {
// 		echo "<p>Persona no encontrada, revise el numero DNI</p>";
// 	}else{
// 		//var_dump($dato);
//
//
// 	}
//
//
// }
?>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('#name').hide();
	$('#formEditPerson').hide();
});

</script>
