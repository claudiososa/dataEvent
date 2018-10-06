console.log('llego')

function validarPersona(){
  let letras=  /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ_\s]+$/;
  let num =  /^[0-9]+$/;
  let correo = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}|[.][a-zA-Z]{2,4}$/;
  //
  //
  //
  //
  //
  //
            if( $('#lastnameRegistro').val() == "" || !letras.test($('#lastnameRegistro').val()) ) {
              // $('#lastnameRegistro').focus();
              $(".lastname").show();
              console.log('falta apellido')

            }else{
               $(".lastname").hide();
  return true;
            }



            if( $('#firstnameRegistro').val() == "" || !letras.test($('#firstnameRegistro').val()) ) {
              // $('#firstnameRegistro').focus();
              $(".firstname").show();
              // console.log('falta apellido')
            }else{
               $(".firstname").hide();

  return true;
            }



            // email no obligatorio
                        // if( $('#emailRegistro').val() != "" || !email.test($('#emailRegistro').val()) ) {
                        //   $('#emailRegistro').focus();
                        //   $(".email").show();
                        //   // console.log('falta apellido')
                        //
                        // }else{
                        //    $(".email").hide();
                        //
                        //
                        // }
            //
            // tel no obligatorio


                        // if( $('#movilRegistro').val() != "" || !email.test($('#movilRegistro').val()) ) {
                        //   $('#movilRegistro').focus();
                        //   $(".movil").show();
                        //   // console.log('falta apellido')
                        //
                        // }else{
                        //    $(".movil").hide();
                        //
                        //
                        // }
            ////select prov obligatorio


            if ($('#selProvinceRegistro').val() === 'SIN REGISTRAR') {
              // $('#selProvinceRegistro').focus();
                $(".provincia").show();


            }else{
              $(".provincia").hide();

            }




            $("#lastnameRegistro").keyup(function(event){
              if( $('#lastnameRegistro').val() != "" && (letras.test($('#lastnameRegistro').val() ))){
                $(".lastname").fadeOut();
                //  return true;

              }else{
                $(".lastname").show();

              }

              return true;
            })

            $("#firstnameRegistro").keyup(function(event){
              if( $('#firstnameRegistro').val() != "" && (letras.test($('#firstnameRegistro').val() ))){
                $(".firstname").fadeOut();
                //  return true;

              }else{
                $(".firstname").show();

              }
              return true;
            })






}
