$(document).ready(function() {
  let eventPersonId = 0
  $('#tomarAsistencia').attr('disabled',true)

  $('#formSearchPerson').submit(function() {
  return false;
  });

  $('#dni').focus(function(event) {
    $('#eventImg').fadeIn(300);
    $('#formEditPerson').fadeOut(300);
  });

  $('#btnSearchPerson').click( function (event){// Event click for Botton 'Buscar'
      let dni = $("#dni").val()

      if (validarDni()){
        let searchDni = 'searchDni'

        $.ajax({
          url: 'views/modules/ajax/ajaxPerson.php',
          type: 'POST',
          dataType: 'json',
          data: {dni:dni,searchDni:searchDni}
        })
        .done(function(data) {
          console.log("successBtnValidar");
          if (data=='0') {//sino existe persona con el dni ingresado

          swal({
              title: "El DNI ingresado no EXISTE",
              text: "Desea agregar una nueva Persona?",
              icon: "warning",
              buttons: ["Cancelar", "Si"],
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $('#eventImg').fadeOut(0);
                $('#formEditPerson').fadeIn(900);
                $('#saveStatus').val("new")
                $('#personIdEditar').val("")
                $('#dniRegistro').val($('#dni').val())
                $('#lastnameRegistro').val("")
                $('#firstnameRegistro').val("")
                $('#emailRegistro').val("")
                $('#movilRegistro').val("")
                $('#locationRegistro').val("")
                $('#lastnameRegistro').focus()
                $("#selPersonTipo").empty()
                $("#selPersonNivel").empty()

                let htmlSelPersonTipo = selectedPersonTipoEmpty()
                $(htmlSelPersonTipo).appendTo('#selPersonTipo')

                let htmlSelPersonNivel = selectedPersonNivelEmpty()
                $(htmlSelPersonNivel).appendTo('#selPersonNivel')

              } else {
                $('#dni').focus()
                //swal("Your imaginary file is safe!");
              }
            });
          }else{//devuele el person_id de la persona correspondiente al DNI
            //debugger
            $('#eventImg').fadeOut(0);
            $('#formEditPerson').fadeIn(900);
            $('#saveStatus').val("edit")
            $('#confirmaDatos').focus()
            $("#selProvinceRegistro").empty()
            $("#selPersonTipo").empty()
            $("#selPersonNivel").empty()

            for (let item of data) {
              $('#personIdEditar').val(item.person_id)
              $('#dniRegistro').val(item.dni)
              $('#lastnameRegistro').val(item.lastname)
              $('#firstnameRegistro').val(item.firstname)
              $('#emailRegistro').val(item.email)
              $('#movilRegistro').val(item.movil)
              let htmlSelProvince = selectedProvince(item.province)

              $(htmlSelProvince).appendTo('#selProvinceRegistro')
              $('#locationRegistro').val(item.location)

              let htmlSelPersonTipo = selectedPersonTipo(item.visitor_id)
              $(htmlSelPersonTipo).appendTo('#selPersonTipo')

              let htmlSelPersonNivel = selectedPersonNivel(item.detalle_visitor_id)
              $(htmlSelPersonNivel).appendTo('#selPersonNivel')

              if (item.confirmation=="SI") {
                $('#confirmaDatos').removeClass('btnConfirmardatos')
                $('#confirmaDatos').removeClass('btn-outline-info')
                $('#confirmaDatos').addClass('btn-success')
                $('#tomarAsistencia').attr('disabled',false).focus()
                eventPersonId = item.person_id
                //$('#tomarAsistencia').focus()
              }else{
                $('#confirmaDatos').removeClass('btn-success')
                $('#confirmaDatos').addClass('btnConfirmardatos')
                $('#confirmaDatos').addClass('btn-outline-info')
                $('#tomarAsistencia').attr('disabled',true)
              }
            }

          }

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      }else{
        $('#dni').focus()
        return false
      }


    })// End click for Botton 'Buscar'


    $('#dni').keypress(function(e){
      if(e.which == 13){
        $('#btnSearchPerson').click();
      }
    });

    $('#tomarAsistencia').click( function (event){

      if (eventPersonId != 0) {
        $.ajax({
          url: 'views/modules/ajax/ajaxAttendance.php',
          type: 'POST',
          data: {eventPersonId:eventPersonId}
        })
        .done(function(data) {
          $("#dni").val('')
          $('#formEditPerson').fadeOut(700);
          $('#eventImg').fadeIn(900);
          swal('EventManager','La asistencia fue registrada','success')
            .then(function(){
              $('#dni').focus()
            })
        })


      }
    })



/**
 * Button "Confirmar Datos" , event click
 */
  $("#confirmaDatos").click(function(event) {


    if(validarPersona()){

    let eventId='1'
    let personId = $("#personIdEditar").val();

    let lastname = $("#lastnameRegistro").val();
    let firstname = $("#firstnameRegistro").val();
    let dni = $("#dniRegistro").val();
    let email = $("#emailRegistro").val();
    let movil = $("#movilRegistro").val();
    let saveStatus = $("#saveStatus").val();
    let location = $('#locationRegistro').val()
    let province = $('#selProvinceRegistro').val()

    /******************************************/
        function  confirmData(eventId,personId,saveEventPerson,visitorId,detalleVisitorId){
          alert(eventId+'---'+personId+'---'+saveEventPerson+'---'+visitorId+'---'+detalleVisitorId)
          if (saveEventPerson=='1') {

            return new Promise((resolve,reject) => {
              let newEventPerson = '1'
              // let visitorId ='1'
              // let detalleVisitorId ='1'
              let confirmation = 'SI'

              $.ajax({
                url: 'views/modules/ajax/ajaxEventPerson.php',
                type: 'POST',
              //  dataType: 'json',
                data: {newEventPerson:newEventPerson,eventIdNew:eventId,personIdNew:personId,visitorId:visitorId,detalleVisitorId:detalleVisitorId,confirmation:confirmation}
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
                url: 'views/modules/ajax/ajaxEventPerson.php',
                type: 'POST',
              //  dataType: 'json',
                data: {eventId:eventId,personId:personId,visitorId:visitorId,detalleVisitorId:detalleVisitorId}
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
            data: {saveNew:saveNew,lastname:lastname,firstname:firstname,dni:dni,email:email,movil:movil,location:location,province:province}
          })
          .done(function(data) {
            //debugger

            //$("#selProvinceRegistro option[value='"+selProvince+"']").attr('selected', false);
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
            data: {personId:personId,lastname:lastname,firstname:firstname,dni:dni,email:email,movil:movil,location:location,province:province}
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
          let visitorId = $('#selPersonTipo').val()
          let detalleVisitorId = $('#selPersonNivel').val()

          saveEventPerson = '1'
          confirmData('1',data,saveEventPerson,visitorId,detalleVisitorId)
          //confirmData('1',personId)
            .then(function (data){
              $('#tomarAsistencia').attr('disabled',false)
              eventPersonId = data
              swal('EventManager','Datos confirmado con EXITO1','success')
                .then(function(){
                    $('#tomarAsistencia').focus()
                })

            })
            .catch(function (data){

              swal('EventManager','No se pude guardar los datos','error')
            })
        }else{
          saveEventPerson = '0'
          let visitorId = $('#selPersonTipo').val()
          let detalleVisitorId = $('#selPersonNivel').val()

          confirmData('1',personId,saveEventPerson,visitorId,detalleVisitorId)
          .then(function (data){
            //if (validarPersona()) {





            $('#tomarAsistencia').attr('disabled',false)
            eventPersonId = data
            swal('EventManager','Datos confirmado con EXITO','success')
              .then(function(){
                $('#tomarAsistencia').focus()
              })

            //}
          })


          .catch(function (data){
            swal('EventManager','No se pude guardar los datos','error')
          })
        }

      })
      .catch(error=> console.log(error + ' Noooo'))

}
  });//End event clic for "Confirmar datos"

});
