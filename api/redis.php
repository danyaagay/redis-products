<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$key = str_replace('/api/redis/', '', $_SERVER['REQUEST_URI']);
$data = [];

if ($method === 'GET') {
	$allKeys = $redis->keys('*');
	foreach ($allKeys as $key) {
		$value = $redis->get($key);
		$data[$key] = $value;
	}
} elseif ($method === 'DELETE' && $key) {
	$redis->delete($key);
} else {
	http_response_code(500);
	$data['message'] = 'Unknown method';
}

$data = json_encode($data);
echo $data;
?>