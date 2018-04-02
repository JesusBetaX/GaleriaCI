<section id="galeria">

  <div class="row">
    <div class="col-md-12">
      <p class="btn-group pull-right">
        <a href="<?= base_url(); ?>" class="btn btn-default">
          <i class="glyphicon glyphicon-home"></i> Inicio
        </a>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel">
        
        <div class="img">
          <a title="<?= $galeria->titulo; ?>" >
            <img src="<?= base_url('upload/'.$galeria->imagen); ?>" class="img-responsive" style="margin: 0 auto;" />
          </a>
        </div>

        <div class="panel-body text-center">
          <h1><?= $galeria->titulo; ?></h1>

          <hr>

          <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>

          <br>

          <a class="btn btn-success btn-lg">Dowload</a>

          <br><br>

        </div>

      </div>
    </div>
  </div>

</section>