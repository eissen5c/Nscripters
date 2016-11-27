<?php
			require_once './myconnection.php';
			if(isset($_POST['submit']))
			{
				$post = htmlspecialchars($_REQUEST['postt']);
				$email = $_SESSION['emaill'];
	
				$lname = $_SESSION['lastt'];
				$fname = $_SESSION['firstt'];
				$mi = $_SESSION['middlee'];
               
				//$profilepic = $_SESSION['profilee'];

                $query="INSERT INTO `bulletinboard` (`user_id`,`post`,`date`) VALUES ('{$userID}', '{$post}', NOW())";

				$result = $db_connection->query($query);
				}
			?>
<style>
textarea 
{
    resize: none;
	height:auto;
	overflow:auto;
	
}
#content
{
	border-style:solid;
	border-width:1px;
}

input.btn.btn-primary {
    border-radius: 18%;
    margin-top: 1%; 
}
img.img-responsive {
    width: 5%;
    position: fixed;
}
</style>

<script type="text/javascript" src="assets/css/jquery-1.9.1.js"></script>
 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
 <script type='text/javascript'>
 //<![CDATA[
	$(window).load(function(){
	$('#content').on( 'change keyup keydown paste cut', 'textarea', function (){
		$(this).height(0).height(this.scrollHeight);
	}).find( 'textarea' ).change();
	});
	//]]>*/ 

</script>
		<form method="post">
		 <img id="loading" src="./assets/fb.gif" class="media-object img-responsive"/>
	<div id="content" >
		<textarea name="postt"  class="form-control" placeholer="Message" required=""></textarea>
	</div>
		<style>
			#loading
			{
			display:none;
			}
		</style>
			<div class="text-right">
			<!--	<select disabled="disabled">
					<option>Normal</option>
					<option>Large</option>
					<option>Extra large</option>
				</select>
				<input class="btn btn-primary" type="submit" disabled="disabled" value="POST IMAGE"/>-->
			<input class="btn btn-primary" type="submit" name="submit" value="POST"/>
		</div>

			</form>

	
