<?php 
if(empty($_SESSION))
{
   session_start();
}

if(!isset($_SESSION['emaill'])) 
{
   header("Location: ..");
   exit; 
} 
if(!isset($_REQUEST['userid']))
{
exit;
}
		require_once '.././myconnection.php';
		$email =$_SESSION['emaill'];
		$password =md5($_SESSION['passwordd']);
		if(isset($_REQUEST['userid']))
		{
		$useridd = $_REQUEST['userid'];
		$query = "SELECT
                                    *
                                    FROM
                                    userpanganiban
                                    WHERE
                                    user_id='$useridd' AND  verified=1
                                    ";
		}
		else
		{
		$query = "SELECT
                                    *
                                    FROM
                                    userpanganiban
                                    WHERE
                                    email='$email' AND  verified=1
                                    ";
		}
		$result = $db_connection->query($query);
		
		$data = $result->fetch_object();
		if(!$data)
		{
		exit;
		}
		$last = ucwords(strtoupper($data->lname));
		$first = ucwords(strtoupper($data->fname));
		$middle =ucwords(strtoupper($data->mi));
		$middle2 = str_replace(".","",$middle);
		$date = $data->date;
		$gender = $data->gender;
		$birth = $data->birthday;
        $userID = $data->user_id;
		$emaill = $data->email;
			             $query = "	SELECT
                                    *
                                    FROM
                                    ProfilePicture
                                    WHERE
                                    isSet = 'T' AND user_id='$userID'
                                    ";
		                $result = $db_connection->query($query);
                        if($data = $result->fetch_object())
						//if($profilepic = $data->profilepic)
		{
		$profile = $data->profilepic;
		}
		else
		{
		$profile = "Profile.jpg";
		}
		?>

				
								<div class="panel-heading" >
								  <h3 class="panel-title"><?php echo "$first $middle2 $last" ?></h3>
								</div>
								<div class="panel-body" >
								  <div class="row">
									<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../user/profilepic/<?php echo "$profile" ;?>" class="img-circle img-responsive"> </div>
									<div class=" col-md-9 col-lg-9 "> 
									  <table class="table table-user-information">
										<tbody>
										  
										  <tr>
											<td>Lastname</td>
											<td><?php echo "$last" ?></td>   
										  </tr>
										  <tr>
											<td>Firstname</td>
											<td><?php echo "$first" ?></td>   
										  </tr>
										  <tr>
											<td>Middlename</td>
											<td><?php echo "$middle2" ?></td>   
										  </tr>
										  <tr>
											<td>Date Registered:</td>
											<td><?php echo "$date" ?></td>
										  </tr>
										  <tr>
											<td>Date of Birth:</td>
											<td><?php echo "$birth" ?></td>
										  </tr>
									   
											 <tr>
											 
												 <tr>
											<td>Gender:</td>
											<td>
											<?php 
											if ($gender == "M")
											{
												echo "MALE" ;
											}
											else
											{
												echo "FEMALE" ;
											}
											?>
											</td>
										  </tr>
										  <tr>
											<td>Email</td>
											<td><a href="mailto:<?php echo "$emaill";?>"><?php echo "$emaill";?></a></td>
										  </tr>
										   <tr>
											<td>Total Post:</td>
											<td><?php
											$query = "SELECT count(*) as cnt FROM bulletinboard where user_id ={$userID}";
											$result = $db_connection->query($query);
											$data = $result->fetch_object();
											echo $data->cnt ;
											?></td>
										  </tr>
										</tbody>
									  </table>
									</div>
								  </div>
								</div>
							
