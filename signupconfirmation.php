
<html>
<head>
	<title>confirm registration</title>
	<style>
		#content
		{
				margin-top: 4%;
				border-style: solid;
				width: 62%;
				margin-left: 20%;
				border-width: 1px;
				box-shadow: 2px 2px 3px 0px;
		}
	</style>
</head>
<body>
<div id="content">
<?php 
if(!isset($_REQUEST['email']) AND !isset($_REQUEST['code']))
		{
			echo "<center><h1>Information Not Found.</h1></center><br/>";
			echo '<center><a href="."><h3>Back to login</h3></a></center>';
			exit;
		}
?>
<br><center><strong><h1>CONFIRM REGISTRATION</h1></strong></center>
<?php

$email=$_REQUEST['email'];
$lastid=$_REQUEST['lastid'];
$code=trim($_REQUEST['code']);
$connection="myconnection.php";
$usertable="userpanganiban";
$profiletable="profilepanganiban";

require_once "./myconnection.php";

	if(isset($_POST['CONFIRM']))
	{
		if(empty($_REQUEST['code']))
		{
			echo "<br/><center><strong><h1>empty code</h1></strong></center>";
			 header("location: signup.php"); 
			exit;
		}
	}
$query="SELECT * FROM $usertable WHERE email='$email' AND user_id=$lastid";

$result = $db_connection->query($query);

$data = $result->fetch_object(); 
if ($data->verified == 1) 
	{
		echo '<center><h2>Email is already confirmed</h2></center>' ;
		echo '<center><h1><a href=".">Login now</a></h1></center>';
		exit;
	}
if($data)
{
	$thecode = $data->code;
	$fname = $data->fname;
	$lname = $data->lname;
	$gender = $data->gender;
		if($gender=='M')
		 {
			$sirmam="Sir";
		 } 
		 else 
		 {
			$sirmam="Ma'am";
		 }
		 if ($code==$thecode)
		{
			$query="SELECT * FROM $usertable WHERE email='$email' AND user_id=$lastid";
			$result = $db_connection->query($query);
			$data = $result->fetch_object(); 
			$pass = MD5($data->password);
			
			$query="UPDATE $usertable set`password`='$pass', `verified`='1' WHERE email='$email' AND user_id=$lastid";
			
			$result = $db_connection->query($query);
			
			$query="INSERT INTO ProfilePicture (user_id,profilepic,dateuploaded,isSet) 
			VALUES ('$lastid','Profile.jpg',NOW(),'T')";

			$result = $db_connection->query($query);
			echo "<center><br><h2>Welcome and congratulations $sirmam!</h2></center>";
			
			$query="INSERT INTO $profiletable (user_id) VALUES ($lastid)";
			$result = $db_connection->query($query);
			
			echo '<center><h1><a href=".">Login now</a></h1></center>';
			$query="DELETE FROM $usertable WHERE email='$email' AND verified=0";
			$result = $db_connection->query($query);
			exit;
		}
}
else
{

	echo "<center><h2>REGISTRATION CODE HAS BEEN EXPIRED.</h2></center>";
	echo "<center><br><a href='.' target='_top'><br>I will try to register again and receive a new number code.</a></center>";
}
?>
</div>