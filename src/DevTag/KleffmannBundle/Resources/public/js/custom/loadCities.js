jQuery.fn.extend({
    loadCities: function(selectCity){
        $(selectCity).html('<option value="" selected="selected">-- Escoge un Estado --</option>');

        $(this).on('click', function()
        {
            var urlBase = '/cities/webservice/find-by-state/{state_id}';
            var stateId = $(this).val();

            $.getJSON(urlBase.replace('{state_id}', stateId) , function(cities)
            {
                $(selectCity).html('<option value="" selected="selected">-- Escoge un Municipio --</option>');

                cities.forEach(function(city)
                {
                    $(selectCity).append('<option value="'+city['id']+'">'+city['name']+'</option>');
                });
            });
        });
    }
});

$('#interviewer_type_state').loadCities('#interviewer_type_city');
$('#interviewer_zone_type_state').loadCities('#interviewer_zone_type_city');
$('#project_zone_type_state').loadCities('#project_zone_type_city');
$('#project_filter_type_state').loadCities('#project_filter_type_city');
