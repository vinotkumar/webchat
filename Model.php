<?php
session_start();
error_reporting(0);

class Model{
	
	private $servername = "localhost";
	private $username   = "webuser";
	private $password   = "webuser";
	private $database   = "db_chat";
	public  $con;
	
	public function __construct(){

		$this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		
		if(mysqli_connect_error()) {
		 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		}
		else{
			return $this->con;
		}
	}
	
	public function insertData($UserId,$UserName,$MsgText,$CreatedDt) {
		
		$query="INSERT INTO chats(user_id,username,msg_text,created_dt) VALUES('$UserId','$UserName','$MsgText','$CreatedDt')";
		
		$sql = $this->con->query($query);
		
		if ($sql!=true) {
		 echo "OPPS SomeThing Went Wrong!";
		}
   
  }
  
  public function getLoginData($Email,$Password){    
    $result = mysqli_query($this->con, "select * from tbluser where  Email='$Email' && Password='$Password' ");
   
    $ret      = mysqli_fetch_array($result);    
    
    if($ret>0){
      
      $_SESSION['user_id']    = $ret['ID'];	  
      $_SESSION['username']   = $ret['FullName'];	  
     
    }
    else{
    $msg="Invalid Details.";   

    }
    
    return $ret;
    echo $ret;
  }
  
  public function getChatData(){
    $result = mysqli_query($this->con, 'select * from chats');
    return $result;
    
  }
}

?>