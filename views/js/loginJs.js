
$(document).ready(function() {
  var estado = 0
  //swal('DataEvent','Se confirmaron los datos correctamente','success')
  $("#confirmaDatos").click(function(event) {
    var personId = $("#personIdEditar").val();
    //alert (personId)
    //var estado = '0'


    function  confirmarDatos(personId){
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

    // debugger
    // if (estado =='1') {
    //   alert('estado es 1')
    // } else{
    //   alert('estado es 0')
    // }


    confirmarDatos(personId)
      .then(function (data){
        estado = '1'
        alert('se confirmo con exito')
        //swal('Platzi','Felicitaciones, ganaste el juego','success')
      })
      .catch(onError)



  });


});
