/**
 * Created by anca.popa on 7/27/2017.
 */

$('.clinics-select').change( function() {

    var clinicId = $(this).val();

    $.ajax({

        url: window.location.origin +  "/api/clinics/" + clinicId + "/sections",

        success: function(result){

            $('.sections-select').empty();
            $('.sections-select').append('<option value="0">Selecteaza o sectie</option>');

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