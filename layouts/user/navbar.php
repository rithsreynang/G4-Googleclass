<?php
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
			<span style='font-size: 17px;color:<?= $enrollment[1] ?>'>Enrollment</span>
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
	<!-- Main Content -->
	<div>
		<div class="d-flex justify-content-end align-items-center mt-2">
			<a class="nav-link" href="#">
				<img class="img-profile rounded-circle" style="width: 40px;" src="assets/images/user.png">
			</a>
			<a class='btn btn-success mr-3' href="signout">Sign out</a>
		</div>
		<hr class="sidebar-divider" style="margin-top: 5px;">
	</div>
	<!-- End of Topbar -->