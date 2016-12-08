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

	$('.selectConsultas').change(function(event) {
		requestConsultas(event);
	});
});

function requestConsultas(event) {
	event.preventDefault();
	var form = $('.formConsultas');
	var data = $('.selectConsultas option:selected').val();
  var formMessages = $('#form-messages');

	$.ajax({
	    type: 'POST',
	    url: form.attr('action'),
	    data: {datadata}
	})

  .done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.text(response);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.innerHtml = data.responseText;
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

    formMessages.text(response);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.innerHtml = data.responseText;
    else
      formMessages.text('Oops! An error occured.');
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

    formMessages.text(response);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.innerHtml = data.responseText;
    else
      formMessages.text('Oops! An error occured.');
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

    formMessages.text(response);
	})

  .fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.innerHtml = data.responseText;
    else
      formMessages.text('Oops! An error occured.');
	});
}
