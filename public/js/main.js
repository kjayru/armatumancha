let generico = document.querySelectorAll('.btn-generico');

$(".btn-generico").click(function(e){
    e.preventDefault();
    $(".btn-generico").removeClass('activado');
    $(this).addClass('activado');

});
