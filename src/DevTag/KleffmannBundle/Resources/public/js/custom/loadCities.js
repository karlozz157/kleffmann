jQuery.fn.extend({
    select: function(params) {
        var label = '<option value="" selected="selected"> -- ' + params.label + ' -- </option>';

        if ('' == $(params.element).val()) {
            $(params.element).html(label);
        }

        $(this).on('click', function(){
            var url   = params.url.replace('{id}', $(this).val());
            $(params.element).html(label);

            $.getJSON(url, function(dataResult){
                // append on the select each data result
                dataResult.forEach(function(data) {
                    $(params.element).append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
                });
            });
        });
    }
});

function loadCities()
{
    var url   = '/ciudades/webservice/buscar-por-estado/{id}';
    var label = 'Escoge un Municipio';

    $('#interviewer_type_state').select({
        element: '#interviewer_type_city',
        label: label,
        url: url
    });

    $('#interviewer_zone_type_state').select({
       element:  '#interviewer_zone_type_city',
        label: label,
        url: url
    });

    $('#project_zone_type_state').select({
        element: '#project_zone_type_city',
        label: label,
        url: url
    });

    $('#project_filter_type_state').select({
        element: '#project_filter_type_city',
        label: label,
        url: url
    });
}

function loadDistricts()
{
    var url   = '/distritos/webservice/buscar-por-estado/{id}';
    var label = 'Escoge un Municipio';

    $('#project_zone_type_state').select({
        element: '#project_zone_type_district',
        label: label,
        url: url
    });
}

$(document).on('ready', function(){
    loadDistricts();
    loadCities();
});
