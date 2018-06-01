<?php
$ip = $_SERVER['REMOTE_ADDR'];
$headers = apache_request_headers();
if ($headers['X-Forwarded-For']) {
	$ip = $headers['X-Forwarded-For'];
}

if (preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $ip)) {
	$result = "IPv4-red";
} else {
	$result = "IPv6-green";
}
header("Content-Type: image/svg+xml");
echo file_get_contents("via-{$result}.svg");
