<div class="col-xml-12">

	<?php
	if (isset($_GET['classroom_id'])) {
		$id = $_GET['classroom_id'];
		die();
	}
	$email = $_SESSION['user'][1];
	$user = getUser($email);
	$user_id = $user['user_id'];
	$classroom = getClassroomsArchive($user_id);
	if (count($classroom) > 0){
	?>
	<div class="d-flex flex-wrap">
		<?php
		foreach ($classroom as $class) :
		?>
			<div class="card shadow-sm m-3" style="width:225px;">
				<img class="card-image-top rounded m-2" src="../../assets/images/courses/4by3/<?= $class['banner'] ?>">
				<div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 20px;">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link bg-white rounded-circle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -170px; margin-left:180px; height:30px; width: 30px">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
									<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
								</svg>
							</a>
							<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile" style='margin-top: -140px; margin-left: 50px'>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
									<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.2); z-index:10;">
										<div class="bg-white p-3 col-xl-6 rounded">
											<form action="../../controllers/classroom/modify.update.controller.php?classroom_id=<?= $class['classroom_id'] ?>" method="post">
												<h4 class="text-success mt-1">Edit Classroom</h4>
												<input type="text" value="<?= $class['classroom_name'] ?>" class="form-control mt-3" name="className" placeholder="Class name">
												<input type="text" value="<?= $class['section'] ?>" class="form-control mt-3" name="section" placeholder="Section">
												<input type="text" value="<?= $class['subject'] ?>" class="form-control mt-3" name="subject" placeholder="Subject">
												<input type="text" value="<?= $class['room'] ?>" class="form-control mt-3" name="room" placeholder="Room">
												<div class="d-flex justify-content-end mt-2">
													<a href="/#" class="btn btn-light">Cancal</a>
													<button class="btn btn-success">Update</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<a href="../controllers/classroom/delete.class.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Delete</a>
								<a href="../../controllers/archive/modify.unarchive.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Unarchive</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="card-body p-2">
					<div class="nav-list d-flex justify-content-between">
						<a href="../../controllers/teach/class.controller.php?classroom_id=<?=$class['classroom_id'] ?>" style="text-decoration: none; color: black;">
							<p class="card-title"><?= $class['classroom_name'] ?></p>
						</a>
					</div>
					<p class="card-text">Section : <?= $class['section'] ?></p>
					<p class="card-text">Room : <?= $class['room'] ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php }else{?>
		<div class="d-flex  justify-content-center" style="height: 200px;">
			<div class="d-flex align-items-center">
				<h2>No Archive Class Here</h2>
			</div>
		</div>
	<?php }?>
</div>