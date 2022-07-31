<?php
class Config{
    private $DBHOST='localhost';
	private $DBUSER='root';
	private $DBPASS='';
	private $DBNAME='leafnow';
	public $conn;
    public function __construct(){
		$this->conn = mysqli_connect($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);
		if(!$this->conn){
			return false;
		}
    } 
    public function htmlvalidation($form_data){
        return $form_data;
    }     
    public function insert($tblname, $filed_data){
        $query_data = "";
        foreach ($filed_data as $q_key => $q_value) {
            $query_data = $query_data."$q_key='$q_value',";
        }
        $query_data = rtrim($query_data,",");
        $query = "INSERT INTO $tblname SET $query_data";
        $insert_fire = mysqli_query($this->conn, $query);
        if($insert_fire){
            return $insert_fire;
        }
        else{
            return false;
        }
    }
}
?>