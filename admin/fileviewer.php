<?php
require_once './myconnection.php';

$query = "select * from images";
$result = $db_connection->query($query);
?>
<style>
td.eddiewaw {
	padding-right: 31px;
    text-align: -webkit-right;
}
table {
    margin-left: -43%;
    width: 105%;
}
</style>
<div id="container">
<table>
	<thead>
	<td class="eddiewaw">Image</td>
	<td>Description</td>
	</thead>
	<TBODY>
<?php 
while($data = $result->fetch_object())
{
$extension = $data->ext;
	if ($extension == "jpg" or $extension=="png" or $extension=="png" or $extension=="png" )
	{
?>
	
	<tr>
	<td class="eddiewaw"><?php echo '<img src="./',$data->image,'" style="width:10%;"/>'; ?></td>
    <td><?php echo '<h3>',$data->image,'</h3>'; ?></td>
	</tr>

<?php 
	}
	}


?>
	</TBODY>
</table>
</div>