<?php
include('../config/Connection.php');

// $database = new ConnectDatabase();
// $db = $database->GetConnection();

$record = new ConnectDatabase();


if(!empty($_POST['GetConnect']) && $_POST['GetConnect'] == 'CreateDatabase') {
	$record->CreateDatabase();
}
?>