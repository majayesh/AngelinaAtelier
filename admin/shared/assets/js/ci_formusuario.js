$(document).ready(function() {
$('#contact_form').bootstrapValidator({
// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
feedbackIcons: {
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
},
fields: {
    nombres: {
        validators: {
                stringLength: {
                min: 3,
                message:"Ingrese sus nombres completos"
            },
                notEmpty: {
                message: 'Por favor, ingrese los nombres'
            }
        }
    },
    apaterno: {
        validators: {
             stringLength: {
                min: 2,
                message:"Ingrese su apellido paterno completo"
            },
            notEmpty: {
                message: 'Por favor, ingrese el apellido paterno'
            }
        }
    },
    amaterno: {
        validators: {
            stringLength: {
                min: 2,
                message:"Ingrese su apellido materno completo"
            },
            notEmpty: {
                message: 'Por favor, ingrese el apellido materno'
            }
        }
    },
    dni: {
        validators: {
            stringLength: {
                min: 8,
                max: 8,
                message:"Ingrese los 8 dígitos de su DNI"
            },
            notEmpty: {
                message: 'Por favor, ingrese su DNI'
            },
            regexp: {
                regexp: /^[0-9]*$/,
                message: 'El dni sólo puede constar de números y no puede contener espacios.'
            }
        }
    },
    email: {
        validators: {
            notEmpty: {
                message: 'Por favor, ingrese el correo electrónico'
            },
            emailAddress: {
                message: 'Por favor, ingrese un correo electrónico válido'
            }
        }
    },
    telefono: {
        validators: {
            stringLength: {
                min: 9,
                max: 9,
                message:"Ingrese su número de celular de 9 dígitos"
            },
            notEmpty: {
                message: 'Por favor, ingrese un número de teléfono'
            }
        }
    },
    usuario: {
        validators: {
            stringLength: {
                min: 5,
                message:"Ingrese un nombre de usuario mas largo"
            },
            notEmpty: {
                message: 'Por favor, ingrese un usuario'
            }
        }
    },
    contrasena: {
        validators: {
            stringLength: {
                min: 5,
                message:"La contraseña es muy corta"
            },
            notEmpty: {
                message: 'Por favor, ingrese una contraseña'
            },
            regexp: {
                regexp: /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/,
                message: 'La contraseña debe contener por lo menos una mayúscula, una minúscula, un número y un caracter especial'
            }
        }
    }
    }
    }).on('success.form.bv', function(e) {
    $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
        $('#contact_form').data('bootstrapValidator').resetForm();

    // Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);

    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    // Use Ajax to submit form data
    $.post($form.attr('action'), $form.serialize(), function(result) {
        console.log(result);
    }, 'json');
});
});