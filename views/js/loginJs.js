
$(document).ready(function() {
  let eventPersonId = 0
  $('#tomarAsistencia').attr('disabled',true)


    $('#btnSearchPerson').click( function (event){
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
            //alert('Persona no existe')
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
        //alert(data)
        //alert('successBtnValidar')
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    })

    $('#tomarAsistencia').click( function (event){

      if (eventPersonId != 0) {
        $.ajax({
          url: 'views/modules/ajax/ajaxAttendance.php',
          type: 'POST',
        //  dataType: 'json',
          data: {eventPersonId:eventPersonId}
        })
        .done(function(data) {
          console.log("success");
          $('#formEditPerson').fadeOut(700);
          swal('EventManager','La asistencia fue registrada','success')
        })

        //alert(eventPersonId)
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

/******************************************/
    function  savePerson(personId){

      if (saveStatus=='new') {
        return new Promise((resolve,reject) => {
          let saveNew = 'saveNew'
          $.ajax({
            url: 'views/modules/ajax/ajaxPerson.php',
            type: 'POST',
          //  dataType: 'json',
            data: {saveNew:saveNew,personId:personId,lastname:lastname,firstname:firstname,dni:dni,email:email,movil:movil,location:location}
          })
          .done(function(data) {
            resolve(data)
          })
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


    }

    savePerson(personId)
      .then(function (data){
        confirmData('1',personId)
        //swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(error=> console.log(error + ' Noooo'))



    confirmData('1',personId)
      .then(function (data){
        $('#tomarAsistencia').attr('disabled',false)

        eventPersonId = data
        //alert(eventPersonId)
        swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(function (data){
        swal('EventManager','No se pude guardar los datos','error')
      })



  });//End event clic for "Confirmar datos"


});
