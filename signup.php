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
input#CONFIRM {
    //margin-left: 38%;
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
					if((isset($_REQUEST['email'])))
{
echo '<center><h1>Registration</h1></center>';
	$connection="myconnection.php"; 
	$usertable="userpanganiban"; 
	require_once "./$connection";
	$email =$_REQUEST['email'];
	if (empty($_REQUEST['password']))
	{
		$query="SELECT * FROM $usertable where email='$email' and verified=0";
		$result = $db_connection->query($query);
		if($data = $result->fetch_object())
		{
			$passwordd = $data->password;
			$fname =$data->fname;
			$lname =$data->lname;
			$gender =$data->gender;
			$birthday =$data->birthday;
			$mi =$data->mi;
		}
	}
	else
	{
	$passwordd = $_REQUEST['password'];
	$fname =$_REQUEST['fname'];
	$lname =$_REQUEST['lname'];
	$gender =$_REQUEST['gender'];
	$birthday =$_REQUEST['birthday'];
	$mi =$_REQUEST['mi'];
	}
}
else
{
	echo "<center><h1>Information Not Found.</h1></center><br/>";
	echo '<center><a href="."><h3>Back to login</h3></a></center>';
	exit;
}



$query="SELECT * FROM $usertable where email='$email' and verified='1'";

$result = $db_connection->query($query);

if($data = $result->fetch_object())
{
	if ($data->email == $email && $data->verified == 1) 
	{
		echo "<br><center> Sorry. The email <tt>$email</tt> is already taken.</center>";
		echo "<br><center>Please try another email.</center>";
		echo '<center><a href="."><h3>Back</h3></a></center>';
		exit;
	}
}

$query="SELECT * FROM $usertable where verified=0";

$result = $db_connection->query($query);
if($data = $result->fetch_object())
{
	$query="DELETE FROM $usertable where verified=0";
	$result = $db_connection->query($query);
}

$fname=ucwords(strtoUPPER($fname));
$lname=ucwords(strtoUPPER($lname));
$mi=ucwords(strtoupper($mi));
$code=rand(1,100000);


$query="INSERT INTO $usertable (email, fname,mi,lname,password,date,gender,verified,code,birthday) 
VALUES ('$email','$fname','$mi','$lname','$passwordd',NOW(),'$gender',0,'$code','$birthday')";

$result = $db_connection->query($query);

$lastid=$db_connection->insert_id;




if ($db_connection->errno) 
{
	die('Query error: ' . $db_connection->error);
}


#send email
$to=$email;

$firstName="Eissen Jule";
$lastName="Panganiban";
$youremail="eissenjulepanganiban@gmail.com";
$subject = 'VERIFICATION CODE-PLEASE DO NOT REPLY';
$message = "\n\n\n\n\n\nNScripters Verification Code:\n\n\n\n";
$message .= "<br/><br/><br/>Activation Code : $code<br/><br/><br/>";
$message .= " Activation Link : http://panganiban.icacmu.website/webapp/signupconfirmation.php?email=$email&&lastid=$lastid&&code=$code <br/>";
$message .= "\n\n\n\n\n\n Enjoy \n\n\n\n";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'To:<'.$to.'>'."\r\n";
$headers .="From: noreply@icacmu.website" . "\r\n";

$sendd = mail($to, $subject, $message, $headers);
if($sendd)
{
?>

	<center><h2>Please confirm your registration.</h2></center>
	<?php echo "<center><h2>A code was sent to your email: <h3 id=\"myemail\">$email</h3></h2></center>" ;?>
	<form name="verify" method="post" action="signupconfirmation.php" >
	<?php 
	
	echo "<input type=\"hidden\" name=\"email\" value=\"$email\">";
	echo "<input type=\"hidden\" name=\"lastid\" value=\"$lastid\">";
	echo '<br/><p class="mbr-hero__subtext"> If you don\'t see the email, Just wait at least 5 to 10 Minutes to arrive the mail.</p>';
	echo "<center><input type=\"num\" name=\"code\" ></center>";
	echo "<center><input class=\"mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-primary text-center\" type=\"submit\" id=\"CONFIRM\" name=\"CONFIRM\" value=\"CONFIRM\" onclick=\"return verifycode()\"></center>";
	
}
else
{
	echo "die";
	exit;
}


					?>
                </div></div>
            </div></div>
        </div>
        
    </div>
</section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/mobirise/js/script.js"></script>

  
</body>
</html>

