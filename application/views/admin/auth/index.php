<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sistema De Mantenimiento</title>

	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/app/css/galeria.min.css') ?>

	<?php /* echo link_tag('assets/font-awesome-4.4.0/css/font-awesome.min.css'); */ ?>
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-image: url(<?= base_url('assets/fancybox/source/fancybox_overlay.png') ?>);
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
  			padding: 10px;
  			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<p class="btn-group pull-right">
					<a href="<?= base_url(); ?>" class="btn btn-default">
						<i class="glyphicon glyphicon-home"></i> Inicio
					</a>
				</p>
			</div>
		</div>

		<?= form_open('admin/auth/login', 'class="form-signin thumbnail"'); ?>
			<h2 class="form-signin-heading">Iniciar sesión</h2>
		
			<div class="form-group">
				<label>Correo electrónico</label>
				<?= form_error('email'); ?>
				<input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="admin@example.com" autofocus>
			</div>
		
			<div class="form-group">
				<label>Contraseña</label>
				<?= form_error('password'); ?>
				<input type="password" name="password" value="123456" class="form-control" placeholder="Contraseña">
			</div>
			
			<div class="form-group">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
			</div>
		</form>

	</div>

	<script src="<?= base_url("assets/jquery/jquery-1.11.3.min.js"); ?>"></script>
	<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>
		<script src="../../assets/js/ie8-responsive-file-warning.js">
	</script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!--[if lt IE 9]>
  		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  	<![endif]-->

</body>
</html>