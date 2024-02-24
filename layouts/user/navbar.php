<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
if ($uri == '/home') {
	$home = ['bg-light', 'black'];
} else {
	$home = ['', ''];
}
if ($uri == '/calendar') {
	$calendar = ['bg-light', 'black'];
} else {
	$calendar = ['', ''];
}
if ($uri == '/enrollment') {
	$enrollment = ['bg-light', 'black'];
} else {
	$enrollment = ['', ''];
}
if ($uri == '/teach') {
	$teach = ['bg-light', 'black'];
} else {
	$teach = ['', ''];
}
if ($uri == '/todo') {
	$to_do = ['bg-light', 'black'];
} else {
	$to_do = ['', ''];
}
?>
<!-- Sidebar -->
<ul class="navbar-nav position-fixed bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-shopping-cart"></i>
		</div>
		<div class="sidebar-brand-text mx-4">E-Classroom</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item  ">
		<a class="nav-link rounded-0 <?= $home[0] ?>" href="/home">
			<i class="fas fa-fw fa-cog"></i>
			<span style='font-size: 17px;color:<?= $home[1] ?>'>Home</span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item ">
		<a class="nav-link rounded-0 <?= $calendar[0] ?> " href="/calendar">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span style='font-size: 17px;color:<?= $calendar[1] ?>'>Calendar</span>
		</a>
	</li>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link rounded-0 <?= $to_do[0] ?>" href="/todo">
			<i class="fas fa-fw fa-shopping-cart"></i>
			<span style='font-size: 17px;color:<?= $to_do[1] ?>'>To do</span>
		</a>
	</li>
	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link rounded-0 <?= $teach[0] ?>" href="/teach">
			<i class="fas fa-fw fa-users"></i>
			<span style='font-size: 17px;color:<?= $teach[1] ?>'>Teaching</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link rounded <?= $enrollment[0] ?>" href="/enrollment">
			<i class="fas fa-fw fa-chart-area"></i>
			<span style='font-size: 17px;color:<?= $enrollment[0] ?>'>Enrollment</span>
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
<div id="content-wrapper " class="d-flex flex-column col-10" style='margin-left: 225px'>
	<div class="dropdown ms-1 ms-lg-0 d-flex justify-content-end">
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
		<li> <hr class="dropdown-divider"></li>	
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