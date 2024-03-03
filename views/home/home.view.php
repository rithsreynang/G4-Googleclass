<div class="col-xml-12">
	<?php
	require_once "models/classroom/select.classrooms.model.php";
	require_once "models/classroom/join.class.model.php";
	if (isset($_GET['classroom_id'])) {
		$id = $_GET['classroom_id'];
		die();
	}
	$email = $_SESSION['user'][1];
	$user = getUser($email);
	$user_id = $user['user_id'];
	if (isset($_POST['classCode'])) {
		$classCode = $_POST['classCode'];
		$classes = getAllClassrooom($user_id);
		foreach ($classes as $class) {
			if ($class['class_code'] == $classCode) {
				$storeClass = classExit($user_id, $class['classroom_id']);
				if (count($storeClass) == 0) {
					enrollClass($user_id, $class['classroom_id']);
				} else {
					echo "<script> confirm('Classroom Already Join')</script>";
				}
			}
		}
	};
	$email = $_SESSION['user'][1];
	$user = getUser($email);
	$user_id = $user['user_id'];
	$classroom = getClassroomsUnarchive($user_id);
	if (count($classroom) > 0) {
	?>
		<nav class="navbar " style="border-width: 3px; border-color: gray; margin-bottom: 30px">
			<div style="gap: 10px; ">
				<ul style="list-style-type: none" class="d-flex ">
					<li class="mr-1">
						<a class="btn btn-warning nav-link collapsed " href="/" data-toggle="collapse" data-target="#joinClass" aria-expanded="true" aria-controls="joinClass">Join class</a>
						<div id="joinClass" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.1); z-index:10;">
								<div class="p-3 col-xl-5 bg-white rounded d-flex flex-column justify-content-center align-items-center">
									<form action="#" method="post">
										<h4 class="text-primary text-center mt-1">Join Class</h4>
										<input type="text" class="form-control mt-3" name="classCode" placeholder="Class Code">
										<!-- <small class="text-danger">Error Class Code</small> -->
										<div class="d-flex justify-content-center mt-2">
											<a href="/home" class="btn btn-light mr-2">cancal</a>
											<button class="btn btn-warning" type="submit">Join Now</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</li>
					<a href="/create-class" class="btn btn-light">Add Class</a>
				</ul>
			</div>
		</nav>
		<div class="d-flex flex-wrap">
			<?php
			foreach ($classroom as $class) :
			?>
				<div class="card m-3" style="width:225px;">
					<img class="card-image-top rounded-top" src="../../assets/images/courses/4by3/<?= $class['banner'] ?>">
					<div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 20px;">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown">
								<a class="nav-link bg-white rounded-circle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -170px; margin-left:180px; height:30px; width: 30px">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
										<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
									</svg>
								</a>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile" style='margin-top: -140px; margin-left: 50px'>
									<a class="dropdown-item nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#?id=<?= $class['classroom_id'] . '&classroom_name=' . $class['classroom_name'] . '&section=' . $class['section'] . '&subject=' . $class['subject'] . '&room=' . $class['room'] ?>">
										Edit
									</a>
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
									<a href="../../controllers/classroom/change.banner.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Change banner</a>
									<a href="../../controllers/archive/modify.archive.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Archive</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="card-body p-2">
						<div class="nav-list d-flex justify-content-between">
							<a href="../../controllers/teach/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>">
								<p class="card-title"><?= $class['classroom_name'] ?></p>
							</a>
						</div>
						<p class="card-text">Section : <?= $class['section'] ?></p>
						<p class="card-text">Room : <?= $class['room'] ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php } else { ?>
		<div class="d-flex justify-content-center" style="height: 70vh;">
			<nav class="navbar d-flex flex-column" style="border-width: 3px; border-color: gray; margin-bottom: 30px">
				<img src="../../assets/images/classroom/05.png" style="width: 300px;">
				<div style="gap: 10px; ">
					<ul style="list-style-type: none" class="d-flex ">
						<li class="mr-1">
							<a class="btn btn-warning nav-link collapsed " href="/" data-toggle="collapse" data-target="#joinClass" aria-expanded="true" aria-controls="joinClass">Join class</a>
							<div id="joinClass" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
								<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.1); z-index:10;">
									<div class="p-3 col-xl-5 bg-white rounded d-flex flex-column justify-content-center align-items-center">
										<form action="#" method="post">
											<h4 class="text-primary text-center mt-1">Join Class</h4>
											<input type="text" class="form-control mt-3" name="classCode" placeholder="Class Code">
											<!-- <small class="text-danger">Error Class Code</small> -->
											<div class="d-flex justify-content-center mt-2">
												<a href="/home" class="btn btn-light mr-2">cancal</a>
												<button class="btn btn-warning" type="submit">Join Now</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</li>
						<a href="/create-class" class="btn btn-light">Add Class</a>
					</ul>
				</div>
			</nav>
		</div>
	<?php } ?>
</div>