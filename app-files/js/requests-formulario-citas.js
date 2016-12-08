$(document).ready(
				{   
                    hacerPeticiones();
				}
			);
function hacerPeticiones(){
    requestPacientes();
    requestDoctores();
}

function requestPacientes(){
	var ruta = $('.pacienteSeleccion').data("ruta");
	var consulta = $('.pacienteSeleccion').data("consulta");
    var formMessages = $('#form-messages');

    $.ajax({
            type: 'POST',
            url: 'ajax-handler.php',
            data: {ruta: ruta, consulta: consulta}
        }
    )
    .done(
        function(response){
            $('.pacienteSeleccion').addClass('filled');

            for(var key in response) {
                document.querySelector('.pacienteSeleccion').options.add(parse_data(response[key], 'single_select'));
            }
        }
    )
    .fail(
        function(data) {
            if (data.responseText !== '')
                formMessages.text(data.responseText);
            else
                formMessages.text('Oops! An error occured.');
	    }
    );
}

function requestDoctores(){
	var ruta = $('.doctorSeleccion').data("ruta");
	var consulta = $('.doctorSeleccion').data("consulta");
    var formMessages = $('#form-messages');

    $.ajax({
            type: 'POST',
            url: 'ajax-handler.php',
            data: {ruta: ruta, consulta: consulta}
        }
    )
    .done(
        function(response){
            $('.doctorSeleccion').addClass('filled');

            for(var key in response) {
                document.querySelector('.doctorSeleccion').options.add(parse_data(response[key], 'single_select'));
            }
        }
    )
    .fail(
        function(data) {
            if (data.responseText !== '')
                formMessages.text(data.responseText);
            else
                formMessages.text('Oops! An error occured.');
	    }
    );
}