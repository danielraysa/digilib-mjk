<?php
	session_start();
	$root_folder = basename(__DIR__);
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	ini_set("log_errors", 1);
	ini_set("error_log", __DIR__."/errors/php-error-".date('Y-m-d').".log");
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Jakarta");
	$conn = mysqli_connect("localhost","root","","digilib");
	$user_mail = 'email@gmail.com';
	$pass_mail = 'password';
?>