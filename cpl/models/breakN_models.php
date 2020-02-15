<?php

class BreakNews{


    const SELECTALL="select * from breaking_news";

    const SELECTBREAK="select * from breaking_news where break_id =? " ;

    const ADDBREAK="insert INTO breaking_news(break_content, start_date, end_date, create_by)
                    VALUES (?,?,?,?)";
                    
    const EDITBREAK="UPDATE breaking_news SET break_content=?, start_date=?, end_date=? WHERE break_id=?";

    const DELETEBREAK="update breaking_news SET break_status =?   WHERE break_id =? ";


    const DELETEMULTIPLE="delete FROM breaking_news WHERE break_id in(?)";

    const UPATES="update categories set updates=? where cat_id =?  ";


    const GETUPATES="select updates from categories where cat_id =?  ";

}

?>