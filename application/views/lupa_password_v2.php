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
							Change Password
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
					<form action="<?= base_url() ?>login/lupa_password" method="post">
					 <div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="username" autocomplete="off" placeholder="Username" required="" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>
					 
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password" id="password" autocomplete="off" placeholder="New Password" required="" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="newpassword" id="newpassword" autocomplete="off" placeholder="New Password Again" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
						<span class="focus-input100"></span>
						<input type="checkbox" onclick="checkFluency()" id="fluency">Tampilkan Password
					    <span class="focus-input100"></span>
					</div>
					
					
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Change Password
						</button>
					</div>
					<div class="container-login100-form-btn p-t-25">
						<a href="<?= base_url() ?>home" class="captcha-refresh" style="text-align:center;">Cancel</a>
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
	
	<script>
	function checkFluency(){
    var checkbox = document.getElementById('fluency');
    	if (checkbox.checked != true){
    	$("#password").attr('type','password');
    	$("#newpassword").attr('type','password');
    	}else{
    	$("#password").attr('type','text');
    	$("#newpassword").attr('type','text');
    	}
    }
	</script>

</body>
</html>