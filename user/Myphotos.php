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
                   

		require_once '../myconnection.php';
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
		
		 if(isset($_POST['updateprofile'])  ) 
            {
                               $picID = $_POST['isSet'];
                              // echo "$picID" ;
                              $query = "UPDATE `ProfilePicture` INNER JOIN `userpanganiban` ON ProfilePicture.user_id = userpanganiban.user_id                                          SET `isSet`='F' WHERE ProfilePicture.user_id='$userID' AND email='$email' AND verified=1";
							 $result = $db_connection->query($query);
                                                
							 $query = "UPDATE `ProfilePicture` SET `isSet` = 'T' WHERE id='$picID'"; 
							 $result = $db_connection->query($query);
                             echo '<meta http-equiv="refresh" content="0;url=./Myprofile.php">'; 
                             
             }
        elseif(isset($_POST['uploadpicture']))
        {
          echo '<meta http-equiv="refresh" content="0;url=./myprofilepic.php">';	
        }
		elseif(isset($_POST['deletepicture']))
        {
		$_SESSION['isAllowed'] = "1";
			$picID = $_POST['isSet'];
			//echo '<meta http-equiv="refresh" content="0;url=./deletepicture.php?del=',$picID,'">';	
echo '<meta http-equiv="refresh" content="0;url=./deletephotos.php">';	        
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
  <title>My Photos</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/mobirise/css/style.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/home.css">
  <style>
  input#oldpassword , input#password ,input#repassword
  {
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
                        <span ><img class="media-object" src="./profilepic/<?php echo "$profile" ;?>" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></span>
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
					h1#SOONN 
					{
						text-align: -webkit-center;
					}
                   .imgsizee 
                        {
                            width: 22%;
                            height: 158px;
                            margin: 3px;
                            margin-bottom: 7%;
                            border-style: solid;
                            color: black;
                            border-width: 1px;
                    }
                        input[type="radio"] {
                       position: absolute;
                        margin-top: 21%;
                        margin-left: -14%;
                        width: 5%;
                        height: 7%;
                    }
					</style>
					<?php
						echo '<h1 id="SOONN">MY PHOTOS</h1>'; 
                        $query = "SELECT * FROM ProfilePicture where user_id='{$userID}'";
                        $result = $db_connection->query($query);
                       
                        ?>
                
                <div id="photoalbum">
                    <form method="POST" action="./Myphotos.php" >  
                    <?php
                           
                       while($data = $result->fetch_object())   
                       {
                           if($data->isSet == "T")
                           {
                            $isSett = "checked=\"checked\"";   
                           }
                           else
                           {
                            $isSett = "";   
                           }
						   ///////////////////////////////////
						   if($data->profilepic != "Profile.jpg")
						   {
						   ?>
					<img class="imgsizee" src="./profilepic/<?php echo $data->profilepic ; ?>" alt="1" />
                    <input type="radio" id="isSet" name="isSet" <?php echo $isSett ; ?>" value="<?php echo $data->id ; ?>"/>
						   <?php
						   }
                        ?>
						

                    
                    <?php } ?>
                                                                                                                         
                </div>
                                                                                                                  
                     <center>
					 <input style="margin-top:3%;" type="submit" name="uploadpicture" class="btn btn-success" value="Upload Picture"/>
					 <input style="margin-top:3%;" type="submit" name="updateprofile" class="btn btn-success" value="Update Profile"/>
					 <input style="margin-top:3%;" type="submit" name="deletepicture" class="btn btn-success" value="Delete Picture"/>
					 </center>                                                                                                     
                     
					 </form>                                                                                                                                              
                                                                                                                                        
                    <?php 
                        
                                                                                                                          
					}
                    
					else
					{
						session_unset();
						session_destroy();
						echo "<h1>Wrong Password.</h1><br/>";
						echo '<a href="."><h3>Back to login</h3></a>';
						
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

 
  <script src="../assets/web/assets/jquery/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="../assets/mobirise/js/script.js"></script>
  
  
</body>
</html>