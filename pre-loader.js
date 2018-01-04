$('.pre-loader').not(this).hide();
$(document).ready(function(){
    $('.pre-loader').slideUp(function(){
        $('.pre-loader').not(this).show();
    });
});