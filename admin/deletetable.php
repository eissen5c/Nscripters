<?php
	require_once '.././myconnection.php';
	$query="CREATE TABLE `bulletinboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `post` longtext,
  `date` date DEFAULT NULL,
  `lname` text,
  `fname` text,
  `mi` text,
  `profilepic` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1";
	
	if($result = $db_connection->query($query))
	{
	echo "SUCCESS";
	echo "<a href=\"./table.php\">Back</a>";
	}
	else
	{
	echo "GG";
	}