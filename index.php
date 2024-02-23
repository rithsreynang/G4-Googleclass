<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs('/signin') || urlIs('/signup') || urlIs('/signout')) {
    require "account.router.php";
} else if (urlIs('/home') || urlIs('/calendar') || urlIs('/todo') || urlIs('/teach') || urlIs('/enrollment')) {
    require "user.router.php";
} else if (urlIs('/join-class') || urlIs('/create-class') || urlIs('/change-banner-class')) {
    require "user.router.php";
} else {
    require 'router.php';
}