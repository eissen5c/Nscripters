<?php
if(empty($_SESSION))
{
   session_start();
}

if(!isset($_SESSION['emaill']) or !isset($_SESSION['isAllowed']) or $_SESSION['isAllowed'] == "0")  
{
   exit('No direct script access allowed');
   $_SESSION['isAllowed'] = "0";	
}


							require_once '../myconnection.php';
							$userID = $_SESSION['userID'];
							$temp = $_SESSION['photoss'];
							$isAllowed = $_SESSION['isAllowed'];
							if($isAllowed == "1")
							{
								foreach($temp as $temp2)
								{
								$query = "DELETE FROM ProfilePicture where id=$temp2 and user_id={$userID}";
								$result = $db_connection->query($query);
								}
								$_SESSION['isAllowed'] = "0";	
								header("Location: ./deletephotos.php");
								die();
							}
							else
							{
								exit('No direct script access allowed');
								$_SESSION['isAllowed'] = "0";	
							}
											