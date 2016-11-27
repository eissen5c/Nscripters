<?php
if(empty($_SESSION))
{
   session_start();
}

if(!isset($_SESSION['emaill']))  
{
   exit('No direct script access allowed');
}


							require_once './myconnection.php';
							$userID = $_SESSION['userID'];
							$temp = $_REQUEST['del'];
							$isAllowed = $_SESSION['isAllowed'];

							if($isAllowed == "1")
							{
								$query = "DELETE FROM bulletinboard where id=$temp and user_id={$userID}";
								$result = $db_connection->query($query);
								$_SESSION['isAllowed'] = "0";	
								header("Location: .");
								die();
							}
							else
							{
								exit('No direct script access allowed');
								
							}
											