<?php

require_once  dirname(__FILE__,2).'\models\site_db.php';
require_once  dirname(__FILE__,2).'\models\public_model.php';

class PublicController{
	private $db;
	private $cat_model;

	public  function __construct(){
		$this->db=new Site_db();
		$this->cat_model=new Varity();
	}

	public function get_visits($year,$month){
		$result=$this->db->SelectAll(Varity::GETVISIT,[$year,$month]);
		// print_r($result);
		
			return $result;
	}
	public function get_all_visits(){
		$result=$this->db->SelectAll(Varity::GETALLVISIT);
		// print_r($result);
		
			return $result;
	}
	
	public function get_month_Visit($year){
		$result=$this->db->SelectAll(Varity::GETMONTHVISIT,[$year]);
		// print_r($result);

		if($result)
			return $result;
		else
			return(array(0,0,0,0,0,0,0));
		
	}
	public function get_year_visits($year){
		$result=$this->db->SelectAll(Varity::GETYEARVISIT,[$year]);
		// print_r($result);

		if($result)
			return $result;
		else
			return 0;;
		
	}

	public function add_visit(){
		$year=date("Y");
		$month=date("n");
 
		$current_visits=$this->get_visits($year,$month);
 
		if($current_visits)
			$result=$this->db->QueryCrud(Varity::UPDATEVISIT,[$current_visits[0]['visitors']+1,$year,$month]);
		else
			$result=$this->db->QueryCrud(Varity::ADDVISIT,[$month,$year,0]);
	}

	
}

$public_controller=new PublicController();


?>
 
