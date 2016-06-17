       jQuery(function($) {
                // bind event handlers to modal triggers
                $('body').on('click', '.trigger', function(e) {
                    e.preventDefault();
                    $('#test-modal').modal().open();
                });
           
                  $('body').on('click', '.about-us', function(e) {
                    e.preventDefault();
                    $('#about-us').modal().open();
                });
           
                               // attach modal close handler
                $('body').on('click', '.close', function(e) {
                    e.preventDefault();
                    $.modal().close();
                });

            });
