$(document).ready(function(){

    var altoPagina = $(window).innerHeight()-220;
    var altoPaginaHome = $(window).innerHeight()-280;

    //console.log( "Alto Pagina: " + altoPagina );
    //console.log( "Alto Home: " + altoPaginaHome );

    $('.site-content').css('min-height' , altoPagina );
    $('.content-area').css('min-height' , altoPagina );
    $('.content-area.home .site-main').css('min-height' , altoPaginaHome );
    $('.site-content.home').css('min-height' , altoPaginaHome - 30 );
    $('.formulario-producto').css('height' , $(window).innerHeight() );
    /*--------------------------------------------------------------
    ## Menu Responsive
    --------------------------------------------------------------*/
        $('.btn-abrir').click(function(){
            $('.site-header').toggleClass('show');
        });
        //Cerrar menu
        $('.btn-cerrar').click(function(){
            $('.site-header').toggleClass('show');
        });

    /*--------------------------------------------------------------
    ## Suscribite
    --------------------------------------------------------------*/
        $('.suscripbite-mostrar').click(function(){
            $('.formulario-suscriptor').toggleClass('mostrar');
        });
        //Cerrar menu
        $('.suscribite-salir').click(function(){
            $('.formulario-suscriptor').toggleClass('mostrar');
        });

    /*--------------------------------------------------------------
    ## Suscribite
    --------------------------------------------------------------*/
        $('.producto-mostrar').click(function(){
            $('.formulario-producto').toggleClass('mostrar');
            var nombre = $(this).siblings("h2").text();
            $(".producto-nombre").val(nombre);

        });
        //Cerrar menu
        $('.producto-salir').click(function(){
            $('.formulario-producto').toggleClass('mostrar');
        });

    $('.slider-home').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        fade: true,
        infinite: true
    });

});

$(window).on("load", function(){
    $('.slick-track').css('height' , $(window).innerHeight()-250 );
});

$( window ).scroll(function() {
  $( ".welcome" ).addClass('ocultar');
});
