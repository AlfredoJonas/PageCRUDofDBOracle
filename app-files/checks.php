<fieldset class="checks">
  <legend>Tipo de operación</legend>
  <div class="form-group">
    <div class="col-sm-12 col-sm-offset-2 inputGroupContainer">
      <div class="radio-inline">
        <label>
          <input type="radio" name="tipoCRUD" id="tipoCRUD" value="insert" onclick="insertHTML('CRUD', 1)">Insertar
        </label>
      </div>
      <div class="radio-inline">
        <label>
          <input type="radio" name="tipoCRUD" id="tipoCRUD" value="update" onclick="insertHTML('CRUD', 2)">Actualizar
        </label>
      </div>
      <div class="radio-inline">
        <label>
          <input type="radio" name="tipoCRUD" id="tipoCRUD" value="delete" onclick="insertHTML('CRUD', 3)">Eliminar
        </label>
      </div>
    </div>
  </div>

  <div class="form-group search hidden">
    <label for="search" class="col-sm-3 control-label">Identificador</label>
    <div class="col-sm-9 inputGroupContainer">
      <div class="input-group">
        <input type="search" id="search" name="id" class="form-control" placeholder="Identificador" required>
        <span class="input-group-btn">
          <button type="button" id="search" class="btn btn-info btn-md" onclick="requestField(parseInt($('input[name=tipoCRUD]:checked').val()), $('.form-horizontal').attr('class').split(' ')[0])">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </span>
      </div>
    </div>
  </div>
</fieldset>
