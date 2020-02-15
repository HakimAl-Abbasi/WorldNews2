<?php
class Images{
    public function post_old_img($id){
        $con=new PDO( "mysql:host=localhost;dbname=newnews;charset=utf8","root","",[
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
          $sql="select img FROM posts where post_id=:post";
          $query = $con->prepare($sql);
          $query->execute(["post"=>$id]);
          $posts=$query->fetchAll();
            foreach($posts as $post){
                     return $post['img'];
                     }
  }



  public function addFile(){
    if(!empty($_FILES)){
    $info = explode("/",$_FILES["img"]["type"]);

    if($info[0]=='image' ){
        $path="posts/Images/".time().".".end($info);
                     if(move_uploaded_file($_FILES["img"]["tmp_name"],$path))
                         echo json_encode(array("statusCode"=>200,"path"=>$path));
                     else 
                         echo json_encode(array("statusCode"=>201));
    }
    } 
    else
        echo json_encode(array("statusCode"=>200,"path"=>"no image"));
    
}



}

?>