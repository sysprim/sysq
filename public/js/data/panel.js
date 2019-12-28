$(document).ready(function(){

	function queryTurn(){

        var consulta = $.ajax({
                                method:'POST',
                                url: url+"Panel/Query",
                                data:{
                        "_token": $("meta[name='csrf-token']").attr("content")

            }, success: function(response) {

                console.log(response.turn[0]);

                acum="";

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