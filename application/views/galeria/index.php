<section id="galeria">


  <div class="row">
    <div class="col-sm-12">
      <h1>Galería</h1>
      <p class="lead">Imágenes</p>
    </div>
  </div>

  <div class="row">
    <?php foreach ($galerias as $galeria): ?>
      <div class="col-sm-4 galeria-item">
        <!--Panel-->
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
            <a href="<?= base_url('show/'.$galeria->slug); ?>">
              <h5 class="text-center">
                <strong><?= $galeria->titulo; ?></strong>
              </h5>
            </a>
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

</section>
