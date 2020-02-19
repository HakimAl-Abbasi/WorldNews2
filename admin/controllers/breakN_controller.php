<?php
require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\breakN_models.php';

class BreakController{
	private $db;
	private $break_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->break_model=new BreakNews();
	}

	public function get_BreakNews(){
		$result=$this->db->SelectAll(BreakNews::SELECTALL);

		if ($result) {
			echo json_encode($result);
		} 
		else {
			echo json_encode(array("statusCode"=>204));
		}
	}

	public function get_FE_BreakNews(){
		$result=$this->db->SelectAll(BreakNews::SELECTALL);

		if ($result) {
			return $result;
		} 
		
	}


	public function add_BreakNews(){

			
		$result=$this->db->QueryCrud(BreakNews::ADDBREAK,[$_POST['contentB'],$_POST['start'],$_POST['end'],'1']);
		if ($result) {
			echo json_encode(array("statusCode"=>200,"message"=>"post inserted successfully"));
		} 
		else {
			echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
		}
	}


	public function delete_BreakNews(){
			
			$result=$this->db->QueryCrud(BreakNews::DELETEBREAK,[$_POST['state'],$_POST['id']]);
	
			if($result) {
				echo json_encode(array("statusCode"=>200,"message"=>"post deleted successfully"));
			} 
			else {
				echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
			}
	}

	
}

$BreakNews_controller=new BreakController();

if(count($_POST)>0){
	if($_POST['type']==1){
	$BreakNews_controller->get_BreakNews();
}
elseif($_POST['type']==2){
	$BreakNews_controller->add_BreakNews();
}
elseif($_POST['type']==3){
	$BreakNews_controller->delete_BreakNews();
}

}
?>
 
<?php


//  function check_update(){
//     $old_values=$this->get_one($_POST['id']);
//     $updates="";
//     foreach($old_values as $oval){
//         if($_POST['title']!=$oval['cat_name'])
//             $updates .="name ";
//         if($_POST['parent']!=$oval['parent'])
//             $updates .=" ,parent";
        
//     }
//     if($updates !=""){
//             $old_updates=json_decode($old_values[0]['updates']);
//             $old_updates[]=array("date"=>date("y-m-d"),"by"=>"ibtehal fahd","affected_data"=>$updates);
//             return json_encode($old_updates);
//     }
//     else
//              return "no update";

// }

//  function get_one($id){
//     $result=$this->db->SelectAll(BreakNews::SELECTBREAK,[$id]);
    
//     if ($result) {
//         return $result;
//     } 
//     else {
//         echo json_encode(array("statusCode"=>204));
//     }
// }

//  function get_updates($id){
//     $result=$this->db->SelectAll(BreakNews::UPATES,[$id]);
    
//     if ($result) {
//         echo $result[0]['updates'];
//     } 
//     else {
//         echo json_encode(array("statusCode"=>204));
//     }
// }

//  function edit_BreakNews(){

//     $edit=$this->check_update();
//     if($edit !="no update"){
    
//     $this->db->QueryCrud(BreakNews::UPATES,[$edit,$_POST['id']]);

//         $result=$this->db->QueryCrud(BreakNews::EDITBREAK,[$_POST['title'],$_POST['parent'],$_POST['id']]);
    
//     if ($result) {
            
//             echo json_encode(array("statusCode"=>200,"message"=>"Post updated successfully"));
//         } 
//     else {
//             echo json_encode(array("statusCode"=>204,"message"=>"somthing went wrong please try again"));
//         }
//     }
//     else
//         echo json_encode(array("statusCode"=>200,"message"=>"Post updated successfully"));			

// }

//  function delete_multiple(){
//     if($_POST['type']==4){
//         $result=$this->db->QueryCrud(BreakNews::DELETEMULTIPLE,[$_POST['id']]);

//         if($result) {
//             echo json_encode(array("statusCode"=>200));
//         } 
//         else {
//             echo json_encode(array("statusCode"=>204));
//         }
//     }
// }

?>