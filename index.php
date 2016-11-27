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

if(isset($_POST['LOGIN']))
{
	$_SESSION['emaill'] = $_POST['email'];
	$_SESSION['passwordd'] = $_POST['password'];
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
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#" data-toggle="modal" data-target="#signup-modal">SIGNUP</a></li> </ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="#"data-toggle="modal" data-target="#login-modal">LOGIN</a></li></ul>
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
                    <div class="mbr-hero animated fadeInUp">
                        <h1 class="mbr-hero__text">NSCRIPTERS</h1>
                        <p class="mbr-hero__subtext">Everything I copied is here..<br><br>Have an account already?</p>
						<a href="./forgotpassword.php">FORGOT PASSWORD</a>
                    </div>
                    <div class="mbr-buttons btn-inverse mbr-buttons--left"><a class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" href="#" data-toggle="modal" data-target="#login-modal">LOGIN</a> <a class="mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary" href="#" data-toggle="modal" data-target="#signup-modal">SIGNUP</a></div>
					
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
					
				  </form>
					
				  <div class="login-help">
					<a href="./forgotpassword.php">FORGOT PASSWORD</a>
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
					<a href="./forgotpassword.php">FORGOT PASSWORD</a>
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