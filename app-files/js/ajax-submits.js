var mensaje_exito = 'Consulta procesada con <strong>éxito</strong>';
var mensaje_falla = 'Oops! Un <strong>error</strong> ha ocurrido';

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

		formMessages.prepend(mensaje_exito);

		fillTable(response);
	})

  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend(mensaje_falla);
	});

}

function submitEmpleado(event) {
  event.preventDefault();
	var form = $('.formEmpleado');
	var data = form.serialize();
  var formMessages = $('#form-messages');
	var ruta = 'RUTA_EMPLEADO';
	var operacion = $('input[name=tipoCRUD]:checked').val();

	$.ajax({
	    type: 'POST',
	    url: form.attr('action'),
	    data: {data, ruta: ruta, operacion: operacion}
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

		formMessages.prepend(mensaje_exito);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend(mensaje_falla);
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

		formMessages.prepend(mensaje_exito);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend(mensaje_falla);
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

		formMessages.prepend(mensaje_exito);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.prepend(data.responseText);
    else
      formMessages.prepend(mensaje_falla);
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

		formMessages.prepend(mensaje_exito);

		fillTable(response);
	})

	.fail(function(data) {
	console.log(data.responseText);
		formMessages.removeClass('hidden');
		formMessages.addClass('alert-danger');

		if (data.responseText !== '')
			formMessages.prepend(data.responseText);
		else
      formMessages.prepend(mensaje_falla);
	});
}
