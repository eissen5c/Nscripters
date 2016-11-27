<!DOCTYPE html>
<html>
	<head>
		<title>List of Registered</title>
		<style>
/*		td
		{
			border-style: solid;
			padding: 18px;
			border-width: 1px;
			font-size: 68%;
		}
		#listtt
		{
			margin: 1%;
			border-style: solid;
			border-width: 1px;
			padding: 9px;
			padding-top: 11px;
			width: 98.5%;
			margin-left: 0%;
		}*/
		</style>
	</head>
	<body>

	<?php 
		require_once '.././myconnection.php';
		
		//$query= "DELETE FROM userpanganiban";
		//$result = $db_connection->query($query);
		
		
		$query = "select * from userpanganiban ";//where verified=1";
		$result = $db_connection->query($query);
		if ($db_connection->errno) 
		{
		die('Query error: ' . $db_connection->error);
		}


		
	
	?>
	
	<div id="listtt">
	<table>
	<center><h3>List of Users</h3></center>
	<tr class="roww">
		<td>ID</td>
		<td>EMAIL</td>
		<td>FIRST NAME</td>
		<td>MIDDLE INITIAL</td>
		<td>LAST NAME</td>
		<td>PASSWORD</td>
		<td>DATE</td>
		<td>GENDER</td>
		<td>VERIFIED</td>
		<td>CODE</td>
		<td>BIRTHDAY</td>
		<td>OPTION</td>
		</tr>
	<?php while ($data = $result->fetch_object()) { ?>
		<tr class="roww">
		<td><?php echo "<a href=\"./edit.php?id=$data->id\">",$data->id,'</a>' ; ?></td>
		<td><?php echo $data->email ; ?></td>
		<td><?php echo $data->fname ; ?></td>
		<td><?php echo $data->mi ; ?></td>
		<td><?php echo $data->lname ; ?></td>
		<td><?php echo $data->password ; ?></td>
		<td><?php echo $data->date ; ?></td>
		<td><?php echo $data->gender ; ?></td>
		<td><?php echo $data->verified ; ?></td>
		<td><?php echo $data->code ; ?></td>
		<td><?php echo $data->birthday ; ?></td>
		</tr>
	

	<?php } ?>
	</table>
	</div>
	</body>
</html>