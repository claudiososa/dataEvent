function validarDni() {
  var numeros = /^[0-9]+$/;
  let txtDni = document.getElementById('dni').value
  if (txtDni === "" || txtDni < 1000000 || txtDni > 99999999 || !numeros.test(txtDni)) {
    //swal('Atencion','El Dni ingresado no es correcto','error')

    alert('El Dni ingresado no es correcto')
    return false
  }else{
    return true
  }
}

function validarLastname(){

  let letras =  /^[A-Z_\s]+$/g

  let txtApellido = document.getElementById("lastnameRegistro").value;
  //debugger
  //alert(txtApellido)
  if(!letras.test(txtApellido)){
			// alert('ERROR: El campo APELLIDOno debe ir vacío o lleno de solamente espacios en blanco,MAYUSCULAS');
      // $('#lastnameRegistro').focus()
			return false;
	}
}

function validarPersona() {

  let letras=  /^[A-Z_\s]+$/;

  let txtApellido = document.getElementById("lastnameRegistro").value;
  let txtNombre = document.getElementById("firstnameRegistro").value;
  var txtCorreo = document.getElementById('emailRegistro').value;
  let txtMovil = document.getElementById("movilRegistro").value;
  let txtProvincia = document.getElementById("selProvinceRegistro").value;




  console.log(txtApellido,txtNombre,txtCorreo,txtMovil,txtProvincia)

  if(txtApellido == "" || (txtApellido.trim()).length == 0  || !letras.test(txtApellido)){
      swal('Atencion','Apellido no valido, por favor revisar el dato ingresado, Solo acepta MAYUSCULAS','error')
      .then((value) => {
        $('#lastnameRegistro').focus()
      });
      return false;
		}

  if(txtNombre == "" || (txtNombre.trim()).length == 0  || !letras.test(txtNombre)){
    swal('Atencion','Nombre no valido, por favor revisar el dato ingresado, Solo acepta MAYUSCULAS','error')
    .then((value) => {
      $('#firstnameRegistro').focus()
    });
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
    swal('Atencion','Debe seleccionar una provincia','error')
    .then((value) => {
      $('#selProvinceRegistro').focus()
    });
    return false;
  }
  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}
