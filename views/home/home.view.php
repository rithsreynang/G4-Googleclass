<div class="col-xml-12" >
	<nav class="navbar " style="border-width: 3px; border-color: gray;">
		<div  style="gap: 10px;">
			<a href="/join-class" class="btn btn-success">Join class</a>
			<a href="/create-class" class="btn btn-success">Create Classroom</a>
		</div>
	</nav>

<?php
require "database/database.php";
require "models/classroom/delete_classroom.model.php";

if (isset($_GET['classroom_id'])) {
	$id = $_GET['classroom_id'];
	die();
}
$banner = '01.jpg';
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
			<img class="card-image-top rounded-top" src="../../assets/images/courses/4by3/<?= $class['banner'] ?>" alt="...">
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
									<a class="dropdown-item" href="/class?classroom_id=<?= $class['classroom_id'] ?>">Edit</a>
									<a class="dropdown-item" href="/class?classroom_id=<?= $class['classroom_id'] ?>">Class Code</a>
									<a class="dropdown-item" href="controllers/classroom/delete_class.controller.php?classroom_id=<?= $class['classroom_id'] ?>">Delete</a>
									<a class="dropdown-item" href="../../controllers/home/change_banner.controller.php?classroom_id=<?= $class['classroom_id'] ?>">Chane Banner</a>
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
</div>