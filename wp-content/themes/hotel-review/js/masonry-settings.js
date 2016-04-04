// Masonry settings to organize footer widgets
jQuery(document).ready(function($){
    
if ($(document).width() < 514) {
        var tar = $('.panel-heading span.clickable');
        if (!$('.panel-heading').hasClass('panel-collapsed')) {
        // collapse the panel
            tar.parents('.panel').find('.panel-body').slideUp();
            tar.addClass('panel-collapsed');
            tar.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        }

    };

    
    
    
    var $container = $('#footer-widgets');
    var $masonryOn;
    var $columnWidth = 400;
    
    if ($(document).width() > 879) {;
        $masonryOn = true;
        runMasonry();
    };

    $(window).resize( function() {
        if ($(document).width() < 879) {
            if ($masonryOn){
                $container.masonry('destroy');
                $masonryOn = false;
            }

        } else {
            $masonryOn = true;
            runMasonry();
        }
    });
    
    function runMasonry() {
        // initialize
        $container.masonry({
            columnWidth: $columnWidth,
            itemSelector: '.widget',
            isFitWidth: true,
            isAnimated: true
        });
    };
    
    //adding the Panel here to save enqueuing a new js file
 jQuery(function ($) {
        $('.panel-heading span.clickable').on("click", function (e) {
            if ($(this).hasClass('panel-collapsed')) {
                // expand the panel
                $(this).parents('.panel').find('.panel-body').slideDown();
                $(this).removeClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
            else {
                // collapse the panel
                $(this).parents('.panel').find('.panel-body').slideUp();
                $(this).addClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            }
        });
    });





});
                


