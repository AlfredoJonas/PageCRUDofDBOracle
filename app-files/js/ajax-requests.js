$(document).ready(function() {
    requestPacientes();
    requestDoctores();
	  requestEspecializaciones();
});

function parse_data(data, tipo) {
  if (tipo === 'multiple_select') {
    //Esto es porque yo tengo en mi BD una tabla con una columna usuario
    //pero ustedes me entienden
    return new Option(data.USUARIO.toLowerCase(), data.USUARIO);
  }
  else{
    if (tipo === 'single_select'){
    	return new Option(data.USUARIO.toLowerCase(), data.USUARIO);
    }
  }
}

function requestEspecializaciones() {
  var ruta = $('.especializaciones').data("ruta");
  var consulta = $('.especializaciones').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
	  type: 'POST',
	  url: 'ajax-handler.php',
	  data: {ruta: ruta, consulta: consulta}
	})

  .done(function(response) {
    $('.especializaciones').addClass('filled');

    for(var key in response) {
      document.querySelector('.especializaciones').options.add(parse_data(response[key], 'multiple_select'));
    }
	})

  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
	});
}

function requestPacientes(){
	var ruta = $('.pacienteSeleccion').data("ruta");
	var consulta = $('.pacienteSeleccion').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })

  .done(function(response) {
      $('.pacienteSeleccion').addClass('filled');

      for(var key in response) {
        document.querySelector('.pacienteSeleccion').options.add(parse_data(response[key], 'single_select'));
      }
  })

  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
  });
}

function requestDoctores(){
	var ruta = $('.doctorSeleccion').data("ruta");
	var consulta = $('.doctorSeleccion').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })
  .done(function(response){
    $('.doctorSeleccion').addClass('filled');

    for(var key in response) {
      document.querySelector('.doctorSeleccion').options.add(parse_data(response[key], 'single_select'));
    }
  })
  .fail(function(data) {
    formMessages.removeClass('hidden');
    formMessages.addClass('alert-danger');

    if (data.responseText !== '')
      formMessages.text(data.responseText);
    else
      formMessages.text('Oops! An error occured.');
  });
}
