// const url = "http://localhost/sysq/public/";
const url = "http://144.91.97.209/";

$(document).ready(function(){

    $('#delete').click(function(e) {

        var id = $('#id').val();

        swal({
            title: "¿Quiere eliminar al usuario",
            text: "¿Esta seguro que desea eliminar al usuario? Si lo hace, no podrá revertir los cambios.",
            icon: "error",
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
                    url: url + "User/Delete",

                    beforeSend: function () {
                        $("#preloader").fadeIn('fast');
                        $("#preloader-overlay").fadeIn('fast');
                },

                    success: function(data) {
                        console.log(data);
                        swal({
                            text: "Se ha eliminado el usuario exitosamente.",
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
                        text: "El usuario no ha sido eliminado",
                        icon: "info",
                        button: {
                            text: "Aceptar",
                            className: "green"
                        }
                    });
            
            }
        });
    });

    $('#update').click(function (e) { 
        e.preventDefault();

        var id = $('#id').val();
        var name = $('#name').val();
        var email = $('#email').val();

        swal({
            title: "¿Quiere modificar la información de al Usuario " + name + "?",
            text: "¿Esta seguro que desea modificar al usuario? Si lo hace, no podrá revertir los cambios.",
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
                            email: email,
                            "_token": $("meta[name='csrf-token']").attr("content")},  

                    url: url + "User/Update",
                    
                    beforeSend: function () {
                        $("#preloader").fadeIn('fast');
                        $("#preloader-overlay").fadeIn('fast');
                },
        
                    success: function(data) {
                        console.log(data);
                        swal({
                            title: "¡Bien hecho!",
                            text: "Se ha actualizado al usuario " +  name + " exitosamente.",
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
                    text: "La informacion del usuario no ha sido modificada.",
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
