<nav class="navbar navbar-expand-lg">


	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<a class="navbar-brand logo">DataEvent</a>


<div class="collapse navbar-collapse" id="navbarText">

		    <ul class="navbar-nav mr-auto">

		<?php
		if(isset($_SESSION["typeUser"]))
		{
			echo '<li class="nav-item active" id="1a"><a class="nav-link" href="index.php?action=ok">Inicio<span class="sr-only">(current)</span></a></li>';
		}else{
     echo '<li><a href="index.php?action=ingresar">Ingreso</a></li>';
		}
 		?>
		<li class="nav-item">
			<a class="nav-link" href="index.php?action=createCourse">Cursos</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="index.php?action=usuarios">Usuarios</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="index.php?action=createPerson">Crear Personas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="index.php?action=person">Listar Personas</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="index.php?action=searchPerson">Buscar Persona</a>
		</li>


		<!-- <li class="nav-item"><a class="nav-link"href="index.php?action=salir">Cerrar Sesión</a></li> -->


		<?php


		if(isset($_SESSION["typeUser"])){
			echo '<li class="nav-item"><a class="nav-link">Tipo de usuario: '.$_SESSION["typeUser"].'</a></li>';

		}
		 ?>
	 </a></li>
	</ul>
	  <span class="navbar-text"><a class="nav-link"href="index.php?action=salir"><img class="img-fluid" alt="icono-off"style="max-width:1.25rem;" src="img/boton-de-apagado.svg"></a></span>
</div>

</nav>
