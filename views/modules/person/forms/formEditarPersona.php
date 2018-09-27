<form method="post" onsubmit="return validarRegistro()">
  <input type="hidden" id="personIdEditar" name="personIdEditar" value='<?php echo $item["person_id"] ?>'>

  <div class="form-group">
    <label for="dniRegistro">DNI:</label>
    <input type="text" class="form-control" placeholder="DNI" name="dniRegistro" maxlength="8"  value='26899909'	id="dniRegistro" required>
  </div>

  <div class="form-group">
    <label for="lastnameRegistro">Apellido:</label>
    <input type="text" class="form-control" placeholder="Apellido" name="lastnameRegistro" value='<?php echo $item["lastname"] ?>'	id="lastnameRegistro" required autofocus>
  </div>

  <div class="form-group">
    <label for="firstnameRegistro">Nombre:</label>
    <input type="text" class="form-control" placeholder="Nombre" name="firstnameRegistro" value='<?php echo $item["firstname"] ?>'			 id="firstnameRegistro" required>
  </div>

  <div class="form-group">
    <label  for="emailRegistro">Email</label>
    <input type="email" class="form-control" placeholder="Email" name="emailRegistro" value='<?php echo $item["email"] ?>'	id="emailRegistro" >
  </div>

  <div class="form-group">
    <label for="movilRegistro">Teléfono Celular</label>
    <input type="text" class="form-control" placeholder="Teléfono Celular" name="movilRegistro" maxlength="15"  value='<?php echo $item["movil"] ?>' id="movilRegistro" >
  </div>

  <div class="form-group">
    <label for="direccionRegistro">Dirección</label>
      <input type="text" class="form-control" placeholder="Dirección" name="addressRegistro" value='<?php echo $item["address"] ?>' id="addressRegistro" >
  </div>

  <div class="form-group" align="center">
    <button type="submit" class="btn btn-primary" id="submitRegistro" value="Guardar">Guardar</button>
    <button class="btn btn-primary" id="confirmaDatos" value="Confirmar">Confirmar Datos</button>
  </div>
</form>
<!--
<div class="form-group">
  <label  for="cuilRegistro">CUIL:</label>

    <input type="text" class="form-control" placeholder="CUIL" name="cuilRegistro" maxlength="15"
    value='26899909'			  id="cuilRegistro" required>

</div> -->

<!-- <div class="form-group">
<label class="control-label" for="birthdayRegistro">Fecha Nac:</label>

    <input type="date" class="form-control" placeholder="Fecha Nacimiento" name="birthdayRegistro"
    value='2018-09-03'			 id="birthdayRegistro" >

</div> -->

<!-- <div class="form-group">
<label class="control-label" for="sexoRegistro">Sexo:</label>

    <select class="form-control" name="sexoRegistro" id="sexoRegistro">
      <option value="M" selected>Masculino</option><option value="F">Femenino</option>
    </select>


</div> -->

<!-- <div class="form-group">
  <label class="control-label" for="phoneRegistro">Telefono Fijo</label>

    <input type="text" class="form-control" placeholder="Teléfono Fijo" name="phoneRegistro" maxlength="15"
    value='44'			  id="phoneRegistro">

</div> -->
