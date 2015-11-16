$( document ).ready(function() {
	// Handler for .ready() called.

	$(document).on('submit','form#data',function(e){
		//si hay archivo entonces que solo sean pdf
		var oficio = $('#oficio').val(); 
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
});
