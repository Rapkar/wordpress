
jQuery('.timeline-contentbox').scroll(function () {
    var top = jQuery('.timeline-contentbox').scrollTop().valueOf();
    jQuery('.empa_timeline_widget').css('top', top);
});
jQuery('.empa_timeline_widget a').on('click', function (e) {
    e.preventDefault();
    jQuery('.empa_timeline_widget ul').fadeOut();
    var $container = jQuery(".timeline-contentbox");
    var $scrollTo = jQuery("." + jQuery(this).parent().attr('attr-id'));

    $container.animate({
        scrollTop: $scrollTo.offset().top - $container.offset().top +
            $container.scrollTop()
    }, 1300);
    
    jQuery('.empa_timeline_widget li').removeClass('active');
    jQuery(this).parent().addClass('active');
    jQuery('.empa_timeline_widget ul').fadeIn(1400);
});
jQuery('.scroll-up img').on('click',function(){
    jQuery(".timeline-contentbox").animate({ scrollTop: 0 }, "slow");
})
jQuery('.scroll-down img').on('click',function(){
    var $container = jQuery(".timeline-contentbox");
    var $scrollTo = jQuery(".end");

    $container.animate({
        scrollTop: $scrollTo.offset().top - $container.offset().top +
            $container.scrollTop()
    }, 1000);
})