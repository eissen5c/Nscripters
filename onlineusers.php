<?php
if(empty($_SESSION))
{
session_start();
}


include('./functions.php');
require_once('./myconnection.php');
$userID = $_SESSION['userID'];
onlineusers();