<?php
ini_set('display_errors', 'true');
$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
	include 'index.html';
} elseif ($uri === '/api/redis' || stripos($uri, '/api/redis/') === 0) {
	include 'api/redis.php';
} else {
    header("HTTP/1.0 404 Not Found");
}    
?>