<?php

class Votes{

    const SELECTALL="select * from votes";

    const SELECTVOTERS="select users_id  from votes where vote_id =?";

    const ADDVOTE="insert INTO votes(vote_question,vote_start, vote_end,vote_options,create_by)
                         VALUES (?,?,?,?,?)";
    
    const SELECTVOTE="select * from votes where vote_id =? " ;

    const DELETEVOTE="update votes SET vote_status =?  WHERE vote_id =? ";
    

    const DELETEMULTIPLE="delete FROM votes WHERE vote_id in(?)";

}

?>