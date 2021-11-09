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
    codigo: {
        validators: {
            stringLength: {
                min: 9,
                max: 9,
                message:"El código del modelo consta de 9 caracteres."
            },
                notEmpty: {
                message: 'Por favor, ingrese el código del modelo.'
            },
            callback: {
                    
                message: 'El código de modelo ya existe.',
                callback: function (value, validator, field) {
                    
                    var decision = function () {
                    var tmp = null;
                    var dataString = 'codigo='+value;
                    $.ajax({
                        'async': false,
                        'type': "POST",
                        'global': false,
                        'url': "../../admin/modelsModule/verificarCodigo.php",
                        'data': dataString,
                        success: function(data) {
                            tmp=data;
                        }
                    });
                        return tmp;
                    }();

                    if (decision==1) {
                        return false;
                    }
                    if (decision==0) {
                        return true;
                    }
                    
                }
            }
        }
    },
    nombre: {
        validators: {
            stringLength: {
                min: 4,
                message:"El nombre del modelo debe tener al menos 4 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese el nombre del modelo'
            }
        }
    },
    descripcion: {
        validators: {
            stringLength: {
                min: 10,
                message:"La descripción del modelo debe tener al menos 10 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese la descripción del modelo.'
            }
        }
    },
    colorprimario: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona un color primario del modelo.'
            }
        }
    },
    tipoprenda: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona un tipo de prenda del modelo.'
            }
        }
    },
    tela: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona un tipo de tela del modelo.'
            }
        }
    },
    sexo: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona el sexo para el que va dirigido el modelo.'
            }
        }
    },
    estado: {
        validators: {
            notEmpty: {
                message: 'Por favor, selecciona un estado para el modelo.'
            }
        }
    },
    imagen: {
        validators: {
            notEmpty: {
                message: 'Por favor, carga la imagen del modelo.'
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