<?php

$ip_addr = "";
$user_agent = "";
$thispage = "";
$username = "";

if(getenv('REMOTE_ADDR')){
	$ip_addr = getenv('REMOTE_ADDR');
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$thispage = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

if(isset($_SESSION['num'])){
	$username = $_SESSION['num'];
} else {
	$username = "no";
}

$sql = "
  INSERT INTO `counter`(`ipaddr`, `useragent`, `page`, `num`) 
  VALUES ('$ip_addr', '$user_agent', '$thispage', '$username')";

$conn->query($sql);

?>