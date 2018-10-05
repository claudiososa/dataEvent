$(document).ready(function() {
  $('[id ^=buttonToPrint]').click( function(){
    let personIdPrint =$(this).attr('id').substr(13)
    $.ajax({
      url: 'views/modules/ajax/ajaxPerson.php',
      type: 'POST',
      //dataType: 'json',
      data: {personIdPrint:personIdPrint}
    })
    .done(function(data) {
      console.log("success");
      //alert(data)
      let archivo = "http://localhost/eventmanager/views/download/"+data+".pdf"
      window.open(archivo,'_self','');
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


  })
});
