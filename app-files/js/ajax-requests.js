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
					for(var key in response) {
						document.querySelector('.especializaciones').options.add(parseData(response[key], 'multiple_select'));
					}
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
						for(var key in response) {
							document.querySelector('.pacienteSeleccion').options.add(parseData(response[key], 'single_select'));
						}
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
					for(var key in response) {
						document.querySelector('.doctorSeleccion').options.add(parseData(response[key], 'single_select'));
					}
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

function requestInformacionCita(){
  var id_cita = parseInt($(".identificadorInput").text());
  var ruta = $('.doctorSeleccion').data("ruta");
	var consulta = $('.doctorSeleccion').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })
  .done(function(response){
      if(response.paciente){
        $('.doctorSeleccion').remove();

        $('.doctorSeleccionDiv').append('<input type="text" id="doctorInput" name="doctorInput" class="form-control doctorInput" readonly text="'+ response.doctor +'">');
      }

      if(response.doctor){
        $('.pacienteSeleccion').remove();

        $('.pacienteSeleccionDiv').append('<input type="text" id="pacienteInput" name="pacienteInput" class="form-control pacienteInput" readonly text="'+ response.paciente +'">');
      }

      if(response.fecha){
        $('.fechaInput').remove();
        $('.horaInput').remove();

        $('.fechaHoraDiv').append('<input type="text" id="fechaHoraInput" name="fechaHoraInput" class="form-control fechaHoraInput" readonly text="'+ response.fecha +'">');
      }

      if(response.odontograma){
        $('.odontogramaInput').remove();
        $('.presupuestoInput').attr("text",response.odontograma + "")
        $('.odontogramaInput').attr("readonly","readonly");
      }

      if(response.presupuesto){
        $('.presupuestoInput').remove();
        $('.presupuestoInput').attr("text",response.presupuesto + "")
        $('.presupuestoInput').attr("readonly","readonly");
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
