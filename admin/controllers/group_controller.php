<?php
require  dirname(__FILE__,2).'\models\site_db.php';
require  dirname(__FILE__,2).'\models\group_model.php';
class groupController{
	private $db;
	private $cat_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->cat_model=new Groups();
	}

	public function get_group(){
		$result=$this->db->SelectAll(Groups::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	
	public function get_privs(){
		$result=$this->db->SelectAll(Groups::SELECTPRIV);

		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_one($id){
		$result=$this->db->SelectAll(Groups::SELECTGROUP,[$id]);
		
		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_updates($id){
		$result=$this->db->SelectAll(Groups::UPATES,[$id]);
		
		if ($result) {
			echo $result[0]['updates'];
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function check_update(){
		$old_values=$this->get_one($_POST['id']);
		// print_r($old_values);
		$updates="";
		foreach($old_values as $oval){
			if($_POST['name']!=$oval['group_name'])
				$updates .="name ";
			if(json_encode($_POST['privllages_id'])!=$oval['privllages_id'])
				$updates .="   privllages";
			
		}
		// echo $updates;
		if($updates !=""){
				$old_updates=json_decode($old_values[0]['updates']);
				$old_updates[]=array("date"=>date("y-m-d"),"by"=>"ibtehal fahd","affected_data"=>$updates);
				return json_encode($old_updates);
		}
		else
		 		return "no update";

	}

	public function add_group(){

		// print_r($_POST);
		$current_timestamp = time();
		$result=$this->db->QueryCrud(Groups::ADDGROUP,[$_POST['name'],2, json_encode($_POST['privllages_id']),$current_timestamp]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}

	public function edit_group(){
		$edit=$this->check_update();
		if($edit !="no update"){
		
		$this->db->QueryCrud(Groups::UPATES,[$edit,$_POST['id']]);

			$result=$this->db->QueryCrud(Groups::EDITGROUP,[$_POST['name'],json_encode($_POST['privllages_id']),$_POST['id']]);
		
		if ($result) {
				
				echo json_encode(array("statusCode"=>200,"message"=>"Post updated successfully"));
			} 
		else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
		}
		else
			echo json_encode(array("statusCode"=>200,"message"=>"Post updated successfully"));			

	}

	public function delete_group(){
			
			$result=$this->db->QueryCrud(Groups::DELETEGROUP,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	public function delete_multiple(){
		if($_POST['type']==4){
			$result=$this->db->QueryCrud(Groups::DELETEMULTIPLE,[$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>204));
			}
		}
	}
}

$group__controller=new groupController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$group__controller->get_group();
}
elseif($_POST['type']==2){
	$group__controller->add_group();
}
elseif($_POST['type']==3){
	$group__controller->edit_group();
}
elseif($_POST['type']==4){
	$group__controller->delete_group();

}
elseif($_POST['type']==5){
	$group__controller->get_updates($_POST['id']);
}
elseif($_POST['type']==6){
	$group__controller->delete_multiple();
}
}
?>
 
