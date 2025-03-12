$("div.menu-trigger").on('click', function() {
    if($('div.menu-trigger').hasClass('active-1')){
        $('div.menu-trigger').removeClass('active-1');
        $('.ham-menu').removeClass('on');
    }else{
        $('div.menu-trigger').addClass('active-1');
        $('.ham-menu').css({display:'block'});
        $('.ham-menu').addClass('on');
    }
})