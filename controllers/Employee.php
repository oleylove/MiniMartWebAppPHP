<?php

class Employee
{
    private $tb_employees = 'tb_employees';
	public $emp_id;
	public $password;
	public $name;
	public $surname; 
	public $email;
	public $age;
	public $gender;
	public $status;
	public $phone;
	public $photo;
	public $create_at;
	public $update_at;

	private $tb_positions = 'tb_positions';
	public $pos_id;
	public $pos_name;

	private $conn;
	public function __construct($db){
        $this->conn = $db;
    }

	public function ListDataEmployees(){
        $sql = "SELECT * FROM " .$this->tb_employees. " 
		LEFT JOIN ".$this->tb_positions." 
		ON ".$this->tb_employees.".pos_id = ".$this->tb_positions.".pos_id ";

        if(!empty($_POST["search"]["value"])){
            $sql .= 'WHERE(emp_id LIKE "%'.$_POST["search"]["value"].'%" ';
            $sql .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
            $sql .= ' OR email LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sql .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sql .= 'ORDER BY emp_id ASC ';
		}
		
		if($_POST["length"] != -1){
			$sql .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$displayRecords = $stmt->rowCount();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM " .$this->tb_employees);
		$stmtTotal->execute();
		$allRecords = $stmtTotal->rowCount();
		
		$path = "../images/users/";
		$records = array();
		foreach($result as $record){
			
			$filename = (file_exists($path .$record["photo"])) ? $path .$record["photo"] : $path ."user.png" ;
			$status = ($record["status"] == "Active") ? "bg-gradient-success" : "bg-gradient-danger";

			$rows = array();
			$rows[] =	'<div class="d-flex px-2 py-1">
							<div><img src="'.$filename.'" class="avatar avatar-sm me-2"></div>
							<div class="d-flex flex-column justify-content-center">
								<h6 class="mb-0 text-sm">'.$record["name"].' '.$record["surname"].'</h6>
								<p class="text-xs text-secondary mb-0">'.$record['email'].'</p>
							</div>
						</div>';
			$rows[] = 	'<div class="me-5">
							<p class="text-xs font-weight-bold mb-0">'.$record["pos_name"].'</p>
							<p class="text-xs text-secondary mb-0">Ext. ' .$record["phone"].'</p>
						</div>';
			$rows[] =	'<div class="align-middle text-center text-sm">
                            <span class="badge badge-sm '.$status.' ">'.$record["status"].'</span>
                        </div>';
			$rows[] =   '<div class="align-middle text-center">
							<span class="text-secondary text-xs font-weight-bold">'.$record["create_at"].'</span>
						</div>';
			$rows[] =   '<div class="align-middle text-center">
                            <a href="javascript:void(0)" title="Edit" name="update" emp_id ="'.$record["emp_id"].'" class="text-center text-primary me-2 update">
								<i class="fas fa-edit"></i>
							</a>
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
