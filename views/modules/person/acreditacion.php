<?php
if($_SESSION["typeUser"]<>'Admin' && $_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}
?>
<section class="success" id="about">
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
		  	<input type="text" name="firstname" value="" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Nombre">
			</div>
			<div class="card-block"align="center">
				<button type="submit" class="btn btn-outline" name="searchPersonSubmit"value="Buscar">&nbsp;&nbsp;Buscar&nbsp;&nbsp;</button></div>
		</form>
	<br><br>
</section>

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
