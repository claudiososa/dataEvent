
$(document).ready(function() {

  let eventPersonId = 0
  $('#tomarAsistencia').attr('disabled',true)

  $('#formSearchPerson').submit(function() {
  return false;
  });

  $('#btnSearchPerson').click( function (event){// Event click for Botton 'Buscar'
      //alert('presiono boton buscar')
      let dni = $("#dni").val()
      let searchDni = 'searchDni'

      $.ajax({
        url: 'views/modules/ajax/ajaxPerson.php',
        type: 'POST',
        dataType: 'json',
        data: {dni:dni,searchDni:searchDni}
      })
      .done(function(data) {
        console.log("successBtnValidar");
        if (data=='0') {//no existe persona con el dni ingresado

        swal({
            title: "El DNI ingresado no EXISTE",
            text: "Desea agregar una nueva Persona?",
            icon: "warning",
            buttons: ["Cancelar", "Si"],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $('#formEditPerson').fadeIn(600);
              $('#saveStatus').val("new")
              $('#personIdEditar').val("")
              $('#dniRegistro').val($('#dni').val())
              $('#lastnameRegistro').val("")
              $('#firstnameRegistro').val("")
              $('#emailRegistro').val("")
              $('#movilRegistro').val("")
              $('#locationRegistro').val("")

            } else {
              swal("Your imaginary file is safe!");
            }
          });
        }else{//devuele el person_id de la persona correspondiente al DNI
          $('#formEditPerson').fadeIn(700);
          $('#saveStatus').val("edit")
          for (let item of data) {
            $('#personIdEditar').val(item.person_id)
            $('#dniRegistro').val(item.dni)
            $('#lastnameRegistro').val(item.lastname)
            $('#firstnameRegistro').val(item.firstname)
            $('#emailRegistro').val(item.email)
            $('#movilRegistro').val(item.movil)
            $('#locationRegistro').val(item.location)


          }

        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    })// End click for Botton 'Buscar'


    $('#dni').keypress(function(e){
      if(e.which == 13){//Enter key pressed
        //alert('presiono enter')
        $('#btnSearchPerson').click();//Trigger search button click event
      }
    });

    $('#tomarAsistencia').click( function (event){

      if (eventPersonId != 0) {
        $.ajax({
          url: 'views/modules/ajax/ajaxAttendance.php',
          type: 'POST',
        //  dataType: 'json',
          data: {eventPersonId:eventPersonId}
        })
        .done(function(data) {
          //console.log("success");
          $("#dni").val('')
          $('#formEditPerson').fadeOut(700);
          swal('EventManager','La asistencia fue registrada','success')
        })


      }
    })



/**
 * Button "Confirmar Datos" , event click
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
    let saveStatus = $("#saveStatus").val();
    //alert(personId)
    /******************************************/
        function  confirmData(eventId,personId,saveEventPerson){

          if (saveEventPerson=='1') {

            return new Promise((resolve,reject) => {
              let newEventPerson = '1'
              let visitorId ='1'
              let detalleVisitorId ='1'
              let confirmation = 'SI'

              $.ajax({
                url: 'views/modules/ajax/ajaxEventPerson.php',
                type: 'POST',
              //  dataType: 'json',
                data: {newEventPerson:newEventPerson,eventIdNew:eventId,personId:personId,visitorId:visitorId,detalleVisitorId:detalleVisitorId,confirmation:confirmation}
              })
              .done(function(data) {
                //
                resolve(data)
                // if (data!='error') {
                //
                // }else{
                //   reject(data)
                // }

              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });

            })
          }else{
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
      }// End function ConfirmData

/******************************************/
    function  savePerson(personId){

      if (saveStatus=='new') {// Cuando se esta ingresando un nueva persona

        return new Promise((resolve,reject) => {
          let saveNew = 'saveNew'

          $.ajax({
            url: 'views/modules/ajax/ajaxPerson.php',
            type: 'POST',
          //  dataType: 'json',
            data: {saveNew:saveNew,lastname:lastname,firstname:firstname,dni:dni,email:email,movil:movil,location:location}
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
      }else{
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

        })

      }


    }// End function savePerson

    savePerson(personId)
      .then(function (data){
        var saveEventPerson= '0'
        if (saveStatus=="new") {

          saveEventPerson = '1'
          confirmData('1',data,saveEventPerson)
          //confirmData('1',personId)
            .then(function (data){
              $('#tomarAsistencia').attr('disabled',false)
              eventPersonId = data
              swal('EventManager','Datos confirmado con EXITO','success')
            })
            .catch(function (data){
              swal('EventManager','No se pude guardar los datos','error')
            })
        }else{
          saveEventPerson = '0'
          confirmData('1',personId,saveEventPerson)
          .then(function (data){
            $('#tomarAsistencia').attr('disabled',false)
              //alert('llego a then de confirmdata')
            eventPersonId = data

            swal('EventManager','Datos confirmado con EXITO','success')
          })
          .catch(function (data){
            swal('EventManager','No se pude guardar los datos','error')
          })
        }

        //swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(error=> console.log(error + ' Noooo'))







  });//End event clic for "Confirmar datos"


});
