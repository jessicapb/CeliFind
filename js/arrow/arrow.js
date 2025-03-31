var $j = jQuery.noConflict();

$j('a#scroll-top').show();

$j('a#scroll-top').click(function(event) {
    event.preventDefault();
    $j('html, body').animate({scrollTop: 0}, 600);
});
