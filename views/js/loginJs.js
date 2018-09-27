
$(document).ready(function() {

  var estado = 0

  $("#confirmaDatos").click(function(event) {
    var personId = $("#personIdEditar").val();
    var estado = 'no'

    function  confirmarDatos(personId){
      estado = 'si'
      return new Promise((resolve,reject) => {
        $.ajax({
          url: 'views/modules/ajax/ajaxPerson.php',
          type: 'POST',
        //  dataType: 'json',
          data: {personId:personId}
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

    //debugger
    confirmarDatos(personId)
      .then(function (data){
        //alert(data)
        //window.location.href = "http://localhost/dataEvent/index.php?action=acreditacion";
        //console.log('se confirmo');
        //alert('se confirmo con exito')
        swal('EventManager','Datos confirmado con EXITO','success')
      })
      .catch(error=> console.log(error + ' Noooo'))
      //.catch(onError)


    //swal('Platzi','Felicitaciones, ganaste el juego','success')

  });


});
