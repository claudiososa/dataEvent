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
		<button type="button" class="btn btn-outline-light mt-5" id="btnCertificadoColor">Descargar Certificados Color</button>
		<button type="button" class="btn btn-outline-light mt-5" id="btnCertificadoTexto">Descargar Certificados solo Datos</button>
		<div class="row">
			<div class="col table-responsive">
				<table class="table table-bordered table-hover tablePerson mt-4" id="tablePerson">
				  <thead style="background-color:#003764;color:white;">
				    <tr>
							<th>Id</th>
							<th>Apellido</th>
					    <th>Nombre</th>
					    <th>DNI</th>
			        <th>Confirmado</th>
			        <th>Fecha Conf.</th>
							<th>Certificado</th>
				    </tr>
				  </thead>
				  <tbody>
						<?php
 		 			$ver = new ControllerPerson();
 		 			//$lista = $ver->vistaPersonController('persons','Preceptor/a');
 		 			$lista = $ver->vistaPersonControllerConfirmate('persons','Confirmate');
					//var_dump($lista);
 		 			$ver->borrarPersonController();

 		 			foreach ($lista as $key => $item) {
						$date = new DateTime($item["date_confirmation"]);

 		 				echo '<tr>
 		 				  <td>'.$item["person_id"].'</td>
 		 			      <td>'.$item["lastname"].'</td>
 		 			      <td>'.$item["firstname"].'</td>
 		 			      <td>'.$item["dni"].'</td>
								<td>'.$item["confirmation"].'</td>
								<td>'.$date->format('d-m-Y').'</td>

								<td><button class="btn btn-outline-info" id="buttonToPrint'.$item["person_id"].'">Generar Certificado</button></td>


 		 				</tr>';
						//<td><button class="btn btn-success" id="buttonToPrint'.$item["person_id"].'">Imprimir Certificado</button></td>
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
