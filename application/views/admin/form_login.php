<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SINKEP - Login</title>

	<!-- Custom fonts for this template-->
	<link href="<?= filter_var(base_url('assets/fontawesome-free/css/all.min.css'), FILTER_SANITIZE_URL) ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= filter_var(base_url('assets/css/sb-admin-2.min.css'), FILTER_SANITIZE_URL) ?>" rel="stylesheet">

</head>

<body class="bg-gradient-info">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Selamat Datang di Sistem Informasi Kepegawaian</h1>
									</div>
									<?php
									if ($this->session->flashdata('notification')) { ?>
										<div class="alert alert-danger" role="alert"><?= filter_var($this->session->flashdata('notification'), FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></div>
									<?php } ?>
									<form class="user" action="<?= filter_var(site_url('account/login'), FILTER_SANITIZE_URL); ?>" autocomplete="on" method="POST" enctype="multipart/form-data">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="far fa-fw fa-user"></i></span>
											</div>
											<input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username" required>
										</div>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-fw fa-key"></i></span>
											</div>
											<input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Masukkan Password">
										</div>
										<hr>
										<button type="submit" name="login" class="btn btn-primary btn-user btn-block">
											<i class="fas fa-sign-in-alt"></i> Login
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
	<script src="<?= filter_var(base_url('assets/jquery/jquery.min.js'), FILTER_SANITIZE_URL) ?>"></script>
</body>

</html>