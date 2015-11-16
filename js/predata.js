$( document ).ready(function() {
	// Handler for .ready() called.

	$( "#btn-next" ).on( "click", function() {
		//para evitar errores ponemos esta línea que evitará la redirección
		$(this).attr("href", "#");

		var solicita = $('input[id=solicita]').val();

		//tp: tiene polycom
		var tp = 0;
		//la sección está comentada pues se dará por supuesto que no hay equipo polycom disponible
		/*var tp = $('input[name=tp]:checked').val();

		if (solicita=='casa') {
			if (tp!=0 && tp!=1) {
				alert("Responda la pregunta: ¿Su sala posee un equipo Polycom?");
				return false;
			};
		} else {
			tp = 0;
		};*/
		
		var lugar = '';
		var lugar_array = [];

		$("input[type=checkbox]:checked").each(function(){
			//cada elemento seleccionado
			lugar_array.push( $(this).val() );
		});
		lugar = lugar_array.join(',');

		if (lugar=='') {
			alert("Responda la pregunta: ¿Entre qué sedes se realizará la videoconferencia?");
			return false;
		};

		if (solicita=='casa') {
			if (lugar_array.length <= 1 ) {
				alert("Necesita un mínimo de dos sedes para realizar una videoconferencia");
				return false;
			};
		} else {
			if (lugar_array.length <= 0 ) {
				alert("Necesita un mínimo de una sede con quién realizar la videoconferencia");
				return false;
			};
		};
		
		var href = "horario.php?solicita="+solicita+"&tp="+tp+"&lugar="+lugar;

		//fecha de hoy
		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var output = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

		href = href + '&fecha='+output;

		$(this).attr("href", href);
	});
});
