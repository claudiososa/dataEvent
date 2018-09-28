<div class="containerPerson">

  <div class="card cardFormPerson">
    <div class="card-body cardBodyPerson">

      <form method="post" onsubmit="return validarRegistro()" class="formPerson">
        <input type="hidden" id="personIdEditar" name="personIdEditar" value='<?php echo $item["person_id"] ?>'>

<h3>Datos Encontrados:</h3>
        <div class="form-group">
          <!-- <label for="dniRegistro">DNI:</label> -->
          <input type="text" class="form-control personDni" placeholder="DNI" name="dniRegistro" maxlength="8"  value='26899909'	id="dniRegistro" required>
        </div>

        <div class="form-group">
          <!-- <label for="lastnameRegistro">Apellido:</label> -->
          <input type="text" class="form-control personLastName" placeholder="Apellido" name="lastnameRegistro" value='<?php echo $item["lastname"] ?>'	id="lastnameRegistro" required>
        </div>

        <div class="form-group">
          <!-- <label for="firstnameRegistro">Nombre:</label> -->
          <input type="text" class="form-control personName" placeholder="Nombre" name="firstnameRegistro" value='<?php echo $item["firstname"] ?>'			 id="firstnameRegistro" required>
        </div>

        <div class="form-group">
          <!-- <label  for="emailRegistro">Emailsdaf</label> -->
          <input type="email" class="form-control personEmail" placeholder="Email" name="emailRegistro" value='<?php echo $item["email"] ?>'	id="emailRegistro" >
        </div>

        <div class="form-group">
          <!-- <label for="movilRegistro">Teléfono Celular</label> -->
          <input type="text" class="form-control personPhone" placeholder="Teléfono Celular" name="movilRegistro" maxlength="15"  value='<?php echo $item["movil"] ?>' id="movilRegistro" >
        </div>
          <!-- Editar -->
        <div class="form-inline">
          <label for="direccionRegistro">Provincia</label>
          <input type="text" class="form-control" placeholder="Provincia" name="addressRegistro" value='<?php echo $item["address"] ?>' id="addressRegistro" >
        </div>

        <div class="form-inline">
          <label for="direccionRegistro">Localidad</label>
          <input type="text" class="form-control" placeholder="Localidad" name="addressRegistro" value='<?php echo $item["address"] ?>' id="addressRegistro" >
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Tipo</label>
          <input type="text" class="form-control" placeholder="Tipo" name="addressRegistro" value='<?php echo $item["address"] ?>' id="addressRegistro" >
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Nivel</label>
          <input type="text" class="form-control" placeholder="Nivel" name="addressRegistro" value='<?php echo $item["address"] ?>' id="addressRegistro" >
        </div>

        <div class="form-group" align="center">
          <button type="submit" class="btn btn-primary" id="submitRegistro" value="Guardar">Guardar</button>

        </div>
      </form>

      <button class="btn btn-primary" id="confirmaDatos" value="Confirmar">Confirmar Datos</button>

    </div>
  </div>
</div>
