<?php
$conn = new mysqli("db", "carduser", "mycard", "cardgame");

if($conn->connect_error) {
	die(json_encode(["status" => "error", "message" => "Database Connection Failed"]));
}
?>
