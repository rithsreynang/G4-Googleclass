<?php
require "database/database.php";
require "models/classroom/delete_classroom.model.php";
if (!empty($_GET['classroom_id'])) {
	$id = $_GET['classroom_id'];
	echo $id;
	echo 'gek';
	deleteClass($id);
}
?>

<div class="d-flex flex-wrap">
	<?php
	require "database/database.php";
	require "models/classroom/get_user.model.php";
	require "models/classroom/select_classrooms.model.php";
	session_start();
	$email = $_SESSION['user'][2];
	$user_id = getUserID($email)['user_id'];
	$classroom = getClassrooms($user_id);
	foreach ($classroom as $class) :
	?>
		<div class="card m-3" style="width:245px;">
			<img class="card-image-top rounded-top" src="../../assets/images/courses/4by3/22.jpg" alt="...">
			<div class="card-body p-2">
				<div class="nav-list d-flex justify-content-between">
					<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" style="text-decoration: none; color: black;">
						<p class="card-title"><?= $class['classroom_name'] ?></p>
					</a>
					<div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 25px;">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									More
								</a>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
									<a class="dropdown-item" href="controllers/classroom/edite_class.controller.php?classroom_id=<?= $class['classroom_id'] ?>">Edit</a>
									<a class="dropdown-item" href="/class?classroom_id=<?= $class['classroom_id'] ?>">Class Code</a>
									<a class="dropdown-item" href="/class?classroom_id=<?= $class['classroom_id'] ?>">Delete</a>
									<a class="dropdown-item" href="/change-banner-class">Change Banner</a>
									<a class="dropdown-item" href="/class?classroom_id=<?= $class['classroom_id'] ?>">Archive</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<p class="card-text">Section : <?= $class['section'] ?></p>
				<p class="card-text">Room : <?= $class['room'] ?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>