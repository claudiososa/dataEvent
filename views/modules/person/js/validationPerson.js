function validarPersona() {

  let letras=  /^[A-Z_\s]+$/;

  let txtApellido = document.getElementById("lastnameRegistro").value;
  let txtNombre = document.getElementById("firstnameRegistro").value;
  var txtCorreo = document.getElementById('emailRegistro').value;
  let txtMovil = document.getElementById("movilRegistro").value;
  let txtProvincia = document.getElementById("selProvinceRegistro").value;




  console.log(txtApellido,txtNombre,txtCorreo,txtMovil,txtProvincia)

  if(txtApellido == null || txtApellido.length == 0 || !letras.test(txtApellido)){
			alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}

  if(txtNombre == null || txtNombre.length == 0 || !letras.test(txtNombre)){
    alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blancdfsfo');
    return false;
  }


  //Test correo no oblig
  if(txtCorreo && !(/\S+@\S+\.\S+/.test(txtCorreo))){
  	alert('ERROR: Debe escribir un correo válido');
  	return false;
  }



    //Test movil no oblig
  if( isNaN(txtMovil) ) {
    alert('ERROR: Debe escribir un cel válido');
    return false;
  }


    //Test prov oblig
  if(  txtProvincia == 'SIN REGISTRAR' ) {
      alert('ERROR: Debe escribir un A PROV');
    return false;
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}
