<?php

class Groups{
    
    const SELECTALL="select * from groups";

    const SELECTPRIV="select prv_name,prv_id from privllages where priv_status=1";

    const ADDGROUP="insert INTO groups(group_name,create_by, privllages_id,group_date)
                         VALUES (?,?,?,?)";
    
    const SELECTGROUP="select * from groups where group_id =? " ;

                    
    const EDITGROUP="UPDATE groups SET group_name=?,privllages_id=? WHERE group_id=?";


    const UPATES="update groups set updates=? where group_id =?  ";


    const DELETEGROUP="update groups SET group_status =?  WHERE group_id =? ";
    

    const GETUPATES="select updates from groups where group_id =?  ";


    const DELETEMULTIPLE="delete FROM groups WHERE group_id in(?)";

}

?>