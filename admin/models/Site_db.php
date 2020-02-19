<?php
class Site_db{

    const DNS="mysql:host=localhost;dbname=news;charset=UTF8";
    const DBUSER="root";
    const DBPASS="";
    public $con;
    public function __construct()
    {
        $this->con=new PDO(Site_db::DNS,Site_db::DBUSER,Site_db::DBPASS);
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }
    public function QueryCrud ($sql,$args=array()){
        // echo $sql;
        // print_r($args);
        $query=$this->con->prepare($sql);
        $query->execute($args);
        if($this->con->errorInfo())
           return $this->con->errorInfo();
        else
            return true;
    }
    public function SelectAll ($sql,$arg=array()){
        //  echo $sql;
        // print_r($arg);
        $query=$this->con->prepare($sql);
        $query->execute($arg);
        $data=$query->fetchAll();
        if($data)
           return $data;
        else
            return false;
    }
   
   
  
    
}

?>