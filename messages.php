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

?>
<?php 

		require_once './myconnection.php';
		$email =$_SESSION['emaill'];
		$password =md5($_SESSION['passwordd']);
		$query = "select * from userpanganiban where email='$email' AND verified=1";
		$result = $db_connection->query($query);
		
		
		if ($data = $result->fetch_object())
				{
					if ($data->password == $password)
					{ 
						$last = ucwords(strtoupper($data->lname));
						$first = ucwords(strtoupper($data->fname));
						$middle =ucwords(strtoupper($data->mi));
						$middle2 = str_replace(".","",$middle);
						
						if($profilepic = $data->profilepic)
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
  <title>Change Password</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/home.css">
  <style>
  input#oldpassword , input#password ,input#repassword{
    border-color: black;
    border-width: 0.5px;
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
                        <span class="mbr-brand__logo"><img src="./user/profilepic/<?php echo "$profile" ;?>" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></span>
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
							
					}
					else
					{
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