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

  $('.especializaciones').focus(getEspecializaciones);

});

function getEspecializaciones() {
  var ruta = $('.especializaciones').data("ruta");
  var consulta = $('.especializaciones').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
	    type: 'POST',
	    url: 'ajax-handler.php',
	    data: {ruta: ruta, consulta: consulta}
	}).done(function(response) {
    $('.especializacion').innerHTML(response);
	}).fail(function(data) {
    if (data.responseText !== '')
      formMessages.text(data.responseText);
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
	}).done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.text(response);
	}).fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
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
	}).done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.text(response);
	}).fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
	});
}

function submitImplemento(event){
  event.preventDefault();
	var form = $('.formImplemento');
	var data = form.serialize();
  var formMessages = $('#form-messages');

	$.ajax({
			type: 'POST',
			url: form.attr('action'),
			data: data
	}).done(function(response) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-success');

    formMessages.text(response);
	}).fail(function(data) {

    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
	});
}
