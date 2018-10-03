<?php

if(!isset($_SESSION["typeUser"])){
	header("location:index.php?action=ingresar");
	exit();
}

//echo $_SESSION["typeUser"];
if(isset($_SESSION["typeUser"])){
	switch ($_SESSION["typeUser"]) {
      case 'Preceptor/a':
            include "views/modules/person/inicioPreceptor.php";
            break;
      case 'operador':
            include "views/modules/person/inicioOperador.php";
            break;

      default:
      # code...
      break;
    }
    }

?>



<!--<br><br>

    <div class="container">

          <div class="starter-template">

              <center>
              <h3>Bienvenidos</h3>
<br><img src="img/escudo.png" alt="EscudoColegio5159">
</center>
          </div>

        </div>
<br><br>
