<?php 
if(empty($_SESSION)) 
{
   session_start();
}

if(isset($_SESSION['emaill'])) 
{ 

   header("location: home.php"); 
   exit; 
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
  <title>NSCripters</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <style>
	input#email 
	{
		margin-top: -5%;
	}
	p.mbr-hero.animated.fadeInUp.mbr-hero__subtext {
    margin-top: 1%;
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
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href=".">NSCRIPTERS</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#" data-toggle="modal" data-target="#signup-modal">Signup</a></li> </ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="#"data-toggle="modal" data-target="#login-modal">Login</a></li></ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



		  
		  
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background mbr-after-navbar" id="header2-0" style="background-image: url(assets/images/body-2000x1428-7.jpg);">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);"></div>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-left">
                <div class="row"><div class=" col-sm-6 col-sm-offset-6">
					<?php
					
					if(isset($_REQUEST['email']) and isset($_REQUEST['code']))
					{
						$code = $_REQUEST['code'];
						$code = str_replace("'","''",$code);
						$temp = $_REQUEST['email'];
						$temp = str_replace("'","''",$temp);
						if(empty($code) or empty($temp))
						{
						echo '<div class="mbr-hero animated fadeInUp">';
							echo '<h1 class="mbr-hero__text">RESET CODE IS EXPIRED</h1>';
							echo '<a href="./forgotpassword.php"><p class="mbr-hero__subtext">Back</p></a>';
							echo ' </div>';
						exit;
						}
						require_once './myconnection.php';
						$query = "SELECT * from userpanganiban where email='{$temp}' AND verified=1 AND code={$code}";
						$result = $db_connection->query($query);
						if($data = $result->fetch_object())
						{
							if(isset($_POST['CHANGE']))
							{
								$pass1 = $_REQUEST['password'];
								$pass2 = $_REQUEST['repassword'];
									if($pass1 == $pass2)
									{
									require_once './myconnection.php';
									$code=rand(1,100000);
									$pass3 = MD5($pass2);
									$query="UPDATE userpanganiban set `code`='{$code}' , `password`='{$pass3}'WHERE email='{$temp}'";
									$result = $db_connection->query($query);
									
									
										echo '<h1 class="mbr-hero__subtext">Your password has been changed successfully! Thank you.</h1>';
										echo '<h1 class="mbr-hero__subtext">YOU CAN LOGIN NOW</h1>';
										echo '<a href="."><p class="mbr-hero__subtext">Back</p></a>';
										exit;
									}
									else
									{
										unset($_POST['password']);
										unset($_POST['repassword']);
										echo '<h1 class="mbr-hero__subtext">PASSWORD DOES NOT MATCH</h1>';
										//echo '<a href="./forgotpassword.php"><p class="mbr-hero__subtext">Back</p></a>';
									}
								
							}
							echo '<div class="mbr-hero animated fadeInUp">';
							echo '<h1 class="mbr-hero__text">NOW CHANGE YOUR PASSWORD</h1>';
							echo '<p class="mbr-hero__subtext">New Password</p>';
							echo ' </div>';
							echo '<form method="POST">';
							
							echo '<input type="password" id="password"  name="password" placeholder="New Password" required="" />';	
							echo '<input type="password" id="repassword" name="repassword" placeholder="Re Password" required="" />';	
							echo '<div class="mbr-buttons btn-inverse mbr-buttons--left"><input  class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" id="CHANGE" name="CHANGE" type="submit" value="Change"/>';
							
							
							
							echo '</form>';
						}
						else
						{
							echo '<div class="mbr-hero animated fadeInUp">';
							echo '<h1 class="mbr-hero__text">RESET CODE IS EXPIRED</h1>';
							echo '<a href="./forgotpassword.php"><p class="mbr-hero__subtext">Back</p></a>';
							echo ' </div>';

						}
					}
					elseif(isset($_REQUEST['email']))
					{
						$temp = $_REQUEST['email'];
						$temp = str_replace("'","''",$temp);
						
						require_once './myconnection.php';
						$code=rand(1,100000);
						
						$query="UPDATE userpanganiban set `code`='{$code}' WHERE email='{$temp}'";
						$result = $db_connection->query($query);
						
						$query = "SELECT * from userpanganiban where email='{$temp}' AND verified=1";
						$result = $db_connection->query($query);
						
						
							if($data = $result->fetch_object())
							{
							echo '<div class="mbr-hero animated fadeInUp">';
							echo '<h1 class="mbr-hero__text">PASSWORD SEND</h1>';
							echo '<p class="mbr-hero__subtext">We\'ve sent an email to ',$temp,' Click the link in the email to reset your password.</p>';
							echo '<p class="mbr-hero__subtext"> If you don\'t see the email, Just wait at least 5 to 10 Minutes to arrive the mail.</p>';
							
							#send email
								$to=$temp;

								$firstName="Eissen Jule";
								$lastName="Panganiban";
								$youremail="eissenjulepanganiban@gmail.com";
								$subject = 'RESET CODE-PLEASE DO NOT REPLY';
								$message = "\n\n\n\n\n\nNSCripters Verification Code:\n\n\n\n";
								$message .= " Reset Link : http://panganiban.icacmu.website/webapp/forgotpassword.php?email=$temp&&code=$code <br/>";
								$message .= "\n\n\n\n\n\n Enjoy \n\n\n\n";

								$headers = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

								$headers .= 'To:<'.$to.'>'."\r\n";
								$headers .="From: noreply@icacmu.website" . "\r\n";

								$sendd = mail($to, $subject, $message, $headers);


							echo '<a href="."><p class="mbr-hero__subtext">Back</p></a>';
							echo ' </div>';
							}
							else
							{
							echo "$temp";
							echo '<div class="mbr-hero animated fadeInUp">';
							echo '<h1 class="mbr-hero__text">ACCOUNT NOT FOUND</h1>';
							echo '<a href="./forgotpassword.php"><p class="mbr-hero__subtext">Back</p></a>';
							echo ' </div>';
							}
					}
					else
					{
						
						echo '<div class="mbr-hero animated fadeInUp">';
						echo '<h1 class="mbr-hero__text">FORGOT PASSWORD</h1>';
						echo '<p class="mbr-hero__subtext">Enter Email</p>';
						echo ' </div>';
						echo '<form>';
						echo '<input type="email" id="email" name="email" placeholder="Email" required="" />';	
						echo '<div class="mbr-buttons btn-inverse mbr-buttons--left"><input  class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" id="SENDLINK" type="submit" value="Send Link"/>';
						echo '</form>';
					}
					 ?>

                </div></div>
            </div></div>
        </div>
        
    </div>
</section>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<a href="#" data-dismiss="modal"><h5>[CLOSE]</h5></a>
					<h1 class="tada animated infinite">LOGIN</h1><br>
				  <form id="loginform" name="login" method="post" target="_top">
					<input id="emaill" type="email" name="email" required="" placeholder="E-mail">
					<input id="passwordd" type="password" name="password" placeholder="Password" required="">
					<input id="LOGIN" name="LOGIN" type="submit" class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" value="Login">
					 <?php 
											
										if(isset($_POST['LOGIN']))
										{
											$_SESSION['emaill'] = $_POST['email'];
											$_SESSION['passwordd'] = $_POST['password'];
											echo '<meta http-equiv="refresh" content="0;url=./home.php">';					
										}
										
						?>
				  </form>
					
				  <div class="login-help">
					<a href="#">FORGOT PASSWORD</a>
				  </div>
				</div>
			</div>
		  </div>
		  
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<a href="#" data-dismiss="modal"><h5>[CLOSE]</h5></a>
					<h1 class="tada animated infinite">SIGNUP</h1><br>
				    <form name="signup" method="post" action="./signup.php" target="_top">
						<input type="text" id="fname" name="fname" placeholder="First Name" required=""/>
						<br/><input type="text" id="mi" name="mi" placeholder="MI" maxlength="2" required=""/>
						<br/><input type="text" name="lname" placeholder="Last Name" id="lname" required=""/>
						<br/><input type="email" id="email" name="email" placeholder="Email" required=""/>
						<br/><input type="password" id="password" name="password" placeholder="New Password" required=""/>
						<br/><br/>Gender :
						<input id="m" type="radio" name="gender" value="F" required=""/>Female
						<input id="f" type="radio" name="gender" value="M" required=""/>Male
						<br/><br/>Birthday :
						<br/><input id="bday" type="date" name="birthday"/>
						<br/><input  class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" id="SIGNUP" type="submit" value="Sign Up"/>	
					</form>	
				  <div class="login-help">
					<a href="#">FORGOT PASSWORD</a>
				  </div>
				</div>
			</div>
		  </div>
		  
		  

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/mobirise/js/script.js"></script>

  
</body>
</html>