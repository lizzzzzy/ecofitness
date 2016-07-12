    jQuery(function($) {
                // bind event handlers to modal triggers
                $('body').on('click', '.trigger', function(e) {
                    e.preventDefault();
                    $('#test-modal').modal().open();
                });

//$(window).load(function (e) {
//  // манипуляции с готовой страницей
//      e.preventDefault();
//    $('#promo-modal').modal().open();
//});

                // attach modal close handler
                $('.close').on('click', function(e) {
                    e.preventDefault();
                    $('#test-modal').modal().close();
                });
 });