<?php

class Categories{

    const SELECTALL="select * from categories";

    const SELECTALLTRASH="select * from categories where category_status=-1";

    const SELECTNAME="select Cat_name,cat_id from categories where parent=0";

    const ADDCATEGORY="insert INTO categories(Cat_name,updated_by, parent)
                         VALUES (?,?,?)";
    
    const SELECTCATEGORY="select * from categories where cat_id =? " ;

                    
    const EDITCATEGORY="UPDATE categories SET Cat_name=?,parent=? WHERE cat_id=?";


    const UPATES="update categories set update_date=? where cat_id =?  ";


    const DELETECATEGORY="update categories SET category_status =?  WHERE cat_id =? ";
    

    const GETUPATES="select update_date from categories where cat_id =?  ";


    const DELETEMULTIPLE="delete FROM categories WHERE cat_id in(?)";

}

?>