<?php
session_start();
// Check if the user is already logged in, redirect to the dashboard
if (isset($_SESSION['success'])) {
  header("Location: /home");
  exit;
}
$error = [
  'username' => '',
  'password' => '',
  'email' => '',
];
$value = [
  'username' => '',
  'email' => '',
];
$isUsername = false;
$isPassword = false;
$isEmail = false;

require "models/signup.model.php";
require "database/database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $regex = "/^[a-zA-Z\s\d\.\!\@\#\$]+$/";
  if (!empty($_POST['username'])) {
    $value['username'] = htmlspecialchars($_POST['username']);
    $isUsername = true;
  } else {
    $error['username'] = 'please complete your name';
    $userBorder = 'border-danger border-3';
  }
  if (!empty($_POST['password'])) {
    if (strlen(trim($_POST['password'])) > 7) {
      if (preg_match($regex, htmlspecialchars($_POST['password']))) {
        $password = htmlspecialchars($_POST['password']);
        $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
        $isPassword = true;
      } else {
        $error['password'] = 'wrong password';
      }
    } else {
      $error['password'] = 'password must have more than 7 letters';
    }
  } else {
    $error['password'] = 'please complete password';
  }
  if (!empty($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $user = accountExist($email);
    if (count($user) == 0) {
      $isEmail = true;
      $value['email'] = $_POST['email'];
    } else {
      $error['email'] = 'Email already used';
      $_SESSION['error'] = "Email already used";
    }
  } else {
    $error['email'] = 'please complete your email';
  }
};
if ($isUsername && $isEmail && $isPassword) {
  createAccount($value['username'], $email, $password_encrypt);
  $_SESSION['success'] = "Account successfully created";
  $_SESSION['user'] = [$value['username'], $value['email'], $password_encrypt];
  header("Location: /home");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>E - Classroom</title>
  <link rel="shortcut icon" href="assets/images/favicon.ico">
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
          <!-- left -->
          <div class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-success bg-opacity-10 vh-lg-100">
            <div class="p-3 p-lg-5">
              <!-- Title -->
              <div class="text-center">
                <h2 class="fw-bold">Welcome to E - Classroom</h2>
              </div>
              <!-- SVG Image -->
              <img src="assets/images/element/06.svg" class="mt-7">
            </div>
          </div>
          <!-- Right -->
          <div class="col-12 col-lg-6 m-auto">
            <div class="row my-5">
              <div class="col-sm-10 col-xl-8 m-auto border rounded p-3">
                <!-- Title -->
                <h1 class="fs-2">Create Account !</h1>
                <!-- <p class="lead mb-4">Nice to see you! Please log in with your account.</p> -->
                <!-- Form START -->
                <form action="#" method="post">
                  <!-- Username -->
                  <div class="mb-4">
                    <label for="InputUsername" class="form-label">Username *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fa fa-user"></i></span>
                      <input type="username" name="username" value="<?= $value['username'] ?>" class="form-control border-0 bg-light rounded-end ps-1 <?= $userBorder ?>" placeholder="username" id="exampleInputUsername"><br>
                    </div>
                    <small class="form-text text-danger"><?= $error['username'] ?></small>
                  </div>
                  <!-- Email -->
                  <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Email address *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                      <input type="email" name='email' value="<?= $value['email'] ?>" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1">
                    </div>
                    <small class="form-text text-danger"><?= $error['email'] ?></small>
                  </div>
                  <!-- Password -->
                  <div class="mb-4">
                    <label for="inputPassword5" class="form-label">Password *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-key"></i></span>
                      <input type="password" name="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5">
                    </div>
                    <small class="form-text text-danger"><?= $error['password'] ?></small>
                  </div>
                  <!-- Button -->
                  <div class="align-items-center mt-0">
                    <div class="d-grid">
                      <button class="btn btn-lg btn-success mb-0" type="submit">Sign Up</button>
                    </div>
                  </div>
                </form>
                <!-- Form END -->
                <!-- Sign up link -->
                <div class="mt-4 text-center">
                  <span>Have Account Already? <a href=" /signin">Login</a></span>
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