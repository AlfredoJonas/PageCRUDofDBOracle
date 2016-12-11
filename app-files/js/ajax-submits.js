$(document).ready(function() {
	$('.formEmpleado').submit(function(event) {
		submitEmpleado(event);
	});

	$('.formCita').submit(function(event) {
		submitCita(event);
	});

	$('.formImplemento').submit(function(event) {
		submitImplemento(event);
	});

	$('.formConsultas').submit(function(event) {
		submitConsultas(event);
	});
});

function submitConsultas(event) {
	event.preventDefault();

	var form = $('.formConsultas');
	var ruta = $('.selectConsultas').data("ruta");
	var consulta = $('.selectConsultas option:selected').data("consulta");
	var data = form.serialize();
  var formMessages = $('#form-messages');

	$.ajax({
	  type: 'POST',
	  url: form.attr('action'),
	  data: {ruta: ruta, consulta: consulta, data_extra: data}
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.prepend('<div>Consulta procesada con <strong>éxito</strong></div>');

		var table_head = ""
		var table_body = ""

		var keys = Object.keys(response[0]);

		for(var key in keys)
			table_head += '<th>'+ keys[key]+'</th>';

		$('.table-head').html(table_head);

		for(var key in response)
			table_body += parseData(response[key]);

		$('.table-body').html(table_body);
	})

  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend('Oops! An error occured.');
	});

}

function submitEmpleado(event) {
  event.preventDefault();
	var form = $('.formEmpleado');
	var data = form.serialize();
  var formMessages = $('#form-messages');

	$.ajax({
	    type: 'POST',
	    url: form.attr('action'),
	    data: data
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.prepend('<div>Consulta procesada con <strong>éxito</strong></div>');
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend('<div>Oops! An <strong>error</strong> occured</div>');
	});
}

function submitCita(event){
  event.preventDefault();
	var form = $('.formCita');
	var data = form.serialize();
  var formMessages = $('#form-messages');

	$.ajax({
	    type: 'POST',
	    url: form.attr('action'),
	    data: data
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.prepend('<div>Consulta procesada con <strong>éxito</strong></div>');
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend('<div>Oops! An <strong>error</strong> occured</div>');
	});
}

function submitImplemento(event) {
  event.preventDefault();
	var form = $('.formImplemento');
	var data = form.serialize();
  var formMessages = $('#form-messages');

	$.ajax({
			type: 'POST',
			url: form.attr('action'),
			data: data
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.prepend('<div>Consulta procesada con <strong>éxito</strong></div>');
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend('<div>Oops! An <strong>error</strong> occured</div>');
	});
}

function submitHorario(event) {
	event.preventDefault();

						var formMessages = $("#form-messages");
						var form = $(".formHorario");

						if(agenda_DoctorOGlobal === 1 && agenda_DiarioRango === 1)
							consulta = "HORARIO_GLOBAL_DIA";

						if(agenda_DoctorOGlobal === 1 && agenda_DiarioRango === 2)
							consulta = "HORARIO_GLOBAL_RANGO";

						if(agenda_DoctorOGlobal === 2 && agenda_DiarioRango === 1)
							consulta = "HORARIO_DOCTOR_DIA";

						if(agenda_DoctorOGlobal === 2 && agenda_DiarioRango === 2)
							consulta = "HORARIO_DOCTOR_RANGO";

						console.log("DG: " + agenda_DoctorOGlobal + "     DR: " + agenda_DiarioRango);

						ruta = "RUTA_HORARIOS";
						data_e = $(".formHorario").serialize();

						$.ajax({
							type: 'POST',
							url: form.attr('action'),
							data: {consulta:consulta, ruta:ruta, data_extra: data_e}
						})

						.done(function(response) {
							formMessages.removeClass('hidden');
							formMessages.addClass('alert-success');

							formMessages.prepend(response);

							/*console.log(response);*/
							campoInsercion= $(".cuerpoTablaResultados");
							$(".cuerpoTablaResultados").empty();
							for(var key in response){
								fila_resultado = response[key];
								//console.log(fila_resultado);
								$(".cuerpoTablaResultados").append(
									"<tr>\
										<td>" + fila_resultado.FECHA + "</td>\
										<td>" + fila_resultado.DOCTOR + "</td>\
										<td>" + fila_resultado.PACIENTE + "</td>\
										<td>" + fila_resultado.TIPO + "</td>\
									</tr>");
							}

							$(".divTablaResultados").removeClass("hidden");
						})

						.fail(function(data) {
						console.log(data.responseText);
							formMessages.removeClass('hidden');
							formMessages.addClass('alert-danger');

							if (data.responseText !== '')
								formMessages.prepend(data.responseText);
							else
								formMessages.prepend('Oops! An error occured.');
						});
}
