// const url = "http://localhost/sysq/public/";
const url = "http://144.91.97.209/";

function deleteVideo(id){
    
    var id = id;

    swal({
        title: "¿Quiere eliminar el video?",
        text: "¿Esta seguro que desea eliminar el video? Si lo hace, no podrá revertir los cambios.",
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
                url: url + "Video/Delete",

                beforeSend: function () {
                    $("#preloader").fadeIn('fast');
                    $("#preloader-overlay").fadeIn('fast');
            },

                success: function(data) {
                    console.log(data);
                    swal({
                        text: "Se ha eliminado el video exitosamente.",
                        icon: "success",
                        button: {
                            text: "Entendido",
                            className: "green"
                        },
                        timer: 3000
    
                    }).then(redirect => {
                        location.href = url + "Video";
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
                    text: "El video no ha sido eliminado",
                    icon: "info",
                    button: {
                        text: "Aceptar",
                        className: "green"
                    }
                });
        
        }
    });
}