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
				$email = $_SESSION['user'][1];
				$user_id = getUser($email)[0];
				$classroom = getClassrooms($user_id);
				foreach ($classroom as $class) {
				?>
					<a class="collapse-item" href="/teach?classroom_id=<?= $class['classroom_id'] ?>"><?= $class['classroom_name'] ?> </a>
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
	<div class="d-flex justify-content-end flex-column">
		<div class="d-flex justify-content-end align-items-center m-3">
			<div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 30px;">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar" style="width: 40px; margin-top: 10px">
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
							<ul style="list-style: none;" class="p-2">
								<li>
									<div class="d-flex align-items-center">
										<!-- Avatar -->
										<div class="avatar me-3 mr-1">
											<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar" style="width: 40px;">
										</div>
										<div>
											<a class="h6" href="#"><?= $_SESSION['user'][0] ?></a>
											<p class="small m-0"><?= $_SESSION['user'][1] ?></p>
										</div>
									</div>
									<hr>
								</li>
								<!-- Links -->
								<li>
									<a class="dropdown-item nav-link dropdown-toggle" href="#" id="#updateprofile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-person fa-fw me-2"></i>
										Edit Profile
									</a>
									<div class="dropdown-menu bg-danger" style="width: 100px;" aria-labelledby="updateprofile">
										<h1>Edit profile name</h1>
									</div>
								</li>
								<li><a class="dropdown-item bg-danger-soft-hover" href="/signout"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- End of Topbar -->