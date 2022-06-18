<?php
include('../config/Connection.php');
include('../controllers/UserController.php');

$database = new ConnectDatabase();
$db = $database->GetConnection();

$record = new UserController($db);


if(!empty($_POST['ActionListUsers']) && $_POST['ActionListUsers'] == 'ListDataUsers') {
	$record->ListDataUsers();
}










if(!empty($_POST['ActionGetAdmin']) && $_POST['ActionGetAdmin'] == 'GetDataAdmin') {
	$record->admin_id = $_POST['admin_id'];
	$record->GetDataAdmin();
}

// ADD NEW DATA ADMIN
if(!empty($_POST['ActionAddAdmin']) && $_POST['ActionAddAdmin'] == 'AddDataAdmin') {
	$admin_id = $_POST['addadmin_id'];
	$admin_img_new = $admin_id.'-image';
	$path = '../../images/admins/';

	// UPLOAD NEW IMAGE ADMIN
	if($_FILES["addadmin_img"]["name"] != "") {
		$name = $_FILES['addadmin_img']['name']; 
		$tmp = $_FILES['addadmin_img']["tmp_name"];
		$oldname = explode(".",$name);
		$ext = "";
		$ext = ".".$oldname[count($oldname)-1];
		$addadmin_img = $admin_img_new.$ext;
		if(move_uploaded_file($tmp,$path.$addadmin_img)){
			$addadmin_img = $admin_img_new.$ext;
		} else {
			$addadmin_img = 'image-not-found.png';
		}
	}else {
		$addadmin_img = 'image-not-found.png';
	}
	$record->admin_id = $_POST['addadmin_id'];
	$record->admin_password = md5('123456');
	$record->admin_name = $_POST['addadmin_name'];
	$record->admin_email = $_POST['addadmin_email'];
	$record->admin_phone = $_POST['addadmin_phone'];
	$record->admin_line = $_POST['addadmin_line'];
	$record->admin_facebook = $_POST['addadmin_facebook'];
	$record->admin_post =$_POST['addadmin_post'];
	$record->admin_create = date('Y-m-d');
	$record->admin_update = date('Y-m-d');
	$record->admin_img = $addadmin_img;
	$record->AddDataAdmin();

}

// UPDATE DATA ADMIN
if(!empty($_POST['ActionUpdateAdmin']) && $_POST['ActionUpdateAdmin'] == 'UpdateDataAdmin') {
	$password_new = $_POST['updateadmin_password_new'];
	$password_old = $_POST['updateadmin_password_old'];
	
	$record->admin_id = $_POST['updateadmin_id'];
	$record->admin_name = $_POST['updateadmin_name'];
	$record->admin_email = $_POST['updateadmin_email'];
	$record->admin_phone = $_POST['updateadmin_phone'];
	$record->admin_line = $_POST['updateadmin_line'];
	$record->admin_facebook = $_POST['updateadmin_facebook'];
	$record->admin_post = $_POST['updateadmin_post'];
	if($password_new == $password_old){
		$record->admin_password = $password_old;
	}else {
		$record->admin_password = md5($password_new);
	}
	$record->admin_update = date('Y-m-d');
	$record->UpdateDataAdmin();
}

// UPDATE IMAGE DATA ADMIN
if(!empty($_POST['ActionUpdateAdmin']) && $_POST['ActionUpdateAdmin'] == 'UpdateImageAdmin') {
	$admin_id = $_POST['imgadmin_id'];
	$admin_img_new = $admin_id.'-image';
	$path = '../../images/admins/';
	if($_FILES["updateadmin_img"]["name"] != "") {
		$name = $_FILES['updateadmin_img']['name'];
		$tmp = $_FILES['updateadmin_img']["tmp_name"];
		$oldname = explode(".",$name);
		$ext = "";
		$ext = ".".$oldname[count($oldname)-1];
		$admin_img = $admin_img_new.$ext;
		if(move_uploaded_file($tmp,$path.$admin_img)){
			$record->admin_id = $admin_id;
			$record->admin_img = $admin_img;
			$record->admin_update = date('Y-m-d');
			$record->UpdateImageAdmin();				
		}
	}
}


// DELETE DATA ADMIN AND DELETE IMAGE FILE
if(!empty($_POST['ActionDeleteAdmin']) && $_POST['ActionDeleteAdmin'] == 'DeleteDataAdmin') {
	$path = '../../images/admins/';
	$admin_img = $_POST['admin_img'];
	$targetLink = $path.$admin_img;
	if($admin_img != '' ){
		if(file_exists($targetLink)){
			unlink($targetLink);
		}
	}
	$record->admin_id = $_POST['admin_id'];
	$record->DeleteDataAdmin();

	}

?>