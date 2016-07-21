$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            login: {
                validators: {
                    notEmpty: {
                        message: 'The login is required and cannot be empty'
                    },
                    stringLength: {
                        max: 100,
                        message: 'The login must be less than 100 characters long'
                    }
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password_confirm',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        max: 100,
                        message: 'The password must be less than 100 characters long'
                    },
                }
            },

            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'The password confirm is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        max: 100,
                        message: 'The password confirm must be less than 100 characters long'
                    },
                }
            },
        }
    });

    $('[data-toggle="tooltip"]').tooltip();


    $('.del_confirm').click(function(e){
        var ans = confirm('Delete picture?')
        if(!ans){
            e.preventDefault();
        }
    });


    $('.send_message').click(function(e){
       var message_value = $('.message_textarea').val();
        if(message_value == ' '){
            e.preventDefault();
        }
    });

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current){
            $('#show-previous-image, #show-next-image').show();
            if(counter_max == counter_current){
                $('#show-next-image').hide();
            } else if (counter_current == 1){
                $('#show-previous-image').hide();
            }
        }

        /**
         *
         * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
         * @param setClickAttr  Sets the attribute for the click handler.
         */

        function loadGallery(setIDs, setClickAttr){
            var current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image').click(function(){
                if($(this).attr('id') == 'show-previous-image'){
                    current_image--;
                } else {
                    current_image++;
                }

                selector = $('[data-image-id="' + current_image + '"]');
                updateGallery(selector);
            });

            function updateGallery(selector) {
                var $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-caption').text($sel.data('caption'));
                $('#image-gallery-title').text($sel.data('title'));
                $('#image-gallery-image').attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if(setIDs == true){
                $('[data-image-id]').each(function(){
                    counter++;
                    $(this).attr('data-image-id',counter);
                });
            }
            $(setClickAttr).on('click',function(){
                updateGallery($(this));
            });
        }

});