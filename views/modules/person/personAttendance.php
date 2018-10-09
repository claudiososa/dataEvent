<script type="text/javascript" src="views/js/printCertificate.js"></script>
<?php
if($_SESSION["typeUser"]<>'operador'){
	header("location:index.php?action=ingresar");
	exit();
}
?>
<section class""id="personConfirmate">
	<div class="container">


		<button type="button" class="btn btn-outline-light mt-5" id="btnTable" >Descargar a Excel</button>
		<!-- <button type="button" class="btn btn-outline-light mt-5" id="btnCertificadoColor">Descargar Certificados Color</button>
		<button type="button" class="btn btn-outline-light mt-5" id="btnCertificadoTexto">Descargar Certificados solo Datos</button> -->
		<div class="row">
			<div class="col table-responsive">
				<table class="table table-bordered table-hover tablePerson mt-4" id="tablePerson">
				  <thead style="background-color:#003764;color:white;">
				    <tr>
							<th>Id</th>
							<th>Apellido</th>
					    <th>Nombre</th>
					    <th>DNI</th>
			        <th>Lunes 08</th>
							<th>Martes 09</th>
							<th>Miercoles 10</th>
							<th>Jueves 11</th>
							<th>Viernes 12</th>
							<th>Total</th>
				    </tr>
				  </thead>
				  <tbody>
						<?php


					$ver = new ControllerPerson();
					//$lista = $ver->vistaPersonController('persons','Preceptor/a');
					$lista = $ver->vistaPersonControllerConfirmate('persons','Confirmate');

					$dates = [
						'1'=>'2018-10-08',
						'2'=>'2018-10-09',
						'3'=>'2018-10-10',
						'4'=>'2018-10-11',
						'5'=>'2018-10-12',
					];

 		 			foreach ($lista as $key => $item) {
						$present = 0;
						$att = new ControllerPerson();
 		 				echo '<tr>
 		 				  <td>'.$item["person_id"].'</td>
 		 			      <td>'.$item["lastname"].'</td>
 		 			      <td>'.$item["firstname"].'</td>
 		 			      <td>'.$item["dni"].'</td>';
					  foreach ($dates as $key => $value) {
								$data = $att->attendacePersonController($value,$item['id']);
								if ($data =="Presente") {
									$present++;
								}
					  	  echo '<td>'.$data.'</td>';
					  }
						echo ' <td>'.$present.'</td>';
						echo '</tr>';
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
var ExportButtons = document.getElementById('tablePerson');

var instance = new TableExport(ExportButtons, {
    formats: ['xls'],
    exportButtons: false
});

//                                        // "id" of selector    // format
var exportData = instance.getExportData()['tablePerson']['xls'];

var XLSbutton = document.getElementById('btnTable');

XLSbutton.addEventListener('click', function (e) {
    //                   // data          // mime              // name              // extension
    instance.export2file(exportData.data, exportData.mimeType, exportData.filename, exportData.fileExtension);
});

</script>
