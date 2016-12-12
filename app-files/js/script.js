/* Atributos globales */
agenda_DoctorOGlobal = 0;
agenda_DiarioRango = 0;

function insertHTML(from = '', tipo = 0) {

	switch (from) {
		case 'consultas':
			var options = $('.selectConsultas option:not(:selected)');
			for (var option in options) {
				$('.'+options[option].value).addClass('hidden');
				$('.'+options[option].value+' input').prop('disabled', true);
			}

			var option = $('.selectConsultas option:selected').val();
			$('.'+option).removeClass('hidden');
			$('.'+option+' input').prop('disabled', false);
			break;

		case 'doctor':
			switch(tipo){
				case 1:
					$(".divDoctores").addClass("hidden");
					$(".doctorSeleccion").prop("disabled", true);
				break;
				case 2:
					requestNombreDoctores();
					$(".divDoctores").removeClass("hidden");
					$(".doctorSeleccion").prop("disabled", false);
				break;
			}
			agenda_DoctorOGlobal = tipo;
			break;

		case 'empleados':
			switch(tipo){
				case 1:
					$(".empleado").removeClass('hidden');
					$(".empleado input").prop("disabled", false);

					$(".doctor").addClass('hidden');
					$(".doctor input").prop("disabled", true);
				break;

				case 2:
					$(".doctor").removeClass('hidden');
					$(".doctor input").prop("disabled", false);

					$(".empleado").addClass('hidden');
					$(".empleado input").prop("disabled", true);
				break;
			}
			break;

		case 'dia':
			switch(tipo){
				case 1:
					$(".dia-especifico").removeClass('hidden');
					$('.dia-especifico').prop('disabled', false);
					$(".rango").addClass('hidden');
					$('.rango').prop('disabled', true);
					break;
				case 2:
					$(".rango").removeClass('hidden');
					$('.rango').prop('disabled', false);
					$(".dia-especifico").addClass('hidden');
					$('.dia-especifico').prop('disabled', true);
					break;
				}

			agenda_DiarioRango = tipo;
			$(".fechasDiv").removeClass("hidden");
			break;

		case 'CRUD':
			$('.fields').addClass('hidden');
			$('.search').addClass('hidden');

			if(tipo != 1)
				$('.search').removeClass('hidden');
			else
				$('.fields').removeClass('hidden');

			break;

		case 'tratamiento':
			$('.fields-tratamiento').removeClass('hidden');

			break;

		case 'graficas':
			$('.campo-grafica').addClass('hidden');

			switch(tipo){
				case 1:
					$('.campo-grafica-1').removeClass('hidden');
					break;

				case 2:
					$('.campo-grafica-2').removeClass('hidden');
					break;

				case 3:
					$('.campo-grafica-3').removeClass('hidden');
					break;
			}
			break;
	}
}

function parseData(data, tipo) {
	if(tipo === "multiple_select" || tipo == "single_select")
  	return new Option(data.NOMBRE, data.NOMBRE);
	else if(tipo === 'forms') {
		var resp = '<form class="formTratamiento well form-horizontal tratamiento" action="dml-handler.php" role="form">\
		<fieldset class="checks">\
		  <legend>Tipo de operación</legend>\
		  <div class="form-group">\
		    <div class="col-sm-12 col-sm-offset-2 inputGroupContainer">\
		      <div class="radio-inline">\
		        <label>\
		          <input type="radio" name="tipoCRUD" id="tipoCRUD" value="update" onclick="insertHTML(\'tratamiento\', 2)">Actualizar\
		        </label>\
		      </div>\
		      <div class="radio-inline">\
		        <label>\
		          <input type="radio" name="tipoCRUD" id="tipoCRUD" value="delete" onclick="insertHTML(\'tratamiento\', 3)">Eliminar\
		        </label>\
		      </div>\
		    </div>\
		  </div>\
		</fieldset>\
		<fieldset class="fields-tratamiento hidden" data-ruta="RUTA_CITAS" data-consulta="CITA_ESPECIFICA">\
			<legend>Tratamiento</legend>';

		var count = 0;
		var keys = Object.keys(data);

		for(var key in data) {
			resp += '<div class="form-group">\
			<label for="'+data[key]+'" class="col-sm-3 control-label">'+keys[count]+'</label>\
				<div class="col-sm-9 inputGroupContainer">\
					<div class="input-group">\
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>\
						<input type="text" id="'+data[key]+'" name="'+keys[count].toLowerCase()+'" class="form-control '+data[key]+'" value="'+data[key]+'">\
					</div>\
				</div>\
			</div>'

			count++;
		}

		resp += '<div class="form-group row">\
							<div class="col-sm-4">\
								<button type="submit" class="btn btn-primary">Guardar <span class="glyphicon\ glyphicon-ok"></span></button>\
							</div>\
						</div>\
					</fieldset>\
				</form>';

		return resp;
	}	else {
		var resp = "<tr>";
		for(var key in data) {
			resp += '<td>'+data[key]+'</td>';
		}
		resp += "</tr>"

		return resp;
	}
}

function fillTable(response) {
	var table_head = ""
	var table_body = ""

	var keys = Object.keys(response[0]);

	for(var key in keys)
		table_head += '<th>'+keys[key]+'</th>';

	$('.table-head').html(table_head);

	for(var key in response)
		table_body += parseData(response[key]);

	$('.table-body').html(table_body);
}

function draw(tipo = '', params = []){

	switch (tipo) {
		case 1:
		$(".charts").CanvasJSChart({
			title: {
				text: "Basic JQuery Line Charts"
			},
			axisX: {
				interval: 10
			},
			data: [
			{
				type: "line",
				dataPoints: [
						{ x: 10, y: 450 },
						{ x: 20, y: 414 },
						{ x: 30, y: 520 },
						{ x: 40, y: 460 },
						{ x: 50, y: 450 },
						{ x: 60, y: 500 },
						{ x: 70, y: 480 },
						{ x: 80, y: 480 },
						{ x: 90, y: 410 },
						{ x: 100, y: 500 },
					]
				}
				]
			});
			break;

		case 2:

			break;

		case 3:

			break;
	}
}
