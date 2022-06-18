<?php
include('../config/Connection.php');
include('../controllers/Employee.php');

$database = new ConnectDatabase();
$db = $database->GetConnection();

$record = new Employee($db);


if(!empty($_POST['ListDataEmployees']) && $_POST['ListDataEmployees'] == 'ListDataEmployees') {
	$record->ListDataEmployees();
}

?>