/**
 * Created by anca.popa on 7/27/2017.
 */

$('.clinics-select').change( function() {

    var clinicId = $(this).val();

    $.ajax({

        url: window.location.origin +  "/api/clinics/" + clinicId + "/sections",

        success: function(result){

            $('.sections-select').empty();
            $('.sections-select').append('<option value="">Selecteaza o sectie</option>');

            if (typeof result.data !== 'undefined') {

                result.data.forEach(function(item, index) {

                    var $option = $('<option value="' + item.id + '">' + item.name + '</option>');

                    $('.sections-select').append($option);
                });

            }
        },

        error: function() {
            console.log('error');
        }
    });
});




$('.medic-section-select').change( function() {

    var sectionId = $(this).val();

    $.ajax({

        url: window.location.origin +  "/api/sections/" + sectionId + "/clinics",

        success: function(result){

            $('.medic-clinic-select').empty();
            $('.medic-clinic-select').append('<option value="">Selecteaza o clinica</option>');

            if (typeof result.data !== 'undefined') {

                result.data.forEach(function(item, index) {

                    var $option = $('<option value="' + item.id + '">' + item.name + '</option>');

                    $('.medic-clinic-select').append($option);

                });

            }
        },

        error: function() {
            console.log('error');
        }
    });
});


$('.sections-select').change( function() {

    var clinicId = $('.clinics-select').val();
    var sectionId = $('.sections-select').val();
    console.log(sectionId);

    $.ajax({

        url: window.location.origin +  "/api/clinics/" + clinicId + "/sections/" + sectionId + "/medics",

        success: function(result){

            console.log(result);

            $('.medics-select').empty();
            $('.medics-select').append('<option value="">Selecteaza medicul</option>');

            if (typeof result.data !== 'undefined') {

                result.data.forEach(function(item, index) {

                    var $option = $('<option value="' + item.id + '">' + item.name + '</option>');

                    $('.medics-select').append($option);
                });

            }
        },

        error: function() {
            console.log('error');
        }
    });
});