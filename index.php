<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs('/user-signin') || urlIs('/user-signup') || urlIs('/user-signout')) {
    require "account_router.php";
} else if (urlIs('/home') || urlIs('/calendar') || urlIs('/todo') || urlIs('/teach') || urlIs('/enrollment')) {
    require "user_router.php";
} else if (urlIs('/join-class') || urlIs('/create-class') || urlIs('/change-banner-class')) {
    require "user_router.php";
} else {
    require 'router.php';
}
