<?php

// error reporting
ini_set("display_errors","2");
ERROR_REPORTING(E_ALL);

// set default timezone
date_default_timezone_set('America/New_York');

// define http referer
if(isset($_SERVER['HTTP_REFERER']))
	define("REFERER", $_SERVER['HTTP_REFERER']);

// document type
define('HTML_PARAMS','dir="ltr" lang="en"');
define('CHARSET', 'UTF-8');

// set main url's
if(getenv('HTTPS') == 'on')
	define("MAINURL", "https://apartmentsdev.naproperties.com/", true);
else
	define("MAINURL", "http://apartmentsdev.naproperties.com/", true);

// password salt
define("PASSWORD_SALT", "m?=IO*8wM!%>{-U"); // Salt genereated by Eric Adams for OPOP Tower on Jan 30, 2014

// db config
define("DB_SERVER", "nap007001");
define("DB_USER", "AFowler");
define("DB_PASS", 'Sunsh1n3');
define("DB_NAME", "napcincinnati.com");

//define("DB_USER", "live_admin");
//define("DB_NAME", "live_db");
//define("DB_PASS", "8afr5N8=R*n*");

// db tables
define("DB_PREFIX", "opop_");
define("DB_SUFFIX", "_dev");

define("TBL_USERS", 			DB_PREFIX."users");

define("TBL_PERMISSIONS",		DB_PREFIX."permissions");
define("TBL_PERMISSIONS_LIST",	DB_PREFIX."permissions_list");

define("TBL_ACTIVITY",			DB_PREFIX."activity");
define("TBL_META",				DB_PREFIX."meta");

// user tracking
define("TRACK_VISITORS", true);
define("TRACK_ACTIVITY", true);

// access key
define("ACCESS", 			false);
define("ACCESS_KEY", 		"please");
define("ACCESS_VALUE", 		"letmein");
define("ACCESS_REDIRECT", 	"http://www.weareturnstyle.com");
define("ACCESS_COOKIE", 	DB_PREFIX."redirect_session");

// session globals
define("USER_TIMEOUT", 	60*60*12*1);
define("GUEST_TIMEOUT", 5);
define("TOKEN_TIMEOUT", 60);

// session cookies
define("COOKIE_SESSION", 			DB_PREFIX."session_dev_test");
define("COOKIE_SESSION_LIFETIME", 	60*60*12*1);
define("COOKIE_USER", 				DB_PREFIX."user_dev");
define("COOKIE_USERID", 			DB_PREFIX."userid_dev");
define("COOKIE_EXPIRE", 			60*60);
define("COOKIE_PATH", 				"/");
define("COOKIE_DOMAIN", 			"apartmentsdev.naproperties.com");

// email settings
define("EMAIL_WELCOME", true);
define("USER_ACTIVATION", false);
define("USER_WELCOME", true);
define("ADMIN_WELCOME", true);

define("EMAIL_FROM_NAME", 		"The Tower at OPOP");
define("EMAIL_ADMIN", 			"noreply@naproperties.com");
define("EMAIL_FROM_ADDR", 		"noreply@naproperties.com");

// default meta tags
define("SITENAME", "The Tower at OPOP", true);
define("TITLE", "The Tower at OPOP", true);
define("DESCRIPTION", "The Tower at OPOP", true);
define("KEYWORDS", "The Tower at OPOP", true);
define("FOOTER_TEXT", "Content Management System Powered by <a href=\"http://turnstylecreative.com\" target=\"_blank\">Turnstyle Creative, LLC</a> &copy; Copyright ".date("Y")." All Rights Reserved.", true);

?>