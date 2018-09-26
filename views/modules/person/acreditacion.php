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
		<h5 class="card-title" align="center">Buscar</h5>
	</div>

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
  $dato=$resultado->searchPersonController('form');
  //var_dump($dato);
	echo '<div class="card">';
	echo 'hola mundo';

	echo '<div class="table-responsive">';
  echo '<table class="table table-condensed">';
  echo '<thead>
              <tr>
                <th>Id</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>CUIL</th>
                <th>Tipo</th>
                <th>Curso</th>
                <th>Tutor1</th>
                <th>Tutor2</th>';
  foreach ($dato as $key => $item) {
    echo '<tr>
      <td>'.$item["person_id"].'</td>
      <td>'.$item["lastname"].'</td>
      <td>'.$item["firstname"].'</td>
      <td>'.$item["dni"].'</td>
      <td>'.$item["cuil"].'</td>
      <td>'.$item["type"].'</td>';
      echo '<td>';
      if($item["type"]=='Alumno'){
        $inscription = new ControllerCourse();
        //var_dump($inscription);
        $verificar = $inscription->searchStudentInCourseController($item["person_id"]);
        if($verificar){
          echo $verificar[0]['name'].' '.$verificar[0]['turn'];
        }else{
          echo "Sin Asignar";
        }

      }
      echo '</td>';
      echo '<td>tutor1</td>
      <td>tutor2</td>
      <td><a href="index.php?action=editarPerson&id='.$item["person_id"].'"><button class="btn btn-primary">Editar</button></a></td>';
      //echo ' <td><a href="index.php?action=person&idBorrar='.$item["person_id"].'"><button>Borrar</button></a></td>';
    echo '</tr>';
  }
  echo '</table>';
	echo '</div>';
	echo '</div';
}
?>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#name').hide();
});

</script>
