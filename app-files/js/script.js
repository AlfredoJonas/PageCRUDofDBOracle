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
					requestNombreDoctores();
					$(".divDoctores").removeClass("hidden");
					$(".doctorSeleccion").prop("disabled", false);
				break;
			}
			agenda_DoctorOGlobal = tipo;
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

			agenda_DiarioRango = tipo;
			$(".fechasDiv").removeClass("hidden");
			break;

		case 'CRUD':
			$('.fields').addClass('hidden');
			$('.search').addClass('hidden');

			if(tipo != 1)
				$('.search').removeClass('hidden');
			else
				$('.fields').removeClass('hidden');

			break;
	}
}

function parseData(data, tipo) {
	if(tipo === "multiple_select" || tipo == "single_select")
  	return new Option(data.NOMBRE, data.NOMBRE);
	else {
		var resp = "<tr>";
		for(var key in data) {
			resp += '<td>'+data[key]+'</td>';
		}
		resp += "</tr>"

		return resp;
	}
}

function fillTable(response) {
	var table_head = ""
	var table_body = ""

	var keys = Object.keys(response[0]);

	for(var key in keys)
		table_head += '<th>'+keys[key]+'</th>';

	$('.table-head').html(table_head);

	for(var key in response)
		table_body += parseData(response[key]);

	$('.table-body').html(table_body);
}
