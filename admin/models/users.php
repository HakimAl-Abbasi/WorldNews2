<?php

class Users{

    const SELECTALL="select * from users";

    const ADDUSER="insert INTO USERs(USER_title, USER_intro, USER_content, USER_img, cat_id, publish_date)
                     VALUES (:t,:i,:c,:img,:cat,:p)";
                    
    // const EDITUSERWIMG="UPDATE USERs SET USER_title=:t,cat_id=:cat,USER_intro=:i,USER_content=:c,publish_date=:p
    //                      WHERE USER_id=:id";

    // const EDITUSER="update users SET user_group_id=:p WHERE user_id=:id";

    const DELETEUSER="update users SET User_Status=:state  WHERE user_id=:id ";

    const DELETEMULTIPLE="delete FROM users WHERE User_ID in(:id)";


    // public function add_user(){
       
    //     $con=new PDO( "mysql:host=localhost;dbname=newnews;charset=utf8","root","");
    //     $sql="insert into users(user_full_name,user_email,user_phone,profile,user_pass,register_date,user_group_id,activiate_by)
    //      VALUES(:n,:e,:p,:img,:pass,:reg,:group,:activiBy)";
    //     $query=$con->prepare($sql);
    //     $query->execute([$_USER['name'],$_USER['email'],$_USER['phone'],$_USER['img'],$_USER['pass'],$_USER['reg_date'],$_USER['group'],$_USER['admin']]);
    //     if($con->lastInsertId())
    //     {
    //         header("Location: addArtical.php"); 
    //     }
    // }
    public function get_users(){
        $con=new PDO( "mysql:host=localhost;dbname=newnews;charset=utf8","root","",[
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
        $sql="select * from users";
        $query=$this->con->prepare($sql);
        $query->execute();
        $data=$query->fetchAll();
        return $data;
    }

    public function edit_user($id,$priv){
        $sql = "update users SET user_group_id=:p WHERE user_id=:id";
              $query=$this->con->prepare($sql);
              $query->execute(["p"=>$priv,"id"=>$id]);
          if($this->con->errorInfo())
             return  $this->con->errorInfo();
          else
              return true;
      }
  
  
  
      public function delete_user($state,$id){
          $sql = "update users SET user_status=:state  WHERE user_id=:id ";
          $query = $this->con->prepare($sql);
           $query->execute(["state"=>$state,"id"=>$id]);
           if($this->con->errorInfo())
               return  $this->con->errorInfo();
           else
               return true;
      }

}
$user_model=new Users();
?>