<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/metronic1/login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
					<center>
						<img width="100" src="<?= base_url() ?>public/media/icon/staff.png" alt="">
						<br>
						<span class="login100-form-title p-b-55">
							Login Sebagai Admin
						</span>
					</center>
					<br>
					<?php  
					echo validation_errors('<div class="alert alert-danger alert-slide-up">','</div>');
					if ($this->session->flashdata('danger'))
					{
						echo '<div class="alert alert-danger alert-slide-up">';
						echo $this->session->flashdata('danger');
						echo '</div>';
					}

					if ($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-success alert-slide-up">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					}
					?>
					<form action="<?= base_url() ?>admin/login" method="post">
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="username" autocomplete="off" placeholder="Username" required="" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" autocomplete="off" placeholder="Password" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							<a href="<?= base_url() ?>home"><i class="fa fa-arrow-left"></i> Kembali</a>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<!--===============================================================================================-->	
	<script src="<?= base_url() ?>public/metronic1/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>public/metronic1/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>public/metronic1/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>public/metronic1/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url() ?>public/metronic1/login/js/main.js"></script>
	<script type="text/javascript">
		$(".alert-slide-up").alert().delay(3000).slideUp('slow');
	</script>

</body>
</html>