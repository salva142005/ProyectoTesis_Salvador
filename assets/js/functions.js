$(function (){
    var url = $('#base_url').text();
    $('#marca').change(function (){
        var marca_id = $(this).val();
        $.get(url+'index.php/equipo_controller/get_modelos_ajax/'+marca_id,  function (response){
            $('#wrapper_modelos').html(response);
        });
    });
    
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        language: 'es'
    });
});

