<!DOCTYPE html>
<html lang="en">

<head>
	<title>Eduport - LMS, Education and Course Theme</title>

	<!-- Meta Tags -->
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
					<div class="col-12  col-lg-9 m-auto">
						<div class="row  my-5">
							<div class="col-sm-10 col-xl-8 m-auto border rounded">
								<!-- Title -->
								<span class="mb-0 fs-1">👋</span>
								<h1 class="fs-2 text-center">Create Account !</h1>
								<!-- <p class="lead mb-4">Nice to see you! Please log in with your account.</p> -->
								<!-- Form START -->
								<form action="../../controllers/authentication/create_user.controller.php" method="post">
									<!-- Username -->
									<div class="mb-4">
										<label for="exampleInputEmail1" class="form-label">Username *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
											<input type="text" name="username" class="form-control border-0 bg-light rounded-end ps-1" placeholder="Username" id="exampleInputUsername">
										</div>
									</div>
									<!-- Email -->
									<div class="mb-4">
										<label for="exampleInputEmail1" class="form-label">Email address *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
											<input type="email" name="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1">
										</div>
									</div>
									<!-- Password -->
									<div class="mb-4">
										<label for="inputPassword5" class="form-label">Password *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
											<input type="password" name="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5">
										</div>
										<div id="passwordHelpBlock" class="form-text">
											Your password must be 8 characters at least
										</div>
									</div>
									<!-- Check box -->

									<!-- Button -->
									<div class="align-items-center mt-0">
										<div class="d-grid">
											<button class="btn btn-primary mb-0" type="submit">Sign up</button>
										</div>
									</div>
								</form>
								<!-- Form END -->
								<!-- Sign up link -->
								<div class="mt-4 text-center">
									<span>have account already? <a href="user-signin">Sign in here</a></span>
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