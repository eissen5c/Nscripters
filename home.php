<?php 
if(empty($_SESSION))
{
   session_start();
}

if(!isset($_SESSION['emaill'])) 
{
   header("Location: .");
   exit; 
} 
 if(isset($_POST['changepassword']))
					  {
						  echo '<meta http-equiv="refresh" content="0;url=./changepassword.php">';	
						  exit;
					  }
					  elseif(isset($_POST['chat']))
					  {
						 echo '<meta http-equiv="refresh" content="0;url=./chat.php">';	
						  exit;
					  }
					  elseif(isset($_POST['myprofile']))
					  {
						  echo '<meta http-equiv="refresh" content="0;url=./user/Myprofile.php">';	
						   exit;
						
					  }
					  elseif(isset($_POST['editprofile']))
					  {
						 echo '<meta http-equiv="refresh" content="0;url=./user/editmyprofile.php">';
						exit;						 
						
					  }
					  elseif(isset($_POST['messages']))
					  {
						echo '<meta http-equiv="refresh" content="0;url=./user/myprofilepic.php">';	
						 exit;
						 
					  }
                        elseif(isset($_POST['myphotos']))
					  {
						 echo '<meta http-equiv="refresh" content="0;url=./user/Myphotos.php">';	
						  exit;
					  }
					  elseif(isset($_POST['viewprofile']))
					  {
						 echo '<meta http-equiv="refresh" content="0;url=./user/viewprofile.php">';
						 exit;
					  }
	
?>
			
<?php 

		require_once './myconnection.php';
		$email = $_SESSION['emaill'];
		$password = md5($_SESSION['passwordd']);
		$query = "SELECT
                                    *
                                    FROM
                                    userpanganiban
                                    WHERE
                                    email='$email' AND  verified=1
                                    ";
		$result = $db_connection->query($query);
    
		if ($data = $result->fetch_object())
				{
					if ($data->password == $password)
					{ 
						$last = ucwords(strtoupper($data->lname));
						$first = ucwords(strtoupper($data->fname));
						$middle =ucwords(strtoupper($data->mi));
						$middle2 = str_replace(".","",$middle);
                        $userID = $data->user_id;
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
						$_SESSION['lastt'] = $last;
						$_SESSION['firstt'] = $first;
						$_SESSION['middlee'] = $middle2;
						$_SESSION['profilee'] = $profile;
						$_SESSION['userID'] = $userID;
						include('../SoftwareEngineering/function.php');
						$_SESSION['ipaddress'] = getUserIP();
						
					}
					else
					{
						session_unset();
						//session_destroy();
					?>
					<style>
					a.mbr-buttons__link.btn.text-white
					{
					display:none!important;
					} 
					a.mbr-buttons__btn.btn.btn-danger
					{
					display:none!important;
					}
					img.mbr-navbar__brand-img.mbr-brand__img
					{
					display:none!important;
					}
					</style>
					<?php
					
					}
				}
				else
				{
				$first = "NULL";
				?>
				<style>
					a.mbr-buttons__link.btn.text-white
					{
					display:none!important;
					} 
					a.mbr-buttons__btn.btn.btn-danger
					{
					display:none!important;
					}
					img.mbr-navbar__brand-img.mbr-brand__img
					{
					display:none!important;
					}
				</style>
			<?php	}
		
		
		
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
  <title>Home</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <style>
  section#ext_menu-0 {
    position: fixed;
    z-index: 99;
}
.loginmodal-container a {
    color: white!important;
}
a#LOGIN {
    width: 49%;
}
.loginmodal-container {
    text-align: center;
}
  </style>
</head>
<body>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span ><img class="media-object" src="./user/profilepic/<?php echo "$profile" ;?>" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="."></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#"></a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./home.php">HOME</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./user/Myprofile.php"><?php echo "$first"; ?></a></li> </ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="./logout.php">LOGOUT</a></li></ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="engine"><a rel="external" href="https://mobirise.com">simple web site generator</a></section><section class="mbr-section mbr-after-navbar" id="content1-0">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
		<?php
                $query = "SELECT
                                    *
                                    FROM
                                    userpanganiban
                                    WHERE
                                    email='$email' AND  verified=1
                                    ";
		      $result = $db_connection->query($query);
                $data = $result->fetch_object();
		if(!$data)
		{
			session_unset();
			session_destroy();
			echo "<center><h1>Information Not Found.</h1></center><br/>";
			echo '<center><a href="."><h3>Back to login</h3></a></center>';
			
		}
		else
		{
            
				if ($data->email == $email)
				{
					if ($data->password == $password)
					{ 
					?>
                    <style>
                        input.btn.btn-success 
                        {
                            padding: 1%;
                        }
                     </style>
					<div style="margin-bottom:1%;margin-top: -10%;" class="" role="group" aria-label="...">
                        <h1>ANNOUNCEMENT :</h1>
                        <p>*View Profile is here</p>
						<p>*Chat is here(TESTING)</p>
					<form method="post" action="./home.php">
					  <input type="submit" name="changepassword" class="btn btn-success" value="CHANGE PASSWORD"/>
					  <input type="submit" name="chat" class="btn btn-success" value="CHAT"/>
					  <input type="submit" name="myprofile" class="btn btn-success" value="MY PROFILE"/>
					  <input type="submit" name="editprofile" class="btn btn-success" value="EDIT PROFILE"/>
					  <input id="UPLOAD" type="submit" name="messages" class="btn btn-success" value="UPLOAD"/>
                      <input type="submit" name="myphotos" class="btn btn-success" value="MY PHOTOS"/>
					  <input type="submit" name="viewprofile" class="btn btn-success" value="VIEW PROFILE"/>
					  <?php
					 //last
					  ?>
					 </form>
					</div>
				
					<?php
					include './post.php';
					echo '<hr/>';
						$query = "	SELECT
                                    *
                                    FROM
                                    userpanganiban
									INNER JOIN
                                    ProfilePicture
                                    ON
                                    ProfilePicture.user_id
                                    =
                                    userpanganiban.user_id												INNER JOIN
                                    bulletinboard
                                    ON
                                    bulletinboard.user_id
                                    =
                                    userpanganiban.user_id
                                    WHERE
                                    ProfilePicture.isSet = 'T'
									ORDER BY 
                                    bulletinboard.id DESC
                                    
                                    ";
						$result = $db_connection->query($query);
						
					?>
					<!--<iframe src="./post.php" style="width:100%;border-color:transparent;"></iframe>-->
					<div id="bulletinboard" class="media">
					<?php

						while($data = $result->fetch_object())
						{

				
					?>
						<div class="media">
						  <div class="media-left">
						  <?php if($email == $data->email) 
						  {
						  ?>
							<a href="./user/Myprofile.php">
							  <img class="media-object" src="./user/profilepic/<?php 
							  $pp = $data->profilepic;
							  if (!file_exists("./user/profilepic/$pp"))
							  {
							  echo "Profile.jpg" ;
							  }
							  else
							  {
							   echo "$pp" ;
							  }
							  ?>" alt="64x64">
							</a>
						<?php } 
							else
							{
						?>
							<a href=<?php echo "./user/viewprofile.php?userid=$data->user_id"?>>
							  <img class="media-object" src="./user/profilepic/<?php 
							  $pp = $data->profilepic;
							  if (!file_exists("./user/profilepic/$pp"))
							  {
							  echo "Profile.jpg" ;
							  }
							  else
							  {
							   echo "$pp" ;
							  }
							  ?>" alt="64x64">
							</a>
						<?php } ?>
						  </div>
						  <div id="otheraccount" class="media-body text-justify">
							<h4 class="media-heading">
							<?php 
							
							
							if($email == $data->email)
							{
							
								echo "<strong style=\"color:blue;text-transform: uppercase;\">$data->fname $data->mi $data->lname </strong>";
								$_SESSION['isAllowed'] = "1";
								echo "&nbsp&nbsp<input id=\"$data->id\" type=\"button\" value=\"Delete\" / data-toggle=\"modal\" data-target=\"#$data->id-modal\">";

							}
							else
							{
								echo "<strong style=\"text-transform: uppercase;\">$data->fname $data->mi $data->lname </strong>"; 
							}
							?>
							</h4>
							
							<?php echo "$data->post";
	
							
							?>
							
						  </div>
						</div>
						<hr/>
					<?php
							}
						}
					else
					{
                        ?>
                        <style>
                        img.media-object {
                            display: none!important;
                        }
                        </style>
                          <?php 
                    
						session_unset();
						session_destroy();
						echo "<center><h1>Wrong Password.</h1></center><br/>";
						echo '<center><a href="."><h3>Back to login</h3></a></center>';
						
					}
				}
}
?>		
				</div>
			</div>
        </div>
    </div>
</section>
<?php 
						$query = "	SELECT
                                    *
                                    FROM
                                    userpanganiban
									INNER JOIN
                                    ProfilePicture
                                    ON
                                    ProfilePicture.user_id
                                    =
                                    userpanganiban.user_id												INNER JOIN
                                    bulletinboard
                                    ON
                                    bulletinboard.user_id
                                    =
                                    userpanganiban.user_id
                                    WHERE
                                    ProfilePicture.isSet = 'T'
									ORDER BY 
                                    bulletinboard.id DESC
                                    
                        
						";
						$result = $db_connection->query($query);
						
						while($data = $result->fetch_object())
						{
						
						?>
						
<div class="modal fade" id="<?php echo $data->id ;?>-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h3 >Are you sure? to delete this post? </h3><br>
				  <form id="loginform" name="login" method="post" target="_top">
					<a href="" data-dismiss="modal" id="LOGIN" name="<?php echo $data->id ;?>" type="submit" class=" btn btn-lg animated fadeInUp btn-primary" >NO</a>
					<a href="./deletepost.php?del=<?php echo $data->id ;?>" id="LOGIN" name="<?php echo $data->id ;?>" type="submit" class=" btn btn-lg animated fadeInUp btn-primary" >YES</a>
				  </form>
				</div>
			</div>
		  </div>
		  
		  <?php } ?>
		  
<footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-0" style="background-color: rgb(68, 68, 68);">
    
    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row" style="padding-top: 12.3px; padding-bottom: 12.3px;">
            <div class="col-sm-12">
                <p class="mbr-footer__copyright">Copyright (c) 2016 Lorem Ispum Dolom.</p>
            </div>
        </div>
    </div>
</footer>

 
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>