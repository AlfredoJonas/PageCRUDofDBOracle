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

    formMessages.prepend('Consulta procesada con éxito');

		for(var key in response) {
			$('.table-body').append(parseData(response[key]));
		}
	})

  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.html(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
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

    formMessages.prepend(response);
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

    formMessages.prepend(response);
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

    formMessages.prepend(response);
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
