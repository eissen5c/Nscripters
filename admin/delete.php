<?php
	//echo "<center><h3>Enter ID:</h3><input type=\"num\" name=\"code\" ></center>";
	//echo "<br/><input type=\"submit\" id=\"CONFIRM\" name=\"CONFIRM\" value=\"CONFIRM\"><br/>"; 
	require_once '.././myconnection.php';
	$email = $_REQUEST['email'];
	$query="DELETE FROM userpanganiban WHERE email='$email'";
	
	if($result = $db_connection->query($query))
	{
	echo "SUCCESS";
	echo "<a href=\"./table.php\">Back</a>";
	}
	else
	{
	echo "GG";
	}