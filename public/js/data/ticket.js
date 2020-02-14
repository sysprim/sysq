const url = "http://sysq.com.devel/";
//const url = "http://144.91.97.209/";
$(document).ready(function(){

    $('#update').click(function (e) { 
        e.preventDefault();

        var id = $('#id').val();
        var number = $('#number_ticket').val();
        var name = $('#name_ticket').val();
        var description = $('#description_ticket').val();

        swal({
            title: "¿Quiere modificar la información de la taquilla " + name + "?",
            text: "¿Esta seguro que desea modificar a la taquilla? Si lo hace, no podrá revertir los cambios.",
            icon: "error",
            buttons: {
                confirm: {
                    text: "Actualizar",
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
            }

        }).then(function(value){
            if(value == true){
                $.ajax({

                    method: "POST",
                    datatype: "JSON",
                    data: { id: id,
                            name : name,
                            description: description,
                            number: number,
                            "_token": $("meta[name='csrf-token']").attr("content")},  

                    url: url + "Ticket/Update",
                    
                    beforeSend: function () {
                        $("#preloader").fadeIn('fast');
                        $("#preloader-overlay").fadeIn('fast');
                },
        
                    success: function(data) {
                        console.log(data);
                        swal({
                            title: "¡Bien hecho!",
                            text: "Se ha actualizado la taquilla " +  name + " exitosamente.",
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
                            location.href = url + "Config";
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
                    text: "La informacion de la taquilla no ha sido modificada.",
                    icon: "info",
                    button: {
                        text: "Aceptar",
                        className: "green"
                    }
                });
            }
        });      
    });

    $('#delete').click(function(e) {

        var id = $('#id').val();

        swal({
            title: "¿Quiere eliminar la taquilla",
            text: "¿Esta seguro que desea eliminar la taquilla? Si lo hace todos los clientes en colas y atentidos seran eliminados, no podrá revertir los cambios.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Eliminar",
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
            }
        }).then(function(value){
            if(value == true){
                $.ajax({
                    method: "POST",
                    datatype: "JSON",
                    data: {id:id, "_token": $("meta[name='csrf-token']").attr("content")},
                    url: url + "Ticket/Delete",

                    beforeSend: function () {
                        $("#preloader").fadeIn('fast');
                        $("#preloader-overlay").fadeIn('fast');
                },
                    
                    success: function(data) {
                        console.log(data);
                        swal({
                            text: "Se ha eliminado la taquilla exitosamente.",
                            icon: "success",
                            button: {
                                text: "Entendido",
                                className: "green"
                            },
                            timer: 3000
        
                        }).then(redirect => {
                            location.href = url + "Config";
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
                        text: "La taquilla no ha sido eliminado",
                        icon: "info",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                });
            }
        });
    });

    
});