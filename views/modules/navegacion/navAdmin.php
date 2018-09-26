
<nav class="navbar navbar-toggleable-md navbar-light bg-faded" id="estilonav">


	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<a class="navbar-brand" href="index.php">5159</a>



		<div class="collapse navbar-collapse" id="navbarSupportedContent">
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


		<li class="nav-item"><a class="nav-link"href="index.php?action=salir">Cerrar Sesión</a></li>
		<li class="nav-item"><a class="nav-link"href='#'>

		<?php


		if(isset($_SESSION["typeUser"])){
			echo 'Tipo de usuario: '.$_SESSION["typeUser"];

		}
		 ?>
	 </a></li>
	</ul>
</div>

</nav>
