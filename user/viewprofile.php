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
  <script type="text/javascript">
		function ajaxFunction(php_file,div_id){
		//alert(php_file+div_id);
		var xmlhttp;
		if (window.XMLHttpRequest){  xmlhttp=new XMLHttpRequest();                                }
		if (window.ActiveXObject)     {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4) { 
		 document.getElementById(div_id).innerHTML=xmlhttp.responseText;
			  }  else  {
		loading += ".";  document.getElementById(div_id).innerHTML=loading;}
				} //function onreadystatechange
		xmlhttp.open("GET",php_file,true);
		xmlhttp.send(null);
		}//function ajaxFunction
   </script>
 <?php

?> 
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
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="#"></a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="../home.php">HOME</a></li> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./Myprofile.php"><?php $firsttt = $_SESSION['firstt'] ;echo "$firsttt"; ?></a></li> </ul>                            
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
								  <Center><h3 class="panel-title">SELECT NAME</h3></center>
								</div>
								<div class="panel-body">
									<form name="viewprofile">
										  <center>
										<select name="lastname">
										<?php 
										$query = "SELECT * from userpanganiban WHERE verified=1";
										$result = $db_connection->query($query);
										while($data = $result->fetch_object())
										{
										?>
											<option value=<?php echo "$data->user_id"; ?>>
											<?php 
											$lastt = ucwords(strtoupper($data->lname));
											$firstt = ucwords(strtoupper($data->fname));
											$middlee =ucwords(strtoupper($data->mi));
											$middle22 = str_replace(".","",$middlee);
											echo "$lastt , $firstt $middle22" ;
											?>
											</option>
										<?php } ?>
										</select>
										<center>
											<input type="button" class="submit" value="View" onclick="ajaxFunction('viewprofile2.php?userid='+this.form.lastname.value,'output');return false;"/></center>
										</center>
									</form>
								</div>
								
							<div id="output">					
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