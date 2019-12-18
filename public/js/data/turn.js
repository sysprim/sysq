
$(document).ready(function () {

    const url = "http://localhost/sysq/public/";
    var idTurn = $('.idTurn').val();
    var code   = $('.code').val();
    var ci     = $('#ci').val();

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
                
                beforeSend: function(){
                    console.log("Sending data...");
                    $('#preLoader').show();
                },
                success: function(data) {
                    console.log(data);

                        $('#preLoader').hide();

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
                        
                        beforeSend: function(){
                            console.log("Sending data...");
                            $('#preLoader').show();
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
                        
                        beforeSend: function(){
                            console.log("Sending data...");
                            $('#preLoader').show();
                        },
                        success: function(data) {
                            console.log(data);
                            $('#preLoader').hide();
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
                        
                        beforeSend: function(){
                            console.log("Sending data...");
                            $('#preLoader').show();
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

    //funcional
    $('#modal').click(function (e){
        $('#ticket').modal('open');
    });

});