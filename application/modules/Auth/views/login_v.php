<?php $assets_url = $this->config->item('assets_url') . "dashboard/"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>BESURE APP LOGIN</title>

	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/fontawesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/metisMenu/dist/metisMenu.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/animate.css/animate.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?= @$assets_url; ?>vendor/sweetalert/lib/sweet-alert.css">
	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/ladda/dist/ladda-themeless.min.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>vendor/toastr/build/toastr.min.css" />

	<!-- App styles -->
	<link rel="stylesheet" href="<?= @$assets_url; ?>fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>fonts/pe-icon-7-stroke/css/helper.css" />
	<link rel="stylesheet" href="<?= @$assets_url; ?>styles/style.css">
</head>
<body class = "blank">
	<div class="login-container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center m-b-md">
					<h3>PLEASE LOGIN TO APP</h3>
					<small>If you do not have an account, contact the admin</small>
				</div>
				<div class="hpanel">
					<div class="panel-body">
						<form action="<?= @base_url('Auth/authenticate'); ?>" method = "POST" id="loginForm">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
								<span class="help-block small">Your unique username to app</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
								<span class="help-block small">Your strong password</span>
							</div>
							<a class="ladda-button btn btn-success btn-block" data-style="zoom-in" id = "login">Login</a>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<script type="text/javascript">
		var base_url = "<?= @base_url(); ?>";
	</script>

	<script src="<?= @$assets_url; ?>vendor/jquery/dist/jquery.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/metisMenu/dist/metisMenu.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/iCheck/icheck.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/ladda/dist/spin.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/ladda/dist/ladda.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/ladda/dist/ladda.jquery.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/sparkline/index.js"></script>
	<script src="<?= @$assets_url; ?>vendor/sweetalert/lib/sweet-alert.min.js"></script>
	<script src="<?= @$assets_url; ?>vendor/toastr/build/toastr.min.js"></script>

	<script src="<?= @$assets_url; ?>scripts/login.js"></script>
	<script src="<?= @$assets_url; ?>scripts/homer.js"></script>
</body>
</html>