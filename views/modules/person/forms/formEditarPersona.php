<div class="containerPerson">

  <div class="card cardFormPerson">
    <div class="card-body cardBodyPerson">

      <form method="post" onsubmit="return validarRegistro()" class="formPerson">
        <input type="hidden" id="personIdEditar" name="personIdEditar" value='<?php echo $item["person_id"] ?>'>

        <h3>Datos Encontrados:</h3>
        <div class="form-group formGroupPerson">
          <!-- <label for="dniRegistro">DNI:</label> -->
          <input type="text" class="form-control personDni" placeholder="DNI" name="dniRegistro" maxlength="8"  value='<?php echo $item["dni"] ?>'	id="dniRegistro" readonly required>
        </div>

        <div class="form-group formGroupPerson">
          <!-- <label for="lastnameRegistro">Apellido:</label> -->
          <input type="text" class="form-control personLastName" placeholder="Apellido" name="lastnameRegistro" value='<?php echo $item["lastname"] ?>'	id="lastnameRegistro" required>
        </div>

        <div class="form-group formGroupPerson">
          <!-- <label for="firstnameRegistro">Nombre:</label> -->
          <input type="text" class="form-control personName" placeholder="Nombre" name="firstnameRegistro" value='<?php echo $item["firstname"] ?>'			 id="firstnameRegistro" required>
        </div>

        <div class="form-group formGroupPerson">
          <!-- <label  for="emailRegistro">Emailsdaf</label> -->
          <input type="email" class="form-control personEmail" placeholder="Email" name="emailRegistro" value='<?php echo $item["email"] ?>'	id="emailRegistro" >
        </div>

        <div class="form-group formGroupPerson">
          <!-- <label for="movilRegistro">Teléfono Celular</label> -->
          <input type="text" class="form-control personPhone" placeholder="Teléfono Celular" name="movilRegistro" maxlength="15"  value='<?php echo $item["movil"] ?>' id="movilRegistro" >
        </div>
          <!-- Editar -->
        <div class="form-inline">
          <label for="direccionRegistro">Provincia:</label>
          <select class="form-control personProvincia" id="">
             <option value="Buenos Aires">Bs. As.</option>
             <option value="Catamarca">Catamarca</option>
             <option value="Chaco">Chaco</option>
             <option value="Chubut">Chubut</option>
             <option value="Cordoba">Cordoba</option>
             <option value="Corrientes">Corrientes</option>
             <option value="Entre Rios">Entre Rios</option>
             <option value="Formosa">Formosa</option>
             <option value="Jujuy">Jujuy</option>
             <option value="La Pampa">La Pampa</option>
             <option value="La Rioja">La Rioja</option>
             <option value="Mendoza">Mendoza</option>
             <option value="Misiones">Misiones</option>
             <option value="Neuquen">Neuquen</option>
             <option value="Rio Negro">Rio Negro</option>
             <option value="Salta">Salta</option>
             <option value="San Juan">San Juan</option>
             <option value="San Luis">San Luis</option>
             <option value="Santa Cruz">Santa Cruz</option>
             <option value="Santa Fe">Santa Fe</option>
             <option value="Sgo. del Estero">Sgo. del Estero</option>
             <option value="Tierra del Fuego">Tierra del Fuego</option>
             <option value="Tucuman">Tucuman</option>
          </select>
        </div>

        <div class="form-inline">
          <label for="direccionRegistro">Localidad:</label>
          <input type="text" class="form-control personLocalidad" placeholder="Ingrese Localidad" name="addressRegistro" value='<?php echo $item["address"] ?>' id="" >
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Tipo:</label>
          <select class="form-control personTipo" id="">
            <option value="1">Supervisor</option>
            <option value="2">Profesor</option>

          </select>
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Nivel:</label>
          <select class="form-control personNivel" id="">
            <option value="1">Privado</option>
            <option value="2">Estatal</option>

          </select>
        </div>

        <!-- <div class="form-group" align="center">
          <button type="submit" class="btn btn-primary" id="submitRegistro" value="Guardar">Guardar</button>

        </div> -->
      </form>
      <div align="center" class="btnFormPerson">
      <button class="btn btn-primary btnConfirmardatos" id="confirmaDatos" value="Confirmar">Confirmar Datos</button>
      <button class="btn btn-primary btnPresente" id="tomarAsistencia" value="Asistencia">Presente</button>
    </div>
    </div>
  </div>
</div>
