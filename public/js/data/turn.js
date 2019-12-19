
$(document).ready(function () {

    // const url = "http://localhost/sysq/public/";
    const url = "144.91.97.209";
    
    var idTurn = $('.idTurn').val();
    var code   = $('.code').val();
    var ci     = $('#ci').val();
    var number = $('#numberTicket').val();

    console.log(idTurn);
    console.log(code);

    $('#llamar').click(function(e){

        if(code != 0){
        //Buttons infernal
        

        //cambiar turno
            $.ajax({
                method:'POST',
                url: url+"Turn/Call",
                data:{idTurn:idTurn,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                
                beforeSend: function () {
                   
                },
                success: function(data) {
                    console.log(data);

                        $('#blockResetTurnos').hide();

                        $('#text_llamar').html('Llamar de nuevo');
                        $('#nameClient').html('Cliente');
                        $('#ciClient').html(ci);
                        $('#nameTurn').html('Turno');
                        $('#numberTurn').html(code);

                        $('#cancelar').show();
                        $('#iniciar').show();

                        $('#block_cancelar').show();      
                        $('#block_iniciar').show();

                        $("#block_iniciar").removeClass();
                        $("#block_llamar").removeClass();
                        $("#block_cancelar").removeClass();
                        $("#preloader-overlay").hide();

                        $("#block_iniciar").addClass("col s12 m4 animated bounceIn");       
                        $("#block_llamar").addClass("col s12 m4 animated bounceIn");
                        $("#block_cancelar").addClass("col s12 m4 animated bounceIn");

        //modaaaaalllllllll
                    $('#ticket').modal('open');
                    $('#infoCode').html(code);
                    $('.audio')[0].play();
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
            })
        
        }else{

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

    $('#iniciar').click(function(e) {

        //Buttons
        $('#llamar').hide();
        $('#iniciar').hide();
        $("#block_llamar").hide();
        $("#block_iniciar").hide();
        
        $('#finalizar').show();
        $('#block_finalizar').show();
        $('#cancelar').show();
        $('#block_cancelar').show();
        
        
        $("#block_finalizar").addClass("col s12 m6 animated bounceIn");
        $("#block_cancelar").addClass("col s12 m6 animated bounceIn");
        

    });

    $('#finalizar').click(function (e){


        swal({
            title: "¿Quieres finalizar el servicio?",
            text: "Al finalizar seguira con el proximo cliente en cola, no se revertiran los cambios.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Finalizar",
                    value: true,
                    visible: true,
                    className: "green"

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
                        url: url+"Turn/Finally",
                        data:{idTurn:idTurn,
                            "_token": $("meta[name='csrf-token']").attr("content")
                        },
                        
                        beforeSend: function () {
                            $("#preloader").fadeIn('fast');
                            $("#preloader-overlay").fadeIn('fast');
                        },
                        success: function(data) {
                            console.log(data);

                            $('#preLoader').hide();
                            $('#text_llamar').html('Llamar');       
                            $("#block_llamar").removeClass();
                            $("#block_llamar").addClass("col s12 m12 animated bounceIn");
                            
                            swal({
                                title: "¡Se ha finalizado con exito!",
                                text: "Puedes seguir atendiendo ",
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
                        text: "No se ha finalizado de no finalizar seguira el cliente en cola",
                        icon: "info",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                    });
                }
            });
        });     

    $('#cancelar').click(function (e){

        swal({
            title: "¿Quieres cancelar el servicio?",
            text: "Al cancelar seguira con el proximo cliente en cola, no se revertiran los cambios.",
            icon: "error",
            buttons: {
                confirm: {
                    text: "Finalizar",
                    value: true,
                    visible: true,
                    className: "green"

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
                        url: url+"Turn/Cancel",
                        data:{idTurn:idTurn,
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
                                text: "Puedes seguir atendiendo ",
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
                        text: "No se ha cancelado",
                        icon: "warning",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                    });
                }
            });

    });

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
                        url: url+"/Turn/Reset",
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

        $('#notice').html(notice);

        $('#editNoticePanel').hide();    

    });   

    function ticket(){
        var consulta = $.ajax({
                                method:'POST',
                                url: url+"Turn/CallMe",
                                data:{
                        "_token": $("meta[name='csrf-token']").attr("content")

            }, success: function(response) {
                console.log(response.call[1]);

                var CallMe = response.call;
                
                for(i=0; i<response.call.length; i++){
                    // console.log(response.call[i]);
                    console.log(response.call[i].id);
                    console.log(response.call[i].turn_status);
                    console.log(response.call[i].random_code);
                    console.log(response.call[i].number_ticket);

                    $("#code_random").append("<h4>"+response.call[i].random_code+'</h4>');
                    $("#ticket_number").append("<h4>"+0+'</h4>');
                }

            },error: function() {
                console.log("No se ha podido obtener la información");
            }

        });
      } 

      setInterval(ticket, 1000); 

});