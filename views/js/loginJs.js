
$(document).ready(function() {
  var estado = 0


/**
 * Evento clic para Boton Confirmar Datos (guarda todos los datos de persona y tipo de visitante)
 */
  $("#confirmaDatos").click(function(event) {

    let estado = 'no'
    let personId = $("#personIdEditar").val();
    let lastname = $("#lastnameRegistro").val();
    let firstname = $("#firstnameRegistro").val();
    let dni = $("#dniRegistro").val();
    let email = $("#emailRegistro").val();
    let movil = $("#movilRegistro").val();
    let location = $("#firstnameRegistro").val();

    //alert(personId+lastname+firstname+dni+email+movil+location);
    function  confirmarDatos(personId){
      estado = 'si'
      return new Promise((resolve,reject) => {
        $.ajax({
          url: 'views/modules/ajax/ajaxPerson.php',
          type: 'POST',
        //  dataType: 'json',
          data: {personId:personId,lastname:lastname,firstname:firstname,dni:dni,email:email,movil:movil,location:location}
        })
        .done(function(data) {
          resolve(data)
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      })
    }


    confirmarDatos(personId)
      .then(function (data){
        swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(error=> console.log(error + ' Noooo'))


  });


});
