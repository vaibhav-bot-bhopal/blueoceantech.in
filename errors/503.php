<?php
include('../includes/setting.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" <?php echo 'href="' . BASE_URL . 'img/logo/favicon.png"' ?> type="image/x-icon" />
	<link rel="apple-touch-icon" <?php echo 'href="' . BASE_URL . 'img/logo/favicon.png"' ?>>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<link rel="stylesheet" <?php echo 'href="' . BASE_URL . 'assets/css/bootstrap.min.css"' ?>>
	<title>Service Unavailable - 503</title>

	<style>
		.btn-outline-aqua {
			color: #047BAB !important;
			border-color: #047BAB !important;
		}

		.btn-outline-aqua:hover {
			color: #fff !important;
			background-color: #047BAB !important;
			border-color: #047BAB !important;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 mx-auto d-block">
				<img <?php echo 'src="' . BASE_URL . 'errors/503.jpg"' ?> class="img-fluid mt-5 mb-5" alt="Service Unavailable">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<button class="btn btn-outline-aqua" style="font-weight: 600;" onclick="window.location.reload()">Reload</button>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-lg-12 text-center">
				<a href="index.php" class="btn btn-outline-danger">Go To Home</a>
			</div>
		</div> -->
	</div>
</body>

</html>