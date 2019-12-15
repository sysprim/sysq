
$(document).ready(function () {

    $('#llamar').click(function(e){

        $('#text_llamar').html('Llamar de nuevo');

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

        $('#text_llamar').html('Llamar');
        //Buttons
        $("#block_llamar").show();
        $("#llamar").show();


        $('#finalizar').hide();
        $('#cancelar').hide();
        $('#iniciar').hide();

        $("#block_finalizar").hide();      
        $("#block_cancelar").hide();
        $("#block_iniciar").hide();
        

        $("#block_llamar").removeClass();

        $("#block_llamar").addClass("col s12 m12 animated bounceIn");

    });

    $('#cancelar').click(function (e){

        $('#text_llamar').html('Llamar');
        //Buttons
        $("#block_llamar").show();
        $("#llamar").show();


        $('#finalizar').hide();
        $("#block_finalizar").hide();
        $('#cancelar').hide();
        $("#block_cancelar").hide();
        $("#block_iniciar").hide();
        $("#iniciar").hide();

              
        $("#block_llamar").removeClass();
      
        $("#block_llamar").addClass("col s12 m12 animated bounceIn");

    });

    //funcional
    $('#modal').click(function (e){
        $('#ticket').modal();
        $('#ticket').modal('open');
    });

});