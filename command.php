<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$mem = $argv[1];
$action = $argv[2];
$key = $argv[3];
$value = $argv[4];

if ($mem == 'redis') {
	if ($action == 'add' && $key && $value) {
		$redis->set($key, $value);
		$redis->expire($key, 3600);
	} elseif ($action == 'delete' && $key) {
		$redis->delete($key);
	} else {
		echo "Wrong action";
	}
} else {
	echo "Bad request";
}

$allKeys = $redis->keys('*');
print_r($allKeys);

