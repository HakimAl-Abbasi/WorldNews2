<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\user_model.php';

class UserController{
	private $db;
	private $user_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->user_model=new Users();
	}

	public function get_User(){
		$result=$this->db->SelectAll(Users::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}
	public function get_pending_User(){
		$result=$this->db->SelectAll(Users::SELECTPENDINGUSERS);

		if ($result) {
			 return $result;
		} 
	
	}
	public function get_One($email){
		$result=$this->db->SelectAll(Users::SELECTONE,[$email]);

		if ($result) {
			if($result[0]['Password']==$_POST['password'])
				if($result[0]['User_Status']){
					session_start();
					$_SESSION['id']=$result[0]['User_ID'];
					$_SESSION['priv']=$result[0]['User_GroupID'];
					$_SESSION['fullname']=$result[0]['Full_Name'];
						echo json_encode(array("statusCode"=>200,"message"=>"Evrey thig is ok"));
				}
				else{
					echo json_encode(array("statusCode"=>204,"message"=>"This account is Disables"));
				}
			else
				echo json_encode(array("statusCode"=>204,"message"=>"Wrong Password"));

		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"Not Exsist"));
		}
	}

	


	public function edit_User_priv(){
		
			$result=$this->db->QueryCrud(Users::EDITUSERPRI,[$_POST['priv'],$_POST['id']]);
		
		if ($result) {
				
				echo json_encode(array("statusCode"=>200,"message"=>"Post updated successfully"));
			} 
		else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
			

	}

	public function add_user(){

			
		$result=$this->db->QueryCrud(Users::ADDUSER,[$_POST['name'],$_POST['password'],$_POST['email']]);
		if ($result) {
			
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}

	public function delete_User(){
			
			$result=$this->db->QueryCrud(Users::DELETEUSER,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}


}

$User_controller=new UserController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$User_controller->get_User();
}
elseif($_POST['type']==2){
	$User_controller->edit_User_priv();
}
elseif($_POST['type']==3){
	$User_controller->delete_User();
}
elseif($_POST['type']==4){
	$User_controller->add_User();
}
elseif($_POST['type']==5){
	$User_controller->get_One($_POST['email']);
}

}
?>
 
 
