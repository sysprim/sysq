 const url = "http://localhost/sysq/public/";
 
 $('#delete').click(function () { // recibe el parametro eliminar por el id del formulario

        // Datos de los input en la vista

        var id = $('#user').val();

        // Mostrar alerta de confirmacion para eliminar datos
        
        swal({
            title: "¿Quiere eliminar al Usuario?",
            text: "¿Esta seguro que desea eliminar al usuario? Si lo hace, no podrá revertir los cambios.",
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
                    data: {id:id},
                    url: url + "User/Eliminar",
                });

                swal({
                    text: "Se ha eliminado la tela exitosamente.",
                    icon: "success",
                    button: {
                        text: "Entendido",
                        className: "green"
                    },
                    timer: 3000
                })
                .then(redirect => {
                    location.href = url + "getAll";
                });
            }else {
                swal({
                    text: "La tela no ha sido eliminado",
                    icon: "info",
                    button: {
                        text: "Aceptar",
                        className: "green"
                    }
                });
            }
        });
    });