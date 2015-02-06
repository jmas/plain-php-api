<?php

require_once('./main.php');

// Response definition
$response = [
	'result'=>null,
	'error'=>null,
];

switch (currentPath()) {
	// Get current user
	case 'user':
		if (empty($_SESSION['user'])) {
			break;
		}

		$response['result'] = $_SESSION['user'];
		break;
}

// Print response
printResponse($response);
