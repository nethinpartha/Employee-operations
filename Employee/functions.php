<?php


class Models {
	public function __construct($db) {
        $this->conn = $db;
    }
	public function create($name,$email,$address,$phone,$type,$id){
		$message = "";
		if($type == "insert"){
			$sql = sprintf("INSERT into employee (emp_name,emp_email,emp_phone,emp_address) VALUES ('%s', '%s', '%s','%s')",$name,$email,$address,$phone);
			$message = "Employee Added Successfully";
		}else{
			$sql = sprintf("UPDATE employee set emp_name='%s',emp_email='%s',emp_phone='%s',emp_address='%s' WHERE emp_id = '%s' ",$name,$email,$address,$phone,$id);
			$message = "Employee Updated Successfully";
		}
		if(mysqli_query($this->conn, $sql)){
			return ['success' => true , "message" => $message];
		}else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
		}
	}
	public function deleteEmployee($employee_id){
		if (is_array($employee_id)) {
			$employee_id = implode(',', array_map('intval', $employee_id));
		} else {
			$employee_id = intval($employee_id);
		}
		$sql = sprintf("UPDATE employee set status = 'N' WHERE emp_id IN (".$employee_id.")" );
		if(mysqli_query($this->conn, $sql)){
			return ['success' => true , "message" => "Deleted Successfully"];
		}
	}
	 public function getTotalEmployeeCount() {
        $sql = sprintf("SELECT COUNT(*) as count FROM employee WHERE status = 'Y'");
        $result = mysqli_query($this->conn, $sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }
	public function listAll($id,$offset,$limit){
		$cond="";
		$limit_cond = "";
		$total_pages = $total_records = 0;
		if($id != ""){
			$cond=" AND emp_id = '".$id."'";
		}
		if($limit != 0){
			$limit_cond = " LIMIT ".$offset." , ".$limit." ";
		}
		$sql = sprintf("select * from employee WHERE status = 'Y' ".$cond . $limit_cond );
		$result = mysqli_query($this->conn, $sql);
		$res = [];
		while($data = $result->fetch_assoc()) {
			  $row=[];
			  $row["name"] = $data["emp_name"] ;
			  $row["email"] = $data["emp_email"] ;
			  $row["phone"] = $data["emp_phone"] ;
			  $row["address"] = $data["emp_address"] ;
			  $row["id"] = $data["emp_id"] ;
			  $res[] = $row;
		  }
		  if( $limit != 0){
			$total_records = $this->getTotalEmployeeCount();
			$total_pages = ceil($total_records / $limit);
		  }
        $response = [
            'data' => $res,
            'total_pages' => $total_pages,
            'current_page' => $offset,
			'total_entries' => $total_records
        ];
		return $response;
	}
	
}



?>