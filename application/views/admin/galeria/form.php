<div class="row">
  <div class="col-sm-6">
    <h1><?= is_null($galeria->id) ? 'Nueva imagen' : $galeria->titulo ?></h1>
	<p class="lead">Formulario</p>
  </div>

  <div class="col-sm-6">
    <p class="text-right">
      <a href="<?= site_url('admin/galeria/') ?>" class="btn btn-default">
		<i class="glyphicon glyphicon-chevron-left"></i> Regresar
	  </a>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">

	<?= form_open_multipart('admin/galeria/form/'. $galeria->id, 'class="well"') ?>

	  <div class="form-group">
		<label>Titulo de la imagen</label>
		<?= form_error('titulo') /* Mostramos los errores. */ ?>
		<input type="type" name="titulo" value="<?= $galeria->titulo ?>" class="form-control" />
	  </div>

	  <div class="form-group">
		<label>Imagen</label>
		<?= form_error('userfile') /* Mostramos los errores. */ ?>
		<input type="file" name="userfile" accept="image/*" />
	  </div>

	  <div class="form-group">
		<label>Asignar categoría</label>
		<?= form_error('categoria') /* Mostramos los errores. */ ?>
		<select name="categoria" class="form-control">
		  <option></option>
		  <?php foreach ($categorias as $categoria): ?>
		  	<?php /* Validamos que item estaba seleccionado. */ ?>
			<option <?= set_select('categoria', $categoria->id, ($categoria->id == $galeria->categoria_id)) ?> value="<?= $categoria->id ?>">
			  <?= $categoria->nombre ?>	
			</option>
		  <?php endforeach; ?>
		</select>
	  </div>

	  <div class="form-group">
		<button type="submit" class="btn btn-primary">
		  <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
		</button>
	  </div>

	</form>
  </div>
</div>