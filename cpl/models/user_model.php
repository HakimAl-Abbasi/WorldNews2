<?php

class Users{
    // (user_full_name , user_pass , user_email , user_phone ,register_date ,user_status ,user_group_id ,activiate_by )

    const SELECTALL="select * from users";

    const SELECTONE="select * from users where User_Email=?";


    const ADDUSER="insert INTO users(Full_Name,Password,User_Email)
                     VALUES (?,?,?)";
                    
    const SELECTPENDINGUSERS="select count(User_ID) as pending from users where User_Status =-1 " ;


    const EDITUSERPRI="update users SET User_GroupID=?  WHERE User_ID=? ";

    const DELETEUSER="update users SET User_Status=? WHERE User_ID=? ";

    const DELETEMULTIPLE="delete FROM users WHERE User_ID in(?)";

}