<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs('/user-signin') || urlIs('/user-signup') || urlIs('/user-signout')) {
    require "account_router.php";
} else if (urlIs('/home')) {
    require "user_router.php";
} else {
    require 'router.php';
}
