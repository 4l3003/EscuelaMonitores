
(function ($) {


    $('.btn-hide-contact100').on('click', function(){
        $('.container-contact100').fadeOut(300);
    });

    $('#formulario').on('click', function(){
        $('#form').fadeIn(300);
    });

    $('#cerrarsesion').on('click', function(){
document.location.href = 'cerrarsesion.php';
    });
   
})(jQuery);