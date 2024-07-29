<?php

header('Content-Type: application/json');
require_once "config/config.php";
require_once "functions.php";

class userAPI{
	private $db;
	private $user;
	private $model;
	public function __construct(){
		$database = new Database();
		$this->db = $database->getconnection();
		$this->model = new Models($this->db);	
	}
	public function response($code,$msg){
		 http_response_code($code);
		 echo json_encode(['message' => $msg]);
         return;
	}
	public function processRequest(){
			$method = $_SERVER['REQUEST_METHOD'];
			$data = json_decode(file_get_contents('php://input'),true);
			switch ($method){
				case 'POST':
					$this->EmployeeAdd($data);
					break;
				case 'GET':
					$this->EmployeeList();
					break;
				case 'DELETE':
					$this->EmployeeDelete($data);
					break;
				//default:
				//	http_response_code(405);
				//	echo json_encode(['message' => 'Method not allowed']);
			}
	}
	private function EmployeeAdd($data){
		$name = $email = $address = $phone = $type = $id="";
		if(!empty($data['name'])){
			$name = $data['name'];
		}
		if(!empty($data['email'])){
			 $email = $data['email'];
		}	
		if(!empty($data['address'])){
			$address = $data['address'];
		}	
		if(!empty($data['phone'])){
			 $phone = $data['phone'];
		}
		if(!empty($data['mode'])){
			 $type = $data['mode'];
		}
		if(!empty($data['id'])){
			 $id = $data['id'];
		}
		$response = $this->model->create($name,$email,$address,$phone,$type,$id);
		//print_r($response);exit;
		if ($response['success']) {
			$this->response(200,$response['message']); 
		 }
	}
	private function EmployeeDelete($data){
		
		if (isset($data['id'])) {
			 $id = $data['id'];
			 $response = $this->model->deleteEmployee($id);
			 if ($response['success']) {
				$this->response(200,$response['message']); 
			}
		}
		
	}
	private function EmployeeList(){
		$id="";
		$offset = $records_per_page = 0;
		if(!empty($_GET['id'])){
			 $id = $_GET['id'];
		}
		if(!empty($_GET['page']) && !empty($_GET['records_per_page'])){
			$page = $_GET['page'] ?? 1;
			$records_per_page = $_GET['records_per_page'] ?? 10;
			$offset = ($page - 1) * $records_per_page;
		}
		$response = $this->model->listAll($id,$offset,$records_per_page);
		echo json_encode($response);
		
	}
		
}

$api = new userAPI();
$api->processRequest();
?>