$(document).ready(function() {
    $('.navbar-nav li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.contents .card-body').click(function () {
        $(this).parent().prev('.content-video').fadeToggle();
    });


});
