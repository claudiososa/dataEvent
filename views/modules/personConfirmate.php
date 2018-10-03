<?php


if($_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}

 ?>
<h1>Personas Confirmate</h1>

	<table class="table table-condensed">
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

	<?php
	if(isset($_GET["action"])){
		if($_GET["action"]=="cambio"){
			echo "Cambio Exitoso";
		}
	}
	 ?>