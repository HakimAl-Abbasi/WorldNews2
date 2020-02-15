<?php

class Comments{

//comm_id	comm_content	comm_date	user_id	comm_status	post_id	approv_by

    const SELECTALL="SELECT comments.*,posts.Post_Title,users.Full_Name FROM comments,posts,users WHERE comments.Post_ID=posts.Post_ID and comments.User_Id=users.User_ID and comments.comm_status=1  ORDER BY comm_id DESC
    ";
    const SELECTL="SELECT * FROM comments ORDER BY comm_id DESC Limit 5 ";
   
    const SELECTCOMMPOST="select comments.*,users.Full_Name,posts.Post_ID,posts.Post_Title,posts.Create_by from comments,posts,users where comments.Post_ID=posts.Post_ID and users.User_ID=comments.User_Id and comments.comm_status=1 and posts.Post_ID=?";

    const SELECTCOMMENT="select comments.*,users.Full_Name,posts.Post_ID,posts.Post_Title,posts.Create_by from comments,posts,users where comments.Post_ID=posts.Post_ID and users.User_ID=comments.User_Id" ;

    const SELECTCOMMENTNUM="select count(comm_id) from comments where comm_status=1 and Post_ID=?";
    const SELECTPENDINGCOMMENT="select count(comm_id) from comments where comm_status =-1 " ;
    

    const ADDCOMMENT="INSERT INTO comments (comm_content,User_Id,Post_ID,comm_date) VALUES (?,?,?,?)";
                    
    const EDITCOMMENT="UPDATE comments SET comm_content=? WHERE comm_id=?";

    const DELETECOMMENT="update comments SET comm_status =?   WHERE comm_id =? ";


    const DELETEMULTIPLE="delete FROM comments WHERE comm_id in(?)";

}

?>