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

  $('.formAgenda').submit(
    function(event){
      submitInfoAgenda(event);
    }
    );
});



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

function submitInfoAgenda(event){
  evet.preventDefault();
  var form = $('.formImplemento');
	var data = form.serialize();
  var formMessages = $('#form-messages');
  var tipo_consulta = null;

agenda_DoctorOGlobal = 0;
agenda_DiarioRango = 0;

  switch(agenda_DoctorOGlobal){
    case 1:
      switch(agenda_DiarioRango){
        case 1: tipo_consulta = "HORARIO_GLOBAL_DIA";return;
        case 2: tipo_consulta = "HORARIO_GLOBAL_RANGO";return;
      }
    break;
    case 2:
      switch(agenda_DiarioRango){
        case 1: tipo_consulta = "HORARIO_DOCTOR_DIA";return;
        case 2: tipo_consulta = "HORARIO_DOCTOR_RANGO";return;
      }
    break;
  }

	$.ajax({
			type: 'POST',
			url: form.attr('action'),
			data: {consulta : tipo_consulta, ruta : "horarios", data_extra: data}
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

//comentario salva patrias
