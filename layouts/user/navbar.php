<?php
session_start();
require_once "database/database.php";
require_once "models/classroom/get.user.model.php";
require_once "models/classroom/select.classrooms.model.php";
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$item = [
	'home' => [],
	'calendar' => [],
	'enrollment' => [],
	'teach' => [],
	'todo' => [],
];
if ($uri == '/home') {
	$item['home'] = ['bg-white', 'black'];
} else {
	$item['home'] = ['', ''];
}
if ($uri == '/calendar') {
	$item['calendar'] = ['bg-white', 'black'];
} else {
	$item['calendar'] = ['', ''];
}
if ($uri == '/enrollment') {
	$item['enrollment'] = ['bg-white', 'black'];
} else {
	$item['enrollment'] = ['', ''];
}
if ($uri == '/teach') {
	$item['teach'] = ['bg-white', 'black'];
} else {
	$item['teach'] = ['', ''];
}
if ($uri == '/todo') {
	$item['todo'] = ['bg-white', 'black'];
} else {
	$item['todo'] = ['', ''];
}
?>
<!-- Sidebar -->
<ul class="navbar-nav  bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
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
		<a class="nav-link collapsed " href="/teach" data-toggle="collapse" data-target="#listTeach" aria-expanded="true" aria-controls="listTeach">
			<i class='fas fa-chalkboard-teacher' style="color: <?= $item['teach'][1] ?>;"></i>
			<span style='font-size: 17px;color:<?= $item['teach'][1] ?>'>Teaching</span>
		</a>
		<div id="listTeach" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<?php
				$email = $_SESSION['user'][2];
				$user_id = getUser($email)[0];
				$classroom = getClassrooms($user_id);
				foreach($classroom as $class){
				?>
				<a class="collapse-item" href="/teach"><?= $class['classroom_name'] ?> </a>
				<?php } ?>
			</div>
		</div>
	</li>
	<li class="nav-item <?= $item['enrollment'][0] ?>">
		<a class="nav-link  <?= $item['enrollment'][0] ?>" href="/enrollment" data-toggle="collapse" data-target="#listenroll" aria-expanded="true" aria-controls="listenroll">
			<i class='fas fa-chalkboard-teacher' style="color: <?= $item['enrollment'][1] ?>;"></i>
			<span style="font-size: 17px;  color:<?= $item['enrollment'][1] ?>">Enrollment</span>
		</a>
		<div id="listenroll" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="#">To review</a>
				<a class="collapse-item" href="/enrollment">Node js </a>
			</div>
		</div>
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
	<div class="dropdown ms-1 ms-lg-0 d-flex justify-content-end">
		<a href="/signout">sign out</a>
		<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
			<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar" style='width: 55px'>
		</a>
		<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
			<!-- Profile info -->
			<li class="px-3">
				<div class="d-flex align-items-center">
					<div class="avatar me-3">
						<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
					</div>
					<div>
						<a class="h6" href="#">Lori Ferguson</a>
						<p class="small m-0">example@gmail.com</p>
					</div>
					<hr>
			</li>
			<!-- Links -->
			<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
			<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
			<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
			<li><a class="dropdown-item bg-danger-soft-hover" href="#"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
			<li>
				<hr class="dropdown-divider">
			</li>
			<li>
				<div class="modeswitch-wrap" id="darkModeSwitch">
					<div class="modeswitch-item">
						<div class="modeswitch-icon"></div>
					</div>
					<span>Dark mode</span>
				</div>
			</li>
			<!-- Dark mode switch END -->
		</ul>
	</div>
	<!-- Profile START -->