<?php
session_start();
error_reporting(0);

include_once("../webchat/Model.php");

class Controller{
  
  public $ModelObject;
  
  function __construct() {         
    $this->ModelObject  = new Model(); 
  } 
  
  public $UserId;
  public $UserName;
  public $MsgText;
  public $CreatedDt;
  public $Email;
  public $Password;
  
  function SetingInsertData($UserId,$UserName,$MsgText,$CreatedDt){
      
    $this->UserId       = $UserId;
    $this->UserName     = $UserName;
    $this->MsgText      = $MsgText;
    $this->CreatedDt    = $CreatedDt;
    
    $this->ModelObject->insertData($UserId,$UserName,$MsgText,$CreatedDt);

  }
  
  function GetLoginData($Email,$Password){
      
    $this->Email     = $Email;
    $this->Password  = $Password;
    
   $Str = $this->ModelObject->getLoginData($Email,$Password);
   
   return $Str;
   
  }
  
}  

$ContollerObj    = new Controller();

if(isset($_POST['submit']))
  {
    $UserId           = $_POST['UserId'];
    $UserName         = $_POST['UserName'];
    $MsgTxt           = $_POST['MsgText'];
    $CreatedDt        = date('Y-m-d H:i:s');

    $ContollerObj->SetingInsertData($UserId,$UserName,$MsgTxt,$CreatedDt);  
}

if(isset($_POST['login']))
  {
    $UserId          = $_POST['email'];
    $Password        = $_POST['password'];
    
    $ContollerObj->GetLoginData($UserId,$Password);  
}

?>
