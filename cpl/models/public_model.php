<?php

class Varity{
    const GETVISIT="select visitors from visits where year=? and month=? ";

    const GETMONTHVISIT="select visitors from visits where year=? order by month DESC";

    const GETALLVISIT="SELECT * FROM visits ORDER BY year ASC";

    const GETYEARVISIT="select sum(visitors) as sum from visits where year=? ";

    const ADDVISIT="INSERT INTO visits(month, year, visitors) VALUES (?,?,?)";

    const UPDATEVISIT="UPDATE visits SET visitors=?  where year=? and month=? ";
}
?>