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

		require_once '.././myconnection.php';
		$email =$_SESSION['emaill'];
		$password =md5($_SESSION['passwordd']);
		$query = "SELECT
                                    *
                                    FROM
                                    bulletinboard
                                    INNER JOIN
                                    userpanganiban
                                    ON
                                    bulletinboard.user_id
                                    =
                                    userpanganiban.user_id
                                    INNER JOIN
                                    ProfilePicture
                                    ON
                                    ProfilePicture.user_id
                                    =
                                    userpanganiban.user_id
                                    WHERE
                                    ProfilePicture.isSet = 'T' AND userpanganiban.email='$email' AND  userpanganiban.verified=1
                                    ORDER BY 
                                    bulletinboard.id DESC
                                    ";
		$result = $db_connection->query($query);
		
		$data = $result->fetch_object();	
		$last = ucwords(strtoupper($data->lname));
		$first = ucwords(strtoupper($data->fname));
		$middle =ucwords(strtoupper($data->mi));
		$middle2 = str_replace(".","",$middle);
		$date = $data->date;
		$gender = $data->gender;
		$birth = $data->birthday;
		if($profilepic = $data->profilepic)
		{
		$profile = $data->profilepic;
		}
		else
		{
		$profile = "Profile.jpg";
		}

		?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.5.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Profile</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/mobirise/css/style.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/Home.css">
  <link rel="stylesheet" href="../assets/css/Myprofile.css">
  
  
</head>
<body>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="."></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#"></a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="../home.php">HOME</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./Myprofile.php"><?php echo "$first"; ?></a></li> </ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="../logout.php">LOGOUT</a></li></ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
 			<div class="container">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >  
							  <div class="panel panel-info">
								<div class="panel-heading">
								  <h3 class="panel-title"><?php echo "$first $middle2 $last" ?></h3>
								</div>
								<div class="panel-body">
								  <div class="row">
									<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../user/profilepic/<?php echo "$profile" ;?>" class="img-circle img-responsive"> </div>
									<div class=" col-md-9 col-lg-9 "> 
									  <table class="table table-user-information">
									  <form method="post" >
										<?php
									  if(isset($_POST['submit']))
										{
												$lname = $_REQUEST['lname'];
												$fname = $_REQUEST['fname'];
												$mname = $_REQUEST['mname'];
											if (!is_int($lname))
											{
												$query = "UPDATE `userpanganiban` SET `fname`='$fname', `mi`='$mname', `lname`='$lname' WHERE email='$email' AND verified=1";
												if($result = $db_connection->query($query))
												{
													echo '<br/><div class="alert alert-success" role="alert">Update Success</div>';
													echo '<meta http-equiv="refresh" content="0;url=./Myprofile.php">';	
												}
												else
												{
													echo '<div class="alert alert-danger" role="alert">Error.</div>';
												}
											}
											else
												{
													echo '<div class="alert alert-danger" role="alert">Error.</div>';
												}
										}
										
										?>
										<tbody>
											<td>Lastname</td>
											<td><input style='text-transform:uppercase' class="lname" type="text" name="lname" required="" placeholder="Last Name" value="<?php echo "$last" ?>"></td>   
										  </tr>
										  <tr>
											<td>Firstname</td>
											<td><input  style='text-transform:uppercase' class="fname" type="text" name="fname" required="" placeholder="First Name" value="<?php echo "$first" ?>"></td>   
										  </tr>
										  <tr>
											<td>Middlename</td>
											<td><input style='text-transform:uppercase' class="mname" type="text" name="mname" required="" maxlength="2" placeholder="Middle Initial" style='text-transform:uppercase'value="<?php echo "$middle2" ?>"></td>   
										  </tr>
										</tbody>
									 
									  </table>
									  
									  <input type="image" name="submit" value="Save" class="btn btn-primary glyphicon glyphicon-floppy-saved">
									  <a href="./Myprofile.php" class="btn btn-primary glyphicon glyphicon-remove">Cancel</a>
									   
									  </form>
									</div>
								  </div>
								</div>
								
							  </div>
							</div>
						  </div>
						</div>
			
        
    </div>
</section>

<footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-0" style="background-color: rgb(68, 68, 68);">
    
    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row" style="padding-top: 12.3px; padding-bottom: 12.3px;">
            <div class="col-sm-12">
                <p class="mbr-footer__copyright">Copyright (c) 2016 Lorem Ispum Dolom.</p>
            </div>
        </div>
    </div>
</footer>


  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="../assets/mobirise/js/script.js"></script>
  
  
</body>
</html>