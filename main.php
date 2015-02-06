<?php

// Defines
define('CONFIG_NAME', 'config.php');
define('CONFIG_LOCAL_NAME', 'config.local.php');
define('DB_TIMEZINE', '+3:00');
define('PHP_TIMEZONE', 'Europe/Moscow');


// Default init
session_start();

date_default_timezone_set(PHP_TIMEZONE);


/**
 *
 */
function config($key=null) {
	static $config = null;

	if ($config === null) {
		$filePath = __DIR__ .  DIRECTORY_SEPARATOR . CONFIG_LOCAL_NAME;

		if (! file_exists($filePath)) {
			$filePath = __DIR__ . DIRECTORY_SEPARATOR . CONFIG_NAME;
		}
		
		$config = require_once($filePath);
	}

	if ($key === null) {
		return $config;
	}

	if (! isset($config[$key])) {
		return null;
	}

	return $config[$key];
}


/**
 *
 */
function db() {
	static $db = null;

	if ($db === null) {
		$config = config('db');

		if ($config === null) {
			return null;
		}

		$db = new PDO($config['dsn'], $config['user'], $config['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query("SET time_zone = '". DB_TIMEZINE ."'");
		$db->exec("set names utf8");
	}

	return $db;
}


/**
 *
 */
function currentPath() {
	static $path;

	if ($path === null) {
		$path = trim($_SERVER['PATH_INFO'], '/');
	}

	return $path;
}


/**
 *
 */
function printResponse($response, $type='application/json') {
	header('Content-type: ' . $type);

	echo json_encode($response);
	exit;
}
