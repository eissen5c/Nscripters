<?php

require_once('./myconnection.php');

 /*$query = "SELECT * FROM chat "; 
  $result = $db_connection->query($query);
 $maxx = $result->num_rows;
$minn = $maxx - 14;
 if( $minn < 14 )
 {
 $maxx = 14;
$minn = 0;
}*/


//$query = "SELECT * FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ASC LIMIT $minn,$maxx"; 
$query = "SELECT * FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ";  
 $result = $db_connection->query($query);   

 while($data = $result->fetch_object())
{

?>
<span id="chatname"><?php echo "$data->fname: ";?></span>
<span id="chatpost"><?php echo "$data->post";?></span>
</br>
<?php
}

  
 ?>