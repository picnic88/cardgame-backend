<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

switch ($request_uri) {
	case '/api/rank':
		require './api/rank.php';
		break;
	case '/api/result':
		require './api/result.php';
		break;
	default:
		echo json_encode(["status" => "error", "message" => "잘못된 API"]);
		break;
}
?>
