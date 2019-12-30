const url = "http://localhost/sysq/public/";
// const url = "http://144.91.97.209/";

$(document).ready(function(){

    window.onbeforeunload = function() {
        return 'Si actualiza los contribuyentes que fueron llamados o se a iniciado la atención no estarán en cola nuevamente.';
    };

    var idTicket= $('#idTicket').val();

	$('#llamar').click(function(response){

        $.ajax({
            url:url + "Panel/First",
            method:"GET",
            datatype:"JSON",

            beforeSend: function () {
                console.log("Recibiendo datos");
            },

            success:function (response) {

               var idTurn  =response.first.id;
               var code    =response.first.random_code;
               var ci      =response.first.clients.ci_client;
               var idClient=response.first.clients.id;

                if(idTurn != null){
                        $.ajax({
                            method:'POST',
                            url: url+"Turn/Call",
                            data:{idTurn:idTurn,
                                "_token": $("meta[name='csrf-token']").attr("content")
                            },

                            beforeSend: function () {

                            },
                            success: function(data) {
                                $.ajax({
                                    method:'POST',
                                    url: url+"Attention/Save",
                                    data:{idClient:idClient,
                                        idTicket:idTicket,
                                        "_token": $("meta[name='csrf-token']").attr("content")
                                    },
                                    beforeSend:function(){

                                    },

                                    success:function(){
                                        console.log("registrado");
                                    },

                                    error: function() {
                                        console.log("No se ha podido obtener la información");
                                    }
                                });
                                    $("#idTurn").val(idTurn);

                                    $('#text_llamar').html('Llamar de nuevo');
                                    $('#info').html('Recuerde iniciar atención cuando el cliente este en taquilla');
                                    $('#nameClient').html('Cliente');

                                    $('#nameTurn').html('Turno');
                                    $('#numberTurn').html(code);

                                    $('#clientCall').show();
                                    $('#ciClient').html(ci);

                                    $('#cancelar').show();
                                    $('#iniciar').show();

                                    $('#block_cancelar').show();
                                    $('#block_iniciar').show();
                                    $("#block_llamar").hide();

                                    $("#block_iniciar").removeClass();

                                    $("#block_cancelar").removeClass();
                                    $("#preloader-overlay").hide();

                                    $("#block_iniciar").addClass("col s12 m6 animated bounceIn");
                                    $("#block_cancelar").addClass("col s12 m6 animated bounceIn");

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
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }

        });
    });

    $('#iniciar').click(function(e) {

        var idTurn=$("#idTurn").val();

        $.ajax({
                method:'POST',
                url: url+"Turn/Start",
                data:{idTurn:idTurn,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },

                 beforeSend: function () {
                    console.log(idTurn);
                        },
                success: function(data) {
                    console.log(data);

                    swal({
                        title: "¡Se ha Iniciado con exito!",
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

                            });

                        //Buttons
                    $("#preloader").hide();
                    $("#preloader-overlay").hide();
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
    });

    $('#finalizar').click(function (e){

        var idTurn=$("#idTurn").val();

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

                            });

                            //Buttons
                            $("#preloader").hide();
                            $("#preloader-overlay").hide();

                            $('#llamar').show();
                            $("#block_llamar").show();

                            $('#iniciar').hide();
                            $("#block_iniciar").hide();

                            $('#finalizar').hide();
                            $('#block_finalizar').hide();

                            $('#cancelar').hide();
                            $('#block_cancelar').hide();

                            $("#block_llamar").removeClass();
                            $("#block_llamar").addClass("col s12 m12 animated bounceIn");

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

        var idTurn=$("#idTurn").val();

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

                if(value){
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
                            });
                            //Buttons
                            $("#preloader").hide();
                            $("#preloader-overlay").hide();

                            $('#llamar').show();
                            $("#block_llamar").show();

                            $('#iniciar').hide();
                            $("#block_iniciar").hide();

                            $('#finalizar').hide();
                            $('#block_finalizar').hide();

                            $('#cancelar').hide();
                            $('#block_cancelar').hide();

                            $("#block_llamar").removeClass();
                            $("#block_llamar").addClass("col s12 m12 animated bounceIn");
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

	function queryTurn(){

        var consulta = $.ajax({
                                method:'POST',
                                url: url+"Panel/Query",
                                data:{
                        "_token": $("meta[name='csrf-token']").attr("content")

            }, success: function(response) {

                console.log(response.turn[0]);
                code=response.turn[0];

                var acum="";

                for(i=0; i<response.turn.length; i++){

                    console.log(response.turn[i].random_code);
                    console.log(response.turn[i].clients.ci_client);

                    acum+="<a  class='collection-item avatar modal-trigger'>"+
                          "<i class='circle fas fa-user' style='background-color:#1860ab' >"+
                          "</i>"+
                          "<span class='title'>"+response.turn[i].random_code+"</span>"+"<br>"+
                          "<span class='title'>"+response.turn[i].clients.ci_client+"</span>"+
                          "</a>";
                }

                $("#turnPanel").html(acum);

            },error: function() {
                console.log("No se ha podido obtener la información");
            }

        });

    }

    setInterval(queryTurn, 1000);

});
