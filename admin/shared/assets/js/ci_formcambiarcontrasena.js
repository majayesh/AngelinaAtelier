$(document).ready(function() {

$('#contact_form').bootstrapValidator({
// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
feedbackIcons: {
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
},
fields: {
    contrasenanueva: {
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
    },
    contrasenanuevaconfirmar: {
        validators: {
            notEmpty: {
                message: 'Repita la contraseña nueva'
            },
            identical: {
                message: "Las contraseñas no coinciden",
                field: "contrasenanueva"
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