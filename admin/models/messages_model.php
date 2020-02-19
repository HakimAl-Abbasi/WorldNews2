<?php

class Messages{
    


    const SELECTALL="select * from messages order by msg_id Desc ";

    const SELECTPENDING="select count(msg_id) as pending from messages where msg_status=-1";


    const ADDMESSAGE="insert INTO messages(sender_name,sender_email, msg_content,send_date)VALUES (?,?,?,?)";
    
    const SELECTMESSAGE="select * from messages where msg_id =? " ;

                    

    const DELETEMESSAGE="update messages SET msg_status =?  WHERE msg_id =? ";
    



    const DELETEMULTIPLE="delete FROM messages WHERE msg_id in(?)";

}

?>