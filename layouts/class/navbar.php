<?php
session_start();
require_once "../../database/database.php";
require_once "../../models/classroom/get.user.model.php";
require_once "../../models/classroom/select.classrooms.model.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$profileName = $user['profile'];
$classroom = getClassroomsUnarchive($user_id);
$class_name = "";
if (isset($_GET['classroom_id'])){
	$id = $_GET['classroom_id'];
	$class = getClassroom($id) ;
	$class_name = $class['classroom_name'];
}
$item = [
	'home' => [],
	'calendar' => [],
	'enrollment' => [],
	'teach' => [],
	'todo' => [],
	'archive' => [],
];
	if ($uri == '/home') {
		$item['home'] = ['#FBFCFC', 'black'];
	} else {
		$item['home'] = ['', ''];
	}
	if ($uri == '/calendar') {
		$item['calendar'] = ['#FBFCFC', 'black'];
	} else {
		$item['calendar'] = ['', ''];
	}
	if ($uri == '/enrollment') {
		$item['enrollment'] = ['#FBFCFC', 'black'];
	} else {
		$item['enrollment'] = ['', ''];
	}
	if ($uri == '/teach') {
		$item['teach'] = ['#FBFCFC', 'black'];
	} else {
		$item['teach'] = ['', ''];
	}
	if ($uri == '/todo') {
		$item['todo'] = ['#FBFCFC', 'black'];
	} else {
		$item['todo'] = ['', ''];
	}
	if ($uri == '/archive') {
		$item['archive'] = ['#FBFCFC', 'black'];
	} else {
		$item['archive'] = ['', ''];
	}
	
?>
<!-- Sidebar -->
<ul class="navbar-nav  bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #040720;">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-text mx-4">E-Classroom</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item  ">
		<a class="nav-link rounded-0 <?= $item['home'][0] ?>" href="/home">
			<i class='fas fa-home' style="color: <?= $item['home'][1] ?>"></i>
			<span style='font-size: 17px;color:<?= $item['home'][1] ?>'>Home</span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item ">
		<a class="nav-link rounded-0 <?= $item['calendar'][0] ?> " href="/calendar">
			<i class='far fa-calendar-alt' ​​​ style="color: <?= $item['calendar'][1] ?>"></i>
			<span style='font-size: 17px;color:<?= $item['calendar'][1] ?>'>Calendar</span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link rounded-0 <?= $item['todo'][0] ?>" href="/todo">
			<i class='fas fa-book' style="color: <?= $item['todo'][1] ?>;"></i>
			<span style='font-size: 17px; color:<?= $item['todo'][1] ?>'>To do</span>
		</a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item <?= $item['teach'][0] ?>">
		<a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#listTeach" aria-expanded="true" aria-controls="listTeach">
			<i class='fas fa-chalkboard-teacher' style="color: <?= $item['teach'][1] ?>;"></i>
			<span style='font-size: 17px;color:<?= $item['teach'][1] ?>'>Teaching</span>
		</a>
		<div id="listTeach" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php
				foreach ($classroom as $class) {
				?>
					<a class="collapse-item" href="../../controllers/teach/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>"> <?= $class['classroom_name'] ?></a>
				<?php } ?>
			</div>
		</div>
	</li>
	<li class="nav-item <?= $item['enrollment'][0] ?>">
		<a class="nav-link  <?= $item['enrollment'][0] ?>" href="#" data-toggle="collapse" data-target="#listenroll" aria-expanded="true" aria-controls="listenroll">
			<i class='fas fa-chalkboard-teacher' style="color: <?= $item['enrollment'][1] ?>;"></i>
			<span style="font-size: 17px;  color:<?= $item['enrollment'][1] ?>">Enrollment</span>
		</a>
		<div id="listenroll" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php
				$classes = getClasses($user_id);
				foreach ($classes as $class) {
				?>
					<a class="collapse-item" href="../../controllers/enrollment/enrollment.controller.php?classroom_id=<?= $class[0] ?>"><?= $class[1] ?></a>
				<?php  } ?>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link rounded-0" style="background:<?= $item['archive'][0] ?>" href="/archive">
			<i class='fas fa-archive' style="color: <?= $item['archive'][1] ?>;"></i>
			<span style="font-size: 17px;  color:<?= $item['archive'][1] ?>">Archive</span>
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
<div id="content-wrapper " class="d-flex flex-column col-10">
	<div class="d-flex justify-content-end flex-column">
		<div class="d-flex justify-content-between align-items-center m-3">
			<h2><?= $class_name ?></h2>
			<div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 30px;">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="avatar-img rounded-circle" src="../../assets/images/profile/<?= $profileName ?>" alt="avatar" style='height: 50px'>
						</a>
						<div class="dropdown-menu dropdown-menu-right pt-3" aria-labelledby="navbarDropdownProfile" style="background: #040720; margin-top: 30px;">
							<ul style="list-style: none; width: 250px; height: 200px; background: white;" class="p-2">
								<li>
									<div class="d-flex align-items-center flex-column">
										<!-- Avatar -->
										<div class="avatar me-3 mr-1">
											<img class="avatar-img rounded-circle shadow" src="../../assets/images/profile/<?= $profileName ?>" alt="avatar" style="width: 50px;">
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