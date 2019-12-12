$(document).ready(function () {
    const url = "http://localhost/sysq/public/";

    var ci = $('ci').val();

    ci.onkeypress=function(event){

        var er=/^[0-9\b]*$/;
        validarkeypress(er,event);
    }

    ci.onkeyup = function(){
        var er = /^[0-9]{6,12}$/;
        validarkeyup(er,this,
          document.getElementById("mcedula"),
          "La cedula debe ser mayor a 6 caracteres");
      };

      document.querySelectorAll("button.btnNumber").forEach(function(elem) {
	elem.addEventListener('click', agregarTexto, false);
  });

    function search(){

        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          data: {ci:ci},
         beforeSend:function(){
            console.log("Sending data...");
           },

           success:function(data){

           if(data){

            swal({
                title: "Cliente Registrado",
                text: "Bienvenido Nuevamente",
                icon: "success",
                button: "Seguir!"
                
            }).then(function(value){
                window.location(url + index)
            });
 
           }
        },
           error:function(err){
               console.log(err);
           }
                });
        }
    });
        