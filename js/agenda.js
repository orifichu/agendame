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

	$( "a.delete" ).on( "click", function() {
		//para evitar errores ponemos esta línea que evitará la redirección
		$(this).attr("href", "#");

		if (confirm("¿Desea eliminar la videoconferencia?")) {
			
		} else {
			return false;
		};

		var id = $(this).attr("id");
		var fecha = $('input[id=fecha]').val();

		var href = "videoconferencia_delete.php?id="+id+"&fecha="+fecha;

		$(this).attr("href", href);
	});

	$( "a.quick_edit" ).on( "click", function() {
		//para evitar errores ponemos esta línea que evitará la redirección
		$(this).attr("href", "#");

		var id = $(this).attr("name");

		//$( "div#" + id ).removeClass( "hide" )
		$( "div#" + id ).show( "slow", function() {
		    // Animation complete.
		});
	});

	$( "a.cancel" ).on( "click", function() {
		//para evitar errores ponemos esta línea que evitará la redirección
		$(this).attr("href", "#");

		var id = $(this).attr("id");

		$( "div#" + id ).hide( 1000 );
	});

	$(document).on('submit','form.data',function(e){
		//si hay archivo entonces que solo sean pdf
		var oficio = $(this).find('#oficio').val(); 
        if(oficio!='') 
        { 
            var extension = oficio.substr( (oficio.lastIndexOf('.') +1) );
            extension = extension.toLowerCase();
		    switch(extension) {
		        case 'pdf':
		            break;
		        default:
		            alert('Solo se admiten archivos PDF');
		            return false;
		    }
        }

		//si todo está bien entonces submit
		
	});

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
			window.location.replace('agenda.php?fecha='+new_date);
		};

		//alert(getUrlParameter('fecha'));
	});

	var date_parts = [];
	date_parts = getUrlParameter('fecha').split('-');
	$('div.datepicker').datepicker('setDate', new Date(date_parts[0], date_parts[1]-1, date_parts[2]));
});
