$(".tab-menu ul li").on('click', function() {
    let index = $(".tab-menu ul li").index(this);
    $('.tab-contents div').removeClass('on');
    $('.tab-menu ul li').removeClass('checked');
    $('.img-container>div').removeClass('on');
    $('.tab-menu ul li:eq('+ index +')').addClass('checked');
    $('.tab-contents div:eq('+ index +')').addClass('on');
    $('.img-container>div:eq('+index+')').addClass('on');
})