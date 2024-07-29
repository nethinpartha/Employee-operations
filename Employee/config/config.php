<?php


class Database{
    private $host = "127.0.0.1";
    private $db_name = "sample_project";
    private $username = "root";
    private $password = "";
    public $conn;
	public function getconnection(){
		$this->conn = null;
		try{
			$this->conn = new mysqli($this->host,$this->username,$this->password,$this->db_name);
		    if ($this->conn->connect_error) {
                throw new Exception('Connection error: ' . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo json_encode(['message' => 'Connection error: ' . $e->getMessage()]);
            exit();
        }
		return $this->conn;
	}
}
?>