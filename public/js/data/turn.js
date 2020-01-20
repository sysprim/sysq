// const url = "http://localhost/sysq/public/";
const url = "http://144.91.97.209/";

$(document).ready(function () {

    var idTurn = $('.idTurn').val();
    var code   = $('.code').val();
    var ci     = $('#ci').val();
    var number = $('#numberTicket').val();


    console.log(idTurn);
    console.log(code);


 $('#reset').click(function (e){

        swal({
            title: "¿Quieres cancelar todo los clientes en colas?",
            text: "Al realizar esta acción, todos los clientes en cola serán cancelados.",
            icon: "error",
            buttons: {
                confirm: {
                    text: "Cancelar Colas",
                    value: true,
                    visible: true,
                    className: "red"

                },
                cancel: {
                    text: "Cancelar",
                    value: false,
                    visible: true,
                    className: "grey lighten-2"
                }
            }}).then(function(value){

                if(value == true){
                    $.ajax({
                        method:'POST',
                        url: url+"/Turn/Reset",
                        data:{
                            "_token": $("meta[name='csrf-token']").attr("content")
                        },

                        beforeSend: function () {
                            $("#preloader").fadeIn('fast');
                            $("#preloader-overlay").fadeIn('fast');
                        },
                        success: function(data) {
                            console.log(data);
                            $('#preLoader').hide();
                            swal({
                                title: "¡Se cancelo con exito!",
                                text: "No hay clientes en cola ",
                                icon: "success",
                                button: {
                                    text: "Aceptar",
                                    visible: true,
                                    value: true,
                                    className: "green",
                                    closeModal: true
                                },
                                timer: 3000
                            })
                            .then(redirect => {
                                location.reload();
                            })
                        },
                        error: function(err) {

                            console.log(err);
                            swal({
                                title: "¡Oh no!",
                                text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                                icon: "error",
                                button: {
                                    text: "Aceptar",
                                    visible: true,
                                    value: true,
                                    className: "green",
                                    closeModal: true
                                }
                            });
                        }
                    })}else {

                    swal({
                        text: "No se ha cancelado las tareas",
                        icon: "warning",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                    });
                }
            });

    });

    $('#resetTaquilla').click(function (e){

        var idReset= $('#idTicketReset').val();

        if(code != 0){

        swal({
            title: "¿Quieres cancelar todo los clientes en colas?",
            text: "Al realizar esta acción, todos los clientes en cola serán cancelados de la taquilla "+ number + ".",
            icon: "error",
            buttons: {
                confirm: {
                    text: "Cancelar Colas",
                    value: true,
                    visible: true,
                    className: "red"

                },
                cancel: {
                    text: "Cancelar",
                    value: false,
                    visible: true,
                    className: "grey lighten-2"
                }
            }}).then(function(value){

                if(value == true){
                    $.ajax({
                        method:'POST',
                        url: url+"Turn/Reset/Ticket",
                        data:{idReset:idReset,
                            "_token": $("meta[name='csrf-token']").attr("content")
                        },

                        beforeSend: function () {
                            $("#preloader").fadeIn('fast');
                            $("#preloader-overlay").fadeIn('fast');
                        },
                        success: function(data) {
                            console.log(data);
                            swal({
                                title: "¡Se cancelo con exito!",
                                text: "No hay clientes en cola de la taquilla " + number + ".",
                                icon: "success",
                                button: {
                                    text: "Aceptar",
                                    visible: true,
                                    value: true,
                                    className: "green",
                                    closeModal: true
                                },
                                timer: 3000
                            })
                            .then(redirect => {
                                location.reload();
                            })
                        },
                        error: function(err) {

                            console.log(err);
                            swal({
                                title: "¡Oh no!",
                                text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                                icon: "error",
                                button: {
                                    text: "Aceptar",
                                    visible: true,
                                    value: true,
                                    className: "green",
                                    closeModal: true
                                }
                            });
                        }
                    })}else {

                    swal({
                        text: "No se ha cancelado las tareas",
                        icon: "warning",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                    });
                }
            })}else{
                 swal({
                text: "No tienes clientes en cola",
                icon: "error",
                button: {
                    text: "Aceptar",
                    className: "red"
                }
            });
        }
    });

    $('#editNotice').click(function(e) {
       $('#editNoticePanel').show();
    });

    $('#camNotice').click(function(e) {

        var notice = $('#noticeCam').val();

        $('#notice').html('Cintillo de Noticia : '+ notice);

        $('#editNoticePanel').hide();

    });

function ticket(){

setTimeout(function(){

    var consulta = $.ajax({
                                method:'POST',
                                url: url+"Turn/CallMe",
                                data:{
                        "_token": $("meta[name='csrf-token']").attr("content")

            }, success: function(response) {

                var CallMe = response.call;
                var acum ="";
                var acum1 ="";
                var code="";
                var ticket="";

                if(response.call != 0){
                    for(i=0; i<response.call.length; i++){
                    // console.log(response.call[i]);
                        console.log(response.call[i].id);
                        console.log(response.call[i].turn_status);
                        console.log(response.call[i].random_code);
                        console.log(response.call[i].number_ticket);
                        console.log(response.call[i].ci_client);

                        acum+="<h5 class='flow-text'>"+response.call[i].random_code+'</h5>'+'<h5>'+'Ci:'+response.call[i].ci_client+'<h5>';
                        acum1+="<h5 class='flow-text'>"+response.call[i].number_ticket+'</h5>'+"<h5>"+" <i class='icon-face'></i> "+'</h5>';

                        code+=response.call[i].random_code;
                        ticket+=response.call[i].number_ticket;
                }
            }
                $("#ticketNumber").html(acum1);
                $("#codeRandom").html(acum);

                if(acum!=""){

                    clientM="";
                    ticketM="";
                    codeM="";

                    for(i=0; i<response.call.length; i++){
                        clientM+="<span>"+response.call[i].ci_client+"</span>"+"<br>";
                        ticketM+="<span>"+response.call[i].number_ticket+"</span>"+"<br>";
                        codeM+="<span>"+response.call[i].random_code+"</span>"+"<br>";
                    }

                     $('#ciClienteModal').html(clientM);
                     $('#randomCodeModal').html(codeM);
                     $('#numberTicketModal').html(ticketM);


                        // $('#ciClienteModal').html(response.call[0].clients.ci_client);
                        // $('#randomCodeModal').html(response.call[0].random_code);
                        // $('#numberTicketModal').html(response.call[0].tickets.number_ticket);
                        // var ci =response.call[i].clients.ci_client;
                        // var codeModal =response.call[i].random_code;

                     setTimeout( function(){
                        $('#turnModal').modal('open');

                     } ,10000);

                    //  setTimeout( swal({
                    //     title: "CLIENTE: "+ci,
                    //     text: "TURNO: "+codeModal,
                    //     button: {
                    //         className: "blue",
                    //          },
                    //         timer: 2000
                    // }),10000);

                    $('.audio')[0].play();
                }

                 setTimeout($('#turnModal').modal('close'),15000);

            },error: function() {
                console.log("No se ha podido obtener la información");
            }

        });

    ticket();
}, 3000);

}

      function ticketWaiting(){
        var consulta = $.ajax({
                                method:'POST',
                                url: url+"Turn/Waiting",
                                data:{
                        "_token": $("meta[name='csrf-token']").attr("content")

            }, success: function(response) {
                console.log(response.waiting[0]);

                var CallMe = response.waiting;
                var acum ="";
                var acum1 ="";

            if(response.waiting != null){
                for(i=0; i<response.waiting.length; i++){
                    // console.log(response.call[i]);
                    console.log(response.waiting[i].id);
                    console.log(response.waiting[i].turn_status);
                    console.log(response.waiting[i].random_code);

                    acum+="<h5 class='flow-text' style='text-aling:right'>"+response.waiting[i].random_code+'</h5>';
                    acum1+="<h5 class='flow-text' style='text-aling:right'>"+response.waiting[i].clients.ci_client+'<h5>';
                    // acum1+="<h5>"+response.waiting[i].tickets.number_ticket+'</h5>'+"<h5>"+" <i class='icon-face'></i> "+'</h5>';
                }
            }
                // $("#ticketWaiting").html(acum1);

                $("#codeWaiting").html(acum);
                $("#ciWaiting").html(acum1);

            },error: function() {
                console.log("No se ha podido obtener la información");
            }

        });
      }

      function ticketAttending(){
        var consulta = $.ajax({
                                method:'GET',
                                url: url+"Turn/Attending",

            success: function(response) {
                console.log(response.attend[0]);

                var acum ="";
                var acum1 ="";

            if(response.attend != 0){
                for(i=0; i<response.attend.length; i++){

                    console.log(response.attend[i].id);
                    console.log(response.attend[i].turn_status);
                    console.log(response.attend[i].random_code);

                    acum+="<h5 class='flow-text'>"+response.attend[i].random_code+'</h5>'+'<h5>'+'Ci:'+response.attend[i].ci_client+'<h5>';
                    acum1+="<h5 class='flow-text'>"+response.attend[i].number_ticket+'</h5>'+"<h5>"+" <i class='icon-face'></i> "+'</h5>';

                }
            }
                $("#ticketAttend").html(acum1);
                $("#codeAttend").html(acum);

            },error: function() {
                console.log("No se ha podido obtener la información");
            }

        });
      }


      if($('#ticketNumber').val()!=undefined){
         ticket();
         setInterval(ticketWaiting, 1000);
         setInterval(ticketAttending, 1000);
      }


});

// function change(id){

//     const url = "http://localhost/sysq/public/";

//     var idVideo = id;
//     var consulta = $.ajax({
//                         method:'GET',
//                         url: url+"Video/Search/"+idVideo,

//     success: function(response) {
//         console.log(response.changeVideo);
//         console.log(response.changeVideo.video_path);

//         var name = response.changeVideo.video_path ;

//         $('#videoPanel').attr('src', '{{ route( view.video,[filename=>'+name+'])}}');
//         $('#videoPanel')[0].load();

//     },error: function(err) {
//         console.log(err);
//             swal({
//                 title: "¡Oh no!",
//                 text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
//                 icon: "error",
//                 button: {
//                     text: "Aceptar",
//                     visible: true,
//                     value: true,
//                     className: "green",
//                     closeModal: true
//             }
//         });
//     }

// });
// }

