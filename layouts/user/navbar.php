<?php
session_start();
require_once "database/database.php";
require_once "models/classroom/get.user.model.php";
require_once "models/classroom/select.classrooms.model.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$item = [
	'home' => "",
	'calendar' => "",
	'enrollment' => "",
	'teach' => "",
	'todo' => "",
	'archive' => "",
];
if ($uri == "/home") {
	$item['home'] = "bg-light";
} else if ($uri == "/archive") {
	$item['archive'] = "bg-light";
} else if ($uri == "/todo") {
	$item['todo'] = "bg-light";
}
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark  accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex border-bottom align-items-center justify-content-center" style="margin-bottom: -17px;" href="/">
		<img src="../../assets/images/logo.svg" style="width: 150px;">
		<!-- <div class="sidebar-brand-text mx-4 text-primary">E-Classroom</div> -->
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item  ">
		<a class="nav-link rounded-0 <?= $item['home'] ?>" href="/home">
			<i class='fas fa-home text-dark'></i>
			<span style='font-size: 17px;' class="text-dark"><b>Home</b></span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item ">
		<a class="nav-link rounded-0" href="../../controllers/calendar/calendar.controller.php">
			<i class='far fa-calendar-alt text-dark' ​​></i>
			<span style='font-size: 17px' class="text-dark"><b>Calendar</b></span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link rounded-0 <?= $item['todo'] ?>" href="/todo">
			<i class='fas fa-book text-dark'></i>
			<span style='font-size: 17px' class="text-dark"><b>To do</b></span>
		</a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link collapsed " href="/#" data-toggle="collapse" data-target="#listTeach" aria-expanded="true" aria-controls="listTeach">
			<i class='fas fa-chalkboard-teacher text-dark'></i>
			<span style='font-size: 17px' class="text-dark"><b>Teaching</b></span>
		</a>
		<div id="listTeach" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-light py-2 collapse-inner rounded">
				<?php
				$email = $_SESSION['user'][1];
				$user = getUser($email);
				$user_id = $user[0];
				$profileName = $user[4];
				$classroom = getClassroomsUnarchive($user_id);
				foreach ($classroom as $class) {
				?>
					<a class="collapse-item" href="../../controllers/teach/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>"><?= $class['classroom_name'] ?> </a>
				<?php } ?>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/#" data-toggle="collapse" data-target="#listenroll" aria-expanded="true" aria-controls="listenroll">
			<i class='fas fa-chalkboard-teacher text-dark'></i>
			<span style="font-size: 17px" class="text-dark"><b>Enrollment</b></span>
		</a>
		<div id="listenroll" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-light py-2 collapse-inner rounded">
				<?php
				$classroom = getClasses($user_id);
				foreach ($classroom as $class) {
				?>
					<a class="collapse-item" href="../../controllers/enrollment/enrollment.controller.php?classroom_id=<?= $class[0] ?>"><?= $class[1] ?></a>
				<?php  } ?>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link rounded-0 <?= $item['archive'] ?>" href="/archive">
			<i class='fas fa-archive text-dark'></i>
			<span style="font-size: 17px" class="text-dark"><b>Archive</b></span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<!-- Content Wrapper -->
</div>
<div id="content-wrapper " class="d-flex border-left flex-column col-10" style="background: #FFFFFE;">
	<div class="d-flex justify-content-end flex-column">
		<div class="d-flex justify-content-end align-items-center m-3">
			<div class="navbar  navbar-expand-lg p-1 h-1" style="height: 30px;">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="avatar-img rounded-circle" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 40px; ">
						</a>
						<div class="dropdown-menu dropdown-menu-right pt-3" aria-labelledby="navbarDropdownProfile" style="background: #040720; margin-top: 30px;">
							<ul style="list-style: none; width: 250px; height: 200px; background: white;" class="p-2">
								<li>
									<div class="d-flex align-items-center flex-column">
										<!-- Avatar -->
										<div class="avatar me-3 mr-1">
											<img class="avatar-img rounded-circle shadow" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 40px;">
										</div>
										<div>
											<p class="h6 text-center" href="#"><?= $_SESSION['user'][0] ?></p>
											<p class="small h5 m-0"><?= $_SESSION['user'][1] ?></p>
										</div>
									</div>
									<hr>
								</li>
								<!-- Links -->
								<li><a class="dropdown-item bg-danger-soft-hover" href="../../views/user/edit.profile.view.php">
								<li><i class="fas fa-fw fa-user mr-2"></i>Edit Profile</a></li>
								<li><a class="dropdown-item bg-danger-soft-hover" href="/signout"><i class="fas fa-fw fa-sign-out-alt mr-2"></i>Sign Out</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- End of Topbar -->