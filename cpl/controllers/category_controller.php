<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\categories.php';

class CategoryController{
	private $db;
	private $cat_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->cat_model=new Categories();
	}

	public function get_category(){

		$result=$this->db->SelectAll(Categories::SELECTALL);

			return $result;
	}

	public function get_category_name(){
		$result=$this->db->SelectAll(Categories::SELECTNAME);

		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_one($id){
		$result=$this->db->SelectAll(Categories::SELECTCATEGORY,[$id]);
		
		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_updates($id){
		$result=$this->db->SelectAll(Categories::UPATES,[$id]);
		
		if ($result) {
			echo $result[0]['updates'];
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function check_update(){
		$old_values=$this->get_one($_POST['id']);
		$updates="";
		foreach($old_values as $oval){
			if($_POST['title']!=$oval['cat_name'])
				$updates .="name ";
			if($_POST['parent']!=$oval['parent'])
				$updates .=" ,parent";
			
		}
		if($updates !=""){
				$old_updates=json_decode($old_values[0]['updates']);
				$old_updates[]=array("date"=>date("y-m-d"),"by"=>"ibtehal fahd","affected_data"=>$updates);
				return json_encode($old_updates);
		}
		else
		 		return "no update";

	}

	public function add_category(){

			
		$result=$this->db->QueryCrud(Categories::ADDCATEGORY,[$_POST['title'],1,$_POST['parent']]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}

	public function edit_category(){
		$edit=$this->check_update();
		if($edit !="no update"){
		
		$this->db->QueryCrud(Categories::UPATES,[$edit,$_POST['id']]);

			$result=$this->db->QueryCrud(Categories::EDITCATEGORY,[$_POST['title'],$_POST['parent'],$_POST['id']]);
		
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

	public function delete_category(){
			
			$result=$this->db->QueryCrud(Categories::DELETECATEGORY,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	public function delete_multiple(){
		if($_POST['type']==4){
			$result=$this->db->QueryCrud(Categories::DELETEMULTIPLE,[$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>204));
			}
		}
	}
}

$category_controller=new CategoryController();

if(count($_POST)>0){
	if($_POST['type']==1){
		$result=$category_controller->get_category();
		if ($result) {

			echo json_encode($result);
		} 
		else {
			
			echo json_encode(array("statusCode"=>204));
		}
}
elseif($_POST['type']==2){
	$category_controller->add_category();
}
elseif($_POST['type']==3){
	$category_controller->edit_category();
}
elseif($_POST['type']==4){
	$category_controller->delete_category();

}
elseif($_POST['type']==5){
	$category_controller->get_updates($_POST['id']);
}
elseif($_POST['type']==6){
	$category_controller->delete_multiple();
}
}
?>
 
