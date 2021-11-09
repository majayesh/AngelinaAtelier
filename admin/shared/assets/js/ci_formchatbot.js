/*
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
                .width(305)
                .height(305);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
*/

$(document).ready(function() {
    

$('#contact_form').bootstrapValidator({
// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
feedbackIcons: {
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
},
fields: {
    pregunta: {
        validators: {
            stringLength: {
                min: 5,
                max: 40,
                message:"La pregunta debe tener de 5 a 40 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese una pregunta.'
            }
        }
    },
    respuesta: {
        validators: {
            stringLength: {
                min: 5,
                max: 150,
                message:"La respuesta debe tener de 5 a 150 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese la respuesta a la pregunta.'
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