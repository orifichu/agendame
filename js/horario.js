function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

$( document ).ready(function() {
	// Handler for .ready() called.

	$('div.datepicker').datepicker({
		format: "YY-mm-dd",
		language: "es",
	}).on('changeDate', function (ev) {
		var string_parts = [];
		string_parts = $("th.datepicker-switch").text().split(' ');

		var month = '';
		var month_name = string_parts[0];
		if ( month_name == 'Enero' ) { month = '01'; };
		if ( month_name == 'Febrero' ) { month = '02'; };
		if ( month_name == 'Marzo' ) { month = '03'; };
		if ( month_name == 'Abril' ) { month = '04'; };
		if ( month_name == 'Mayo' ) { month = '05'; };
		if ( month_name == 'Junio' ) { month = '06'; };
		if ( month_name == 'Julio' ) { month = '07'; };
		if ( month_name == 'Agosto' ) { month = '08'; };
		if ( month_name == 'Septiembre' ) { month = '09'; };
		if ( month_name == 'Octubre' ) { month = '10'; };
		if ( month_name == 'Noviembre' ) { month = '11'; };
		if ( month_name == 'Diciembre' ) { month = '12'; };

		var year = string_parts[1].substring(0, 4);

		var day = $("div.datepicker td.active").text();
		if (day.length == 1) {day = '0' + day};

		var new_date = year+"-"+month+"-"+day;

		if ( new_date != getUrlParameter('fecha') ) {
			window.location.replace('horario.php?solicita='+getUrlParameter('solicita')+'&tp='+getUrlParameter('tp')+'&lugar='+getUrlParameter('lugar')+'&fecha='+new_date);
		};

		//alert(getUrlParameter('fecha'));
	});

	var date_parts = [];
	date_parts = getUrlParameter('fecha').split('-');
	$('div.datepicker').datepicker('setDate', new Date(date_parts[0], date_parts[1]-1, date_parts[2]));
});
