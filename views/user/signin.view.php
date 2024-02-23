<?php
session_start();
// Check if the user is already logged in, redirect to the dashboard
if (isset($_SESSION['success'])) {
	header("Location: /home");
	exit;
}
$error = [
	'email' => '',
	'password' => '',
];
$isEmail = false;
require "database/database.php";
require "models/signup.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
		$user = accountExist($email);
		if (count($user) > 0) {
			$isEmail = true;
		} else {
			$error['email'] = "Email doesn't exit!";
		}
	} else {
		$error['email'] = 'please complete email';
	}
	if (!empty($_POST['password'])) {
		if ($isEmail) {
			if (password_verify($_POST['password'], $user['password'])) {
				$_SESSION['success'] = "Login successful";
				$_SESSION['user'] = [$user['user_id'], $user['username'], $user['email'], $user['password']];
				header("Location: /home");
			} else {
				$error['password'] = 'Wrong password';
				$_SESSION['error'] = "Wrong Email";
			}
		}
	} else {
		$error['password'] = 'please complete your password';
	}
	$password = $_POST['password'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>E - Classroom</title>
	<!-- Meta Tags -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Eduport- LMS, Education and Course Theme">
	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">
	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
</head>

<body>
	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">
			<div class="container-fluid">
				<div class="row">
					<!-- left -->
					<div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
						<div class="p-3 p-lg-5">
							<!-- Title -->
							<div class="text-center">
								<h2 class="fw-bold">Welcome to E - Classroom</h2>
							</div>
							<!-- SVG Image -->
							<img src="assets/images/element/04.svg" class="mt-7" alt="">
						</div>
					</div>
					<!-- Right -->
					<div class="col-12 col-lg-6 m-auto">
						<div class="row my-5">
							<div class="col-sm-10 col-xl-8 m-auto border rounded  ">
								<!-- Title -->
								<h1 class="fs-2 mt-3">Login Account</h1>
								<!-- Form START -->
								<form action="#" method='POST'>
									<!-- Email -->
									<div class="mb-4">
										<label for="exampleInputEmail1" class="form-label">Email address *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
											<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name='email'>
										</div>
										<small class="text-danger"><?= $error['email'] ?></small>
									</div>
									<!-- Password -->
									<div class="mb-4">
										<label for="inputPassword5" class="form-label">Password *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-key"></i></span>
											<input type="password" name="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5">
										</div>
										<small class="text-danger"><?= $error['password'] ?></small>
									</div>
									<!-- Button  -->
									<div class="align-items-center mt-0">
										<div class="d-grid mb-3">
											<button class="btn btn-success mb-0" type="submit">Login</button>
										</div>
									</div>
								</form>
								<!-- Form END -->

								<!-- Sign up link -->
								<div class="mt-4 text-center">
									<span>Don't have account yet ? <a href="/signup"> Signup</a></span>
								</div>
							</div>
						</div> <!-- Row END -->
					</div>
				</div> <!-- Row END -->
			</div>
		</section>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->
	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>
	<!-- Bootstrap JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Template Functions -->
	<script src="vendor/js/functions.js"></script>

</body>

</html>