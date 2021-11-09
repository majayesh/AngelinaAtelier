$(document).ready(function() {
$('#contact_form').bootstrapValidator({
// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
feedbackIcons: {
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
},
fields: {
    descripcion: {
        validators: {
            stringLength: {
                min: 10,
                message:"La descripción del negocio debe tener al menos 10 caracteres."
            },
            notEmpty: {
                message: 'Por favor, ingrese la descripción del modelo.'
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
    ubicacion: {
        validators: {
            stringLength: {
                min: 200,
                message:"Ingrese la ubicación de Google Maps. (Compartir->Incorporar Mapa)"
            },
            notEmpty: {
                message: 'Por favor, ingrese una ubicación de Google Maps.'
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
});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


