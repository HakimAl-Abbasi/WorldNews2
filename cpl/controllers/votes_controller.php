<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\votes_model.php';

class VoteController{
	private $db;
	private $cat_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->cat_model=new Votes();
	}

	public function get_vote(){
		$result=$this->db->SelectAll(Votes::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_votes(){
		$result=$this->db->SelectAll(Votes::SELECTVOTERS);

		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_one($id){
		$result=$this->db->SelectAll(Votes::SELECTVOTE,[$id]);
		
		if ($result) {
			return $result;
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	

	public function add_vote(){

        $start=$_POST['start'].' '.$_POST['startt'].':00';
        $end=$_POST['end'].' '.$_POST['endt'].':00';
        $options=array();
        foreach($_POST['option'] as $option){
            $options[]=array("option"=>$option,"voters"=>0);
        }
        // print_r($options);
        // echo json_encode($options);
   
		$result=$this->db->QueryCrud(Votes::ADDVOTE,[$_POST['ques'],$start,$end,json_encode($options),1]);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"votes inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}


	public function delete_vote(){
			
			$result=$this->db->QueryCrud(Votes::DELETEVOTE,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	public function delete_multiple(){
		if($_POST['type']==4){
			$result=$this->db->QueryCrud(Votes::DELETEMULTIPLE,[$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>204));
			}
		}
	}
}

$vote_controller=new VoteController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$vote_controller->get_vote();
}
elseif($_POST['type']==2){
	$vote_controller->add_vote();
}

elseif($_POST['type']==3){
	$vote_controller->delete_vote();

}
elseif($_POST['type']==4){
	$vote_controller->delete_multiple();
}
}
?>
 
