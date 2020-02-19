<?php
 require "models/Images.php";

 $file=new Images();
 $file->addFile();
    // if ( 0 < $_FILES['img']['error'] ) {
    //     echo 'Error: ' . $_FILES['img']['error'] . '<br>';
    // }
    // else {
    //     if(move_uploaded_file($_FILES['img']['tmp_name'], 'postsImages/'. $_FILES['img']['name']))
    //         echo json_encode(array("statusCode"=>200));
    // }

?>