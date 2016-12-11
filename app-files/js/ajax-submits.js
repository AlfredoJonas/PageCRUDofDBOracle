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

		formMessages.prepend('Consulta procesada con <strong>éxito</strong>');

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

    formMessages.prepend('Consulta procesada con <strong>éxito</strong>');
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

	if(agenda_DoctorOGlobal === 1 && agenda_DiarioRango === 1)
		$(".consulta").attr("value","HORARIO_DOCTOR_DIA")

	if(agenda_DoctorOGlobal === 1 && agenda_DiarioRango === 2)
		$(".consulta").attr("value","HORARIO_DOCTOR_RANGO")

	var form = $('.formImplemento');
	var data = form.serialize();
	var formMessages = $('#form-messages');

	console.log($(".consulta").val());
	console.log("YOLO");

	$.ajax({
			type: 'POST',
			url: form.attr('action'),
			data: data
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    //formMessages.prepend(response);
		//console.log(response);
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
