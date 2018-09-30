
$(document).ready(function() {

/**
 * Confirm data event  for button "Confirmar Datos"
 */
  $("#confirmaDatos").click(function(event) {
    let eventId='1'
    let personId = $("#personIdEditar").val();
    let lastname = $("#lastnameRegistro").val();
    let firstname = $("#firstnameRegistro").val();
    let dni = $("#dniRegistro").val();
    let email = $("#emailRegistro").val();
    let movil = $("#movilRegistro").val();
    let location = $("#firstnameRegistro").val();


    function  savePerson(personId){

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

    savePerson(personId)
      .then(function (data){
        //swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(error=> console.log(error + ' Noooo'))


/******************************************/
    function  confirmData(eventId,personId){

      return new Promise((resolve,reject) => {
        $.ajax({
          url: 'views/modules/ajax/ajaxEventPerson.php',
          type: 'POST',
        //  dataType: 'json',
          data: {eventId:eventId,personId:personId}
        })
        .done(function(data) {
          if (data) {
            resolve(data)
          }else{
            reject(data)
          }

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      })
    }

    confirmData('1',personId)
      .then(function (data){
        swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(function (data){
        swal('EventManager','No se pude guardar los datos','error')
      })



  });//End event clic for "Confirmar datos"


});
