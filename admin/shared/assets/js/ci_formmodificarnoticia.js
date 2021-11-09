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
    titular: {
        validators: {
            stringLength: {
                min: 5,
                message:"El titular de la noticia debe tener al menos 5 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese el titular de la noticia.'
            }
        }
    },
    resena: {
        validators: {
            stringLength: {
                min: 10,
                message:"La resena de la noticia debe tener al menos 10 caracteres."
            },
            notEmpty: {
                message: 'Por favor, resena de la noticia.'
            }
        }
    },
    contenido: {
        validators: {
            stringLength: {
                min: 30,
                message:"El contenido de la noticia debe tener al menos 30 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese el contenido de la noticia.'
            }
        }
    },
    estado: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona un estado para la noticia.'
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