<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\messages_model.php';

class MessageController{
	private $db;
	private $cat_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->cat_model=new Messages();
	}

	public function get_message(){
		$result=$this->db->SelectAll(Messages::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}
	public function get_message_FE(){
		$result=$this->db->SelectAll(Messages::SELECTALL);

		if ($result) {
			return $result;
		} 
		else {
			echo 0;
		}
	}

	public function get_pending_message(){
		$result=$this->db->SelectAll(Messages::SELECTPENDING);

		if ($result) {
			return $result;
		} 
		else {
			return 0;
		}
	}

	public function get_one($id){
		$result=$this->db->SelectAll(Messages::SELECTMESSAGE,[$id]);
		
		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}



	public function add_message(){
		$name=$_POST['fname'].$_POST['lname'];	
		$current_timestamp = time();
		$result=$this->db->QueryCrud(Messages::ADDMESSAGE,[$name,$_POST['email'],$_POST['message'],$current_timestamp]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}



	public function delete_message(){
			
			$result=$this->db->QueryCrud(Messages::DELETEMESSAGE,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	public function delete_multiple(){
		if($_POST['type']==4){
			$result=$this->db->QueryCrud(Messages::DELETEMULTIPLE,[$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>204));
			}
		}
	}
}

$message_controller=new MessageController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$message_controller->get_message();
}
elseif($_POST['type']==2){
	$message_controller->add_message();
}

elseif($_POST['type']==4){
	$message_controller->delete_message();

}

elseif($_POST['type']==6){
	$message_controller->delete_multiple();
}
}
?>
 
