<!-- <div class="containerPerson"> -->

  <div class="card cardFormPerson">
    <div class="card-body cardBodyPerson">

      <form method="post" onsubmit="return validarRegistro()" class="formPerson" id="formPerson">
        <input type="hidden" id="saveStatus" name="saveStatus" value='edit'>
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
          <select class="form-control personProvincia" id="selProvinceRegistro">
             <option value="SIN REGISTRAR">Seleccione</option>
             <option value="BUENOS AIRES">Bs. As.</option>
             <option value="CATAMARCA">Catamarca</option>
             <option value="CHACO">Chaco</option>
             <option value="CHUBUT">Chubut</option>
             <option value="CORDOBA">Cordoba</option>
             <option value="CORRIENTES">Corrientes</option>
             <option value="ENTRE RIOS">Entre Rios</option>
             <option value="FORMOSA">Formosa</option>
             <option value="JUJUY">Jujuy</option>
             <option value="LA PAMPA">La Pampa</option>
             <option value="LA RIOJA">La Rioja</option>
             <option value="MENDOZA">Mendoza</option>
             <option value="MISIONES">Misiones</option>
             <option value="NEUQUEN">Neuquen</option>
             <option value="RIO NEGRO">Rio Negro</option>
             <option value="SALTA">Salta</option>
             <option value="SAN JUAN">San Juan</option>
             <option value="SAN LUIS">San Luis</option>
             <option value="SANTA CRUZ">Santa Cruz</option>
             <option value="SANTA FE">Santa Fe</option>
             <option value="SGO DEL ESTERO">Sgo. del Estero</option>
             <option value="TIERRA DEL FUEGO">Tierra del Fuego</option>
             <option value="TUCUMAN">Tucuman</option>
          </select>
        </div>

        <div class="form-inline">
          <label for="direccionRegistro">Localidad:</label>
          <input type="text" class="form-control personLocalidad" placeholder="Ingrese Localidad" name="addressRegistro" value='<?php echo $item["address"] ?>' id="locationRegistro" >
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Tipo:</label>
          <select class="form-control personTipo" id="selPersonTipo">
            <option value="1">Supervisor</option>
            <option value="2">Profesor</option>

          </select>
        </div>
        <div class="form-inline">
          <label for="direccionRegistro">Nivel:</label>
          <select class="form-control personNivel" id="selPersonNivel">
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
<!-- </div> -->
<!-- <script type="text/javascript" src="views/modules/person/js/validationPerson.js"></script> -->
