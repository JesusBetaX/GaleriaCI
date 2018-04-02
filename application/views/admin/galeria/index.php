<div class="row">
  <div class="col-sm-6">
    <h1>Galería</h1>
    <p class="lead">Imágenes</p>
  </div>

  <div class="col-sm-6">
    <p class="text-right">
      <a href="<?= site_url('admin/galeria/form'); ?>" class="btn btn-default">
        <i class="glyphicon glyphicon-save"></i> Agregar Imagenes
      </a>
    </p>
  </div>
</div>

<div class="row">
  <?php foreach ($galerias as $galeria): ?>
    <div class="col-sm-4 galeria-item">
      <!--Pnel-->
      <div class="panel galeria-link">
        
        <!--Image-->
        <div class="img">
          <a href="<?= base_url('upload/'.$galeria->imagen); ?>" class="fancybox-effects-a" data-fancybox-group="gallery" title="<?= $galeria->titulo; ?>">
            <img src="<?= base_url('upload/tumb/'.$galeria->imagen); ?>" class="img-responsive galeria-img" />
          </a>
        </div>
        <!--/Image-->

        <!--Body-->
        <div class="panel-body">
          <small><?= $galeria->titulo; ?></small>

          <div class="text-right">
            <a href="<?= base_url('show/'.$galeria->slug); ?>" target="_blank" class="btn btn-xs btn-default" title="detalles">
              <i class="glyphicon glyphicon-link"></i>
            </a>&nbsp;
            <a href="<?= site_url('admin/galeria/form/' . $galeria->id); ?>" class="btn btn-xs btn-primary" title="editar" >
              <i class="glyphicon glyphicon-pencil"></i>
            </a>&nbsp;
            <a href="<?= site_url('admin/galeria/delete/' . $galeria->id); ?>" class="btn btn-xs btn-danger" title="eliminar" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </div>
        </div>
        <!--/Body-->
      </div>
      <!--/Panel-->
    </div>
  <?php endforeach; ?>
</div>

<div class="row">
  <div class="col-md-12 text-center">
    <?= $this->pagination->create_links(); ?>
  </div>
</div>