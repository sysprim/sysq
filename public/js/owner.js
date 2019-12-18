$(window).on("load", function () {

    $("#preloader").fadeOut("fast");
    $("#preloader-overlay").fadeOut("fast");
});

$(document).ready(function(){
    $('.sidenav').sidenav({
        edge: 'right'
    });
    $('.modal').modal();
});