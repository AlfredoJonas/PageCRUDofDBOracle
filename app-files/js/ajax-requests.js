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
    console.log(data.responseText);
		formMessages.removeClass('hidden');
		formMessages.addClass('alert-danger');

		if (data.responseText !== '')
			formMessages.prepend(data.responseText);
		else
			formMessages.prepend('Oops! An error occured.');
	});
}

function requestNombrePacientes(){
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
			formMessages.prepend(data.responseText);
		else
			formMessages.prepend('Oops! An error occured.');
	});
}

function requestNombreDoctores(){
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
			formMessages.prepend(data.responseText);
		else
			formMessages.prepend('Oops! An error occured.');
	});
}

function requestDoctorGlobalSchedule(){
	return null;
}

function requestInformacionCita(){
  var id_cita = parseInt($(".identificadorInput").val());
  var ruta = $('.identificadorInput').data("ruta");
	var consulta = $('.identificadorInput').data("consulta");
  var formMessages = $('#form-messages');

  $.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta, data_extra:"id_cita="+id_cita}
  })

  .done(function(response){
		data_response = response[0];
		console.log(data_response);
    if(typeof data_response.DOCTOR !== 'undefined'){
      $('.doctorSeleccion').remove();
			$('.doctorInput').remove();

      $('.doctorSeleccionDiv').append('<input type="text" id="doctorInput" name="doctorInput" class="form-control doctorInput" readonly value="'+ data_response.DOCTOR +'">');
    }

    if(typeof data_response.PACIENTE !== 'undefined'){
      $('.pacienteSeleccion').remove();
			$('.pacienteInput').remove();

      $('.pacienteSeleccionDiv').append('<input type="text" id="pacienteInput" name="pacienteInput" class="form-control pacienteInput" readonly value="'+ data_response.PACIENTE +'">');
    }

    if(typeof data_response.FECHA !== 'undefined'){
      $('.fechaInput').remove();
      $('.horaInput').remove();
			$('.fechaHoraInput').remove();

      $('.fechaHoraDiv').append('<input type="text" id="fechaHoraInput" name="fechaHoraInput" class="form-control fechaHoraInput" readonly value="'+ data_response.FECHA +'">');
    }

    if(typeof data_response.ODONTOGRAMA !== 'undefined'){
      //$('.odontogramaInput').remove();
      $('.odontogramaInput').attr("value",data_response.ODONTOGRAMA + "")
      $('.odontogramaInput').attr("readonly","readonly");
    }

    if(typeof data_response.PRESUPUESTO !== 'undefined'){
      //$('.presupuestoInput').remove();
      $('.presupuestoInput').attr("value",data_response.PRESUPUESTO + "")
      $('.presupuestoInput').attr("readonly","readonly");
    }
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

function requestInventario(){
	var consulta = 'LISTA_INVENTARIO';
	var ruta = 'RUTA_INVENTARIO';

  var formMessages = $('#form-messages');

	$.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })

  .done(function(response){
		fillTable(response);
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

function requestEmpleados(){
	var consulta = 'LISTA_EMPLEADOS';
	var ruta = 'RUTA_EMPLEADOS';

  var formMessages = $('#form-messages');

	$.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })

  .done(function(response){
		fillTable(response);
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

function requestCitas(){
	var consulta = 'LISTA_CITAS';
	var ruta = 'RUTA_CITAS';

  var formMessages = $('#form-messages');

	$.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })

  .done(function(response){
		fillTable(response);
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

function requestPacientes(){
	var consulta = 'LISTA_PACIENTES';
	var ruta = 'RUTA_PACIENTES';

  var formMessages = $('#form-messages');

	$.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta}
  })

  .done(function(response){
		fillTable(response);
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

function requestField(tipo = '', form = '') {

	var id = $('#search').val();

	if(id === '')
		return;

	var ruta = $('.fields').data("ruta");
	var consulta = $('.fields').data("consulta");
  var formMessages = $('#form-messages');

	$.ajax({
    type: 'POST',
    url: 'ajax-handler.php',
    data: {ruta: ruta, consulta: consulta, data_extra:"id="+id}
  })

  .done(function(response){

		if(!response[0])
			$('.'+form).trigger("reset");

		var count = 0;

		var inputs = {
			formEmpleado: [
				$("input[name=ci]"),
				$("input[name=nombre]"),
				$("input[name=fecha_nac]"),
				$("input[name=direccion]"),
				$("input[name=telefono]")
			],
			formImplemento: [
				$("input[name=nombre]"),
				$("input[name=marca]"),
				$("input[name=descripcion]"),
				$("input[name=costo]"),
				$("input[name=cantidad]")
			],
			formCita: [
				$("input[name=url_imagen_odontograma]"),
				$("input[name=fecha]"),
				$("select[name=hora]"),
				$("input[name=costo]"),
				$("input[name=motivo]"),
				$("select[name=ci_paciente]"),
				$("select[name=ci_doctor]")
			],
			formPaciente: [
				$("input[name=ci]"),
				$("input[name=nombre]"),
				$("input[name=fecha_nac]"),
				$("input[name=direccion]"),
				$("input[name=telefono]"),
				$("input[name=ocupacion]")
			],
		};

		for(key in response[0]) {

			if(count < inputs[form].length)
				inputs[form][count++].val(response[0][key]);
		}

		if(form === 'formPaciente')
			document.querySelector("input[name=fecha_nac]").valueAsDate = new Date(response[0].FECHA);

		if(form === 'formCita') {
			document.querySelector("input[name=fecha]").valueAsDate = new Date(response[0].FECHA);

			for(var index in response) {
				$('.forms').append(parseData(response[index], 'forms'));

			}
		}

		if(form === 'formEmpleado') {

			if(response[0].IS_EMPLEADO > 0) {
				$("input[name=tipo_empleado]").filter('[value=1]').trigger("click");
				$("input[name=sueldo]").val(response[0].A);
				$("input[name=cargo]").val(response[0].B);
			} else {
				$("input[name=tipo_empleado]").filter('[value=2]').trigger("click");
				$("input[name=rif]").val(response[0].A);
				$("input[name=num_colegio]").val(response[0].B);
			}

			document.querySelector("input[name=fecha_nac]").valueAsDate = new Date(response[0].FECHA);

			var especializaciones = [];

			for(var index in response)
				especializaciones.push(response[index].ESPECIALIZACION);

			$(".especializaciones").val(especializaciones);
		}

		if($('input[name=tipoCRUD]:checked').val() === 'delete') {
			$('.fields :input').prop('disabled', true);
			$('.fields button').prop('disabled', false);
		}

		$('.fields').removeClass('hidden');
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
