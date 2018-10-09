<nav class="navbar navbar-expand-lg ">



		<a class="navbar-brand logo">EventManager</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>


<div class="collapse navbar-collapse" id="navbarText">

		    <ul class="navbar-nav ml-auto">

		<?php
		if(isset($_SESSION["typeUser"]))
		{
			echo '<li class="nav-item active" id="1a"><a class="nav-link" href="index.php?action=ok">Inicio<span class="sr-only">(current)</span></a></li>';
			echo '<li class="nav-item active" id="1a"><a class="nav-link" href="index.php?action=personConfirmate">Confirmados<span class="sr-only">(current)</span></a></li>';
			echo '<li class="nav-item active" id="1a"><a class="nav-link" href="index.php?action=personAttendance">Asistencia<span class="sr-only">(current)</span></a></li>';
		}else{
     echo '<li><a href="index.php?action=ingresar">Ingreso</a></li>';
		}
 		?>



		<!-- <li class="nav-item"><a class="nav-link"href="index.php?action=salir">Cerrar Sesión</a></li> -->


		<?php


		if(isset($_SESSION["typeUser"])){
			echo '<li class="nav-item"><a class="nav-link">User: '.$_SESSION["typeUser"].'</a></li>';

		}
		 ?>

	</ul>
	<ul class="navbar-nav">
	  <li class="nav-item"><a class="nav-link"href="index.php?action=salir"><img class="img-fluid menu" alt="icono-off"style="max-width:1.25rem;" src="img/boton-de-apagado.svg"></a></li></ul>
</div>

</nav>
