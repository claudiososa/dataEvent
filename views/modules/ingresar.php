<div class="container">
	<div class="row align-items-center">
		<div class="col">
			<div class="card panelLogin">
				<div class="card-body cardBody">
					<h4>LOGIN</h4>

					<form class="formUser"  action="" name="iniciosesion" method="POST">
						<input class="form-control" type="text" name="usuarioIngreso"  placeholder="Ingrese Usuario" id="formulario"  size="50" required autofocus>

						<!-- <input class="form-control" name="user" type="text" placeholder="Ingrese Usuario" autofocus> -->


						<input class="form-control" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required>
						<!-- <input class="form-control" name="password" type="text" placeholder="Ingrese Contraseña"> -->

					<button class="btn btn-primary btnLogin"  type="submit" id="btnvalidar" value="Ingresar">Ingresar</button>
					</form>
					<!-- <button type="button" class="btn btn-light btnLogin">Ingresar</button> -->
				</div>
			</div>


		</div>

	</div>

<!-- <div class="row justify-content-md-center">
		<div class="col-md-6 col-md-offset-6 col-lg-4">
			 <form class="form-signin" action="" name="iniciosesion" method="POST">
			 <h3 class="form-signin-heading">Inicio de Sesión</h3>
			 <div class="input-group margin-bottom-sm">
		   	<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
				<input class="form-control" type="text" name="usuarioIngreso"  placeholder="Ingrese Usuario" id="formulario"  size="50" required autofocus>
			 </div>
		   <div class="input-group">
			 	<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
			 	<input class="form-control" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required>
			 </div>

			 <button class="btn btn-md btn-primary btn-block" type="submit" id="btnvalidar" value="Ingresar">Ingresar</button>
		 </form>
	 </div>
</div>  -->

</div>


<?php

$ingreso = new MvcController();
$ingreso->ingresoUsuarioController();

if(isset($_GET["action"])){
	if($_GET["action"]=="fallo"){
		echo "<div>Datos Incorrectos</div>";
	}

	if($_GET["action"]=="fallo3intentos"){
		echo "<div>Debe hacer el captcha</div>";
	}
}
 ?>
