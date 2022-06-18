<?php

class UserController
{
    private $tb_user = 'tb_users';
	public $user_id;
	public $user_password;
	public $user_name;
	public $user_surname; 
	public $user_email;
	public $user_phone_m;
	public $user_phone_d;
	public $user_phone_c;
	public $user_photo;
	public $user_create_at;
	public $user_update_at;


	private $conn;
	public function __construct($db){
        $this->conn = $db;
    }

	public function ListDataUsers(){
        $sql = "SELECT * FROM " .$this->tb_user. " ";
        if(!empty($_POST["search"]["value"])){
            $sql .= 'WHERE(id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sql .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
            $sql .= ' OR email LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sql .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sql .= 'ORDER BY id ASC ';
		}
		
		if($_POST["length"] != -1){
			$sql .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$displayRecords = $stmt->rowCount();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM " .$this->tb_user);
		$stmtTotal->execute();
		$allRecords = $stmtTotal->rowCount();

		$records = array();
		foreach($result as $record){
			$rows = array();
			$rows[] =	'<div class="d-flex px-2 py-1">
							<div><img src="../assets/img/'.$record['photo'].'" class="avatar avatar-sm me-3"></div>
							<div class="d-flex flex-column justify-content-center">
								<h6 class="mb-0 text-sm">'.$record['name'].' '.$record['surname'].'</h6>
								<p class="text-xs text-secondary mb-0">'.$record['email'].'</p>
							</div>
						</div>';
			$rows[] = 	'<p class="text-xs font-weight-bold mb-0">'.$record['phone_m'].'</p>
						<p class="text-xs text-secondary mb-0">Ext. ' .$record['phone_d']." , ".$record['phone_c'].'</p>';
			$rows[] =   '<div class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Online</span>
                        </div>';
			$rows[] =   '<div class="align-middle text-center">
                            <a href="javascript:void(0)" title="Edit" name="update" user_id ="'.$record["id"].'" class="text-center text-primary me-2 update"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0)" title="Delete" name="delete" user_id ="'.$record["id"].'" user_photo="'.$record["photo"].'" class="ml-3 text-danger delete"><i class="fas fa-trash"></i></a>
                        </div>';
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}

}
