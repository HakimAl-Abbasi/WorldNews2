<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\comments_models.php';

class CommentController{
	private $db;
	private $break_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->break_model=new Comments();
	}
	
	public function get_Comments(){
		$result=$this->db->SelectAll(Comments::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_last_Comments(){
		$result=$this->db->SelectAll(Comments::SELECTALL);

		if ($result) {
			return $result;
		} 
		else {
			return 0;
		}
	}

	public function get_Post_Comments($post_id){
		$result=$this->db->SelectAll(Comments::SELECTCOMMPOST,[$post_id]);

		if ($result) {
			return $result;
		} 
		
	}
	public function get_Comment(){
		$result=$this->db->SelectAll(Comments::SELECTCOMMENT);
		
		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		} 
	}
	public function get_Comment_Number($post){
		$result=$this->db->SelectAll(Comments::SELECTCOMMENTNUM,[$post]);
		
		if ($result) {
			return $result;
		} 
	
	}
	public function get_pending_Comments(){
		$result=$this->db->SelectAll(Comments::SELECTPENDINGCOMMENT);

		if ($result) {
			return $result;
		} 
		
	}


	public function add_Comments(){

		$current_timestamp = time();
		$result=$this->db->QueryCrud(Comments::ADDCOMMENT,[$_POST['comment'],$_POST['userId'],$_POST['postId'],$current_timestamp]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"Your comment added successfully ,plaes wait for approvment"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}


	public function delete_Comments(){
			
			$result=$this->db->QueryCrud(Comments::DELETECOMMENT,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	
}

$Comments_controller=new CommentController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$Comments_controller->get_Comments();
}
elseif($_POST['type']==2){
	$Comments_controller->add_Comments();
}
elseif($_POST['type']==3){
	$Comments_controller->delete_Comments();
}
elseif($_POST['type']==4){
	$Comments_controller->get_Comment();
}elseif($_POST['type']==5){
	$Comments_controller->get_Comment_Number();
}
}
?>
 
<?php

?>