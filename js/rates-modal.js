       jQuery(function($) {
           
                           // attach modal close handler
                $('.modal .close').on('click', function(e) {
                    e.preventDefault();
                    $.modal().close();
                });

                $('body').on('click', '.first-modal', function(e) {
                    e.preventDefault();
                    $('#first-modal').modal().open();
                });

                $('body').on('click', '.second-modal', function(e) {
                    e.preventDefault();
                    $('#second-modal').modal().open();
                });

                $('body').on('click', '.third-modal', function(e) {
                    e.preventDefault();
                    $('#third-modal').modal().open();
                });

                $('body').on('click', '.fourth-modal', function(e) {
                    e.preventDefault();
                    $('#fourth-modal').modal().open();
                });

                $('body').on('click', '.fifth-modal', function(e) {
                    e.preventDefault();
                    $('#fifth-modal').modal().open();
                });

                $('body').on('click', '.sixth-modal', function(e) {
                    e.preventDefault();
                    $('#sixth-modal').modal().open();
                });

                $('body').on('click', '.seventh-modal', function(e) {
                    e.preventDefault();
                    $('#seventh-modal').modal().open();
                });
           
                       });