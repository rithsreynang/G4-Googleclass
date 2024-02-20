<?php
	require "database/database.php";
	require "models/classroom/delete_classroom.model.php";
	if (!empty($_GET['classroom_id'])){
		$id = $_GET['classroom_id'];
		echo $id;
		echo 'gek';
		deleteClass($id);
	}
?>

<div class="d-flex flex-wrap" >
	<?php
		require "database/database.php";
		require "models/classroom/get_user.model.php";
		require "models/classroom/select_classrooms.model.php";
		session_start();
		$email = $_SESSION['user'][2];
		$user_id = getUserID($email)['user_id'];
		$classroom = getClassrooms($user_id);
		foreach($classroom as $class):
		?>	
			<div class="card m-3" style="width:245px;">
				<img class="card-image-top rounded-top" src="../../assets/images/courses/4by3/01.jpg" alt="...">
				<div class="card-body">
				<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" style="text-decoration: none; color: black;">
					<h5 class="card-title d-flex align-items-between">Class name : <?= $class['classroom_name'] ?></h5></a>
					<p class="card-text">Section : <?= $class['section'] ?></p>
					<p class="card-text">Room : <?= $class['room'] ?></p>
				</div>
				<div class="card-footer p-1 d-flex justify-content-between">
					<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" class='btn btn-secondary'><i class="bi bi-pen-fill"></i></a>
					<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" class='btn btn-secondary'><i class="bi bi-image-fill"></i></a>
					<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" class='btn btn-secondary'><i class="bi bi-archive"></i></a>
					<a href="/class?classroom_id=<?= $class['classroom_id'] ?>" class='btn btn-secondary'><i class="bi bi-link"></i></a>
					<a href="#?classroom_id=<?= $class['classroom_id'] ?>" class='btn btn-danger '><i class="bi bi-trash-fill"></i></a>
				</div>
			</div>
	<?php endforeach; ?>
</div>

