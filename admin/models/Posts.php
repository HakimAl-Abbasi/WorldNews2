<?php
class Posts{

    const SELECTALL="SELECT Post_ID, Post_Title, Post_Intro, posts.Post_Content, posts.Post_img, Post_Status,
                     Cat_name, posts.Create_by, posts.Create_Date, posts.Updates_date, Publish_Date
                      FROM posts,categories WHERE posts.cat_id=categories.cat_id";


    const SELECTALLFE="SELECT Post_ID, Post_Title, Post_Intro, Post_Content, Post_img, Post_Status,
    Cat_name, posts.create_by, posts.Create_Date, posts.Updates_date, Publish_Date
     FROM posts,categories WHERE posts.cat_id=categories.cat_id and categories.Cat_name=? ";


    const SELECTLastFE="SELECT Post_ID, Post_Title, Post_Intro, Post_Content, Post_img, Post_Status,
    Cat_name, posts.Create_by, posts.Create_Date, posts.Updates_date, Publish_Date
    FROM posts,categories WHERE posts.cat_id=categories.cat_id ORDER BY posts.Post_ID DESC limit 4 ";


    
    const RankingPOST="select Post_ID,visits,Post_Title from posts order by visits Desc limit 5 " ;

    const ADDPOST="insert INTO posts(Post_Title, Post_Intro, Post_Content, Post_img, cat_id, Publish_Date)
                     VALUES (?,?,?,?,?,?)";


    const SELECTPOST="select * from posts where Post_ID =? " ;

    const UPATES="update posts set Updates_date=? where Post_ID =?  ";


    const GETUPATES="select updates from posts where Post_ID =?  ";

    const SELECTCATEGORIES="select * from categories " ;
               
    const EDITPOSTWIMG="UPDATE posts SET Post_Title=?,Post_Intro=?,Post_Content=?,Post_img=?,cat_id=?,
                        Publish_Date=?, Updates_date=? WHERE Post_ID=?";


    const EDITPOST="UPDATE posts SET Post_Title=?,Post_Intro=?,Post_Content=?,cat_id=?,
                    Publish_Date=?,Updates_date=? WHERE Post_ID=?";

    const DELETEPOST="update posts SET post_status =?  WHERE Post_ID =? ";


    const UPDATEVISIT="update posts SET visits =?  WHERE Post_ID =? ";

    const SELECTVISIT="select  visits from posts  WHERE Post_ID =? ";


    const DELETEMULTIPLE="delete FROM posts WHERE Post_ID in(?)";
}
?>