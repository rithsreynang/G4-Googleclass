<?php
require_once 'utils/url.php';
require_once 'database/database.php';
if (urlIs('/signin') || urlIs('/signup') || urlIs('/signout')) {
    require "account.router.php";
} else if (urlIs('/home') || urlIs('/todo') || urlIs('/teach') || urlIs('/enrollment') || urlIs('/archive')) {
    require "user.router.php";
} else if (urlIs('/join-class') || urlIs('/create-class') || urlIs('/change-banner-class')) {
    require "user.router.php";
}else if(urlIs('/steam-teacher')|| urlIs('/classwork-teacher') || urlIs('/people-teacher') || urlIs('/grade-teacher') || urlIs("/instruction-assignment") || urlIs("/student-work")) {
    require "user.router.php";
}else if (urlIs('/steam-student') || (urlIs('/classwork-student')) || (urlIs('/people-student')) || (urlIs('/grade-student')) || (urlIs("/view-instruction-assignment"))){
    require "user.router.php";
}else if(urlIs('/create-assignment') || (urlIs("/update-assignment"))  || (urlIs('/update-material')) || (urlIs('/change-banner-classroom')) || (urlIs('/create-material'))){
    require "classroom.router.php";
} else {
    require 'router.php';
}