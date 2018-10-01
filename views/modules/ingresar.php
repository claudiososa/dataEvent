
<div class="container">
	<div class="row align-items-center">
		<div class="col">
			<div class="card panelLogin">
				<div class="card-body cardBody">
					<h4 >LOGIN</h4>


					<form class="formLogin needs-validation"  action="" name="iniciosesion" method="POST" novalidate>
						<input style="background-image:url('img/man-user.svg');" class="form-control formUser" type="text" name="usuarioIngreso"  placeholder="Ingrese Usuario"  size="50" required autofocus  id="validationCustomUsername">
						<div class="invalid-feedback">
          Please choose a username.
        </div>

						<!-- <input class="form-control" name="user" type="text" placeholder="Ingrese Usuario" autofocus> -->


						<input style="background-image:url('img/locked-padlock.svg');" class="form-control formPass" type="password" name="passwordIngreso" placeholder="Ingrese Contraseña" size="50" required>
						<!-- <input class="form-control" name="password" type="text" placeholder="Ingrese Contraseña"> -->

					<button class="btn btn-primary btnLogin"  type="submit" id="btnvalidar" value="Ingresar">Ingresar</button>
					</form>
					<!-- <button type="button" class="btn btn-light btnLogin">Ingresar</button> -->
				</div>
			</div>


		</div>

	</div>


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
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>
