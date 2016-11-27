<?php

@$db_connection = new mysqli('localhost', 'root','','icacmuwe_dbpanganiban');

if ($db_connection->connect_errno) {
	die('Connection Error: ' . $db_connection->connect_error);
}
?>