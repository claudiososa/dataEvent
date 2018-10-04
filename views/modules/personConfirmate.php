<?php


if($_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}

 ?>
<section class""id="personConfirmate">
	<div class="container">
		<button type="button" class="btn btn-outline-light mt-5" id="btnTable">Descargar a Excel</button>
		<div class="row">
			<div class="col table-responsive">
				<table class="table table-bordered table-hover tablePerson mt-4" id="tablePerson">
				  <thead>
				    <tr>
							<th>Id</th>
							<th>Apellido</th>
					    <th>Nombre</th>
					    <th>DNI</th>
			        <th>Confirmado</th>
			        <th>Evento</th>
				    </tr>
				  </thead>
				  <tbody>
						<?php
 		 			$ver = new ControllerPerson();
 		 			//$lista = $ver->vistaPersonController('persons','Preceptor/a');
 		 			$lista = $ver->vistaPersonControllerConfirmate('persons','Confirmate');
 		 			$ver->borrarPersonController();

 		 			foreach ($lista as $key => $item) {
 		 				# code...

 		 			echo '<tr>
 		 				  <td>'.$item["person_id"].'</td>
 		 			      <td>'.$item["lastname"].'</td>
 		 			      <td>'.$item["firstname"].'</td>
 		 			      <td>'.$item["dni"].'</td>
 		 			      <td>'.$item["confirmation"].'</td>
 		 			      <td>'.$item["event_id"].'</td>

 		 				</tr>';
 		 			}

 		 			 ?>
				  </tbody>
				</table>

			</div>

		</div>

	</div>

</section>


	<?php
	if(isset($_GET["action"])){
		if($_GET["action"]=="cambio"){
			echo "Cambio Exitoso";
		}
	}
	 ?>
<script type="text/javascript">
$('#btnTable').click(function(event) {
	/* Act on the event */
	$('#tablePerson').tableExport();
});

</script>
