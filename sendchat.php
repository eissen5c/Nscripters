<?php
session_start();
	$post = trim($_REQUEST['chatinput']);
	$userID = $_SESSION['userID'];
require_once('./myconnection.php');
$query =" INSERT INTO chat (user_id,post,date) VALUES ( '{$userID}','{$post}',NOW() ) ";
$result = $db_connection->query($query);

include('./recievechat.php');
?>
