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
                    },
                    stringLength: {
                        min: 6,
                        message: 'The login must be more than 6 characters long'
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
                    stringLength: {
                        min: 6,
                        message: 'The password must be more than 6 characters long'
                    }
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
                    stringLength: {
                        min: 6,
                        message: 'The password confirm must be more than 6 characters long'
                    }
                }
            },
        }
    });

});