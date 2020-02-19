<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\posts.php';

class PostController{

	private $db;
	private $post_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->post_model=new Posts();
	}
	public function get_post(){
		$result=$this->db->SelectAll(Posts::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}
	public function get_FE_post($cat){
		$result=$this->db->SelectAll(Posts::SELECTALLFE,[$cat]);

		if ($result) {
		return $result;
		} 
		
	}
	public function get_ranking_post(){
		$result=$this->db->SelectAll(Posts::RankingPOST);

		if ($result) {
		return $result;
		} 
		else
		return array();
		
	}
	public function get_last_post(){
		$result=$this->db->SelectAll(Posts::SELECTLastFE);

		if ($result) {
		return $result;
		} 
		
	}
	public function get_visit($pid)
	{
		$result=$this->db->SelectAll(Posts::SELECTVISIT,[$pid]);

		if ($result) {
		return $result;
		} 
	}
	public  function update_visit($pid)
	{
		$cur_vis=$this->get_visit($pid);
		// print_r($cur_vis);
		$result=$this->db->SelectAll(Posts::UPDATEVISIT,[$cur_vis[0]['visits']+1,$pid]);
	}

	public function get_categories(){
		$result=$this->db->SelectAll(Posts::SELECTCATEGORIES);

		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_one($id){
		$result=$this->db->SelectAll(Posts::SELECTPOST,[$id]);
		
		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}
	public function get_updates($id){
		$result=$this->db->SelectAll(Posts::GETUPATES,[$id]);
		
		if ($result) {
			echo $result[0]['updates'];
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}
	public function check_update(){
		$old_values=$this->get_one($_POST['id']);
		$updates='';
		foreach($old_values as $oval){
			if($_POST['title']!=$oval['Post_Title'])
				$updates.="title ";
			if($_POST['cat']!=$oval['cat_id'])
				$updates.="update_date ";
			if($_POST['intro']!=$oval['Post_Intro'])
				$updates.="introduction ";
			if($_POST['content']!=$oval['Post_Content'])
				$updates.="content ";
			if($_POST['img']!=$oval['Post_img'])
				$updates.="image ";
			if($_POST['publish']!=$oval['Publish_Date'])
				$updates.="Publish_Date";
		}

			
		if($updates !=""){
			$old_updates=json_decode($old_values[0]['updates']);
			$old_updates[]=array("date"=>date("y-m-d"),"by"=>"hakim alabbasi ","affected_data"=>$updates);
			// print_r(($old_updates));
			return json_encode($old_updates);
			}
		else
			 return "no update";
	}
	public function add_post(){

			
		$result=$this->db->QueryCrud(Posts::ADDPOST,[$_POST['title'],$_POST['intro'],$_POST['content'],$_POST['img'],$_POST['cat'],$_POST['publish']]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}

	public function edit_post(){
		// print_r($_POST);
		
		$edit=$this->check_update();
		
		if($edit !="no update"){
		if($_POST['img']=="no image")
			$result=$this->db->QueryCrud(Posts::EDITPOST,[$_POST['title'],$_POST['intro'],$_POST['content'],$_POST['cat'],$_POST['publish'], $edit,$_POST['id']]);
		else
			$result=$this->db->QueryCrud(Posts::EDITPOSTWIMG,[$_POST['title'],$_POST['intro'],$_POST['content'],$_POST['img'],$_POST['cat'],$_POST['publish'],$edit ,$_POST['id']]);
			
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

	public function delete_post(){
			
			$result=$this->db->QueryCrud(Posts::DELETEPOST,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}
	

	public function delete_multiple(){
		if($_POST['type']==4){
			$result=$this->db->QueryCrud(Posts::DELETEMULTIPLE,[$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>204));
			}
		}
	}
}

$post_controller=new PostController();
if(count($_POST)>0){
	if($_POST['type']==1){
	$post_controller->get_post();
}
elseif($_POST['type']==2){
	$post_controller->edit_post();
}
elseif($_POST['type']==3){
	$post_controller->add_post();
}
elseif($_POST['type']==4){
	$post_controller->delete_post();
}
elseif($_POST['type']==6){
	$post_controller->get_updates($_POST['id']);
}
elseif($_POST['type']==7){
	$post_controller->delete_multiple();
}

}
?>
 
