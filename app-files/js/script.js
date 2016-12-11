/* Atributos globales */
agenda_DoctorOGlobal = 0;
agenda_DiarioRango = 0;


function insertHTML(from = '', tipo = 0) {

	switch (from) {
		case 'consultas':
			var options = $('.selectConsultas option:not(:selected)');
			for (var option in options) {
				$('.'+options[option].value).addClass('hidden');
				$('.'+options[option].value+' input').prop('disabled', true);
			}

			var option = $('.selectConsultas option:selected').val();
			$('.'+option).removeClass('hidden');
			$('.'+option+' input').prop('disabled', false);
			break;

		case 'doctor':
			switch(tipo){
				case 1:
					$(".divDoctores").addClass("hidden");
					$(".doctorSeleccion").prop("disabled", true);
				break;
				case 2:
					requestDoctores();
					$(".divDoctores").removeClass("hidden");
					$(".doctorSeleccion").prop("disabled", false);
				break;
			}
			agenda_DoctorOGlobal = option;
			break;

		case 'empleados':
			switch(tipo){
				case 1:
					$(".empleado").removeClass('hidden');
					$(".empleado input").prop("disabled", false);

					$(".doctor").addClass('hidden');
					$(".doctor input").prop("disabled", true);
				break;

				case 2:
					$(".doctor").removeClass('hidden');
					$(".doctor input").prop("disabled", false);

					$(".empleado").addClass('hidden');
					$(".empleado input").prop("disabled", true);
				break;
			}
			break;

		case 'dia':
			switch(tipo){
				case 1:
					$(".dia-especifico").removeClass('hidden');
					$('.dia-especifico').prop('disabled', false);
					$(".rango").addClass('hidden');
					$('.rango').prop('disabled', true);
					break;
				case 2:
					$(".rango").removeClass('hidden');
					$('.rango').prop('disabled', false);
					$(".dia-especifico").addClass('hidden');
					$('.dia-especifico').prop('disabled', true);
					break;
				}

			agenda_DiarioRango = option;
			$(".fechasDiv").removeClass("hidden");
			break;
	}
}

function parseData(data, tipo) {
	if(tipo === "multiple_select" || tipo == "single_select")
  	return new Option(data.NOMBRE, data.NOMBRE.toLowerCase());
	else {
		var resp = "<tr>";
		for(var key in data) {
			resp += '<td>'+data[key]+'</td>';
		}
		resp += "</tr>"

		return resp;
	}
}
