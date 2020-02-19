<?php
function time_Ago($t) { 
    $curr_time=date('Y-m-d H:i:s',$t);
                     
    $time =strtotime($curr_time); 
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff     = time() - $time; 
      
    // Time difference in seconds 
    $sec     = $diff; 
      
    // Convert time difference in minutes 
    $min     = round($diff / 60 ); 
      
    // Convert time difference in hours 
    $hrs     = round($diff / 3600); 
      
    // Convert time difference in days 
    $days     = round($diff / 86400 ); 
      
    // Convert time difference in weeks 
    $weeks     = round($diff / 604800); 
      
    // Convert time difference in months 
    $mnths     = round($diff / 2600640 ); 
      
    // Convert time difference in years 
    $yrs     = round($diff / 31207680 ); 
      
    // Check for seconds 
    if($sec <= 60 ) { 
        echo "$sec seconds ago"; 
    } 
      
    // Check for minutes 
    else if($min <= 60) { 
        if($min==1) { 
            echo "one minute ago"; 
        } 
        else { 
            echo "$min minutes ago"; 
        } 
    } 
      
    // Check for hours 
    else if($hrs <= 24) { 
        if($hrs == 1) {  
            echo "an hour ago"; 
        } 
        else { 
            echo "$hrs hours ago"; 
        } 
    } 
      
    // Check for days 
    else if($days <= 7) { 
        if($days == 1) { 
            echo "Yesterday"; 
        } 
        else { 
            echo "$days days ago"; 
        } 
    } 
      
    // Check for weeks 
    else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            echo "a week ago"; 
        } 
        else { 
            echo "$weeks weeks ago"; 
        } 
    } 
      
    // Check for months 
    else if($mnths <= 12) { 
        if($mnths == 1) { 
            echo "a month ago"; 
        } 
        else { 
         
            if(date("Y",$time)==date("Y",time())){
                 echo  date("M:d",$time);
            }else{
          echo  date("M:d,Y",$time);
            }
        } 
    } 
      
    // Check for years 
    else { 
        if($yrs == 1) { 
               echo  date("M:d,Y",$time);
        }
    }
        
     
} 
  


?>
<script>
function timeConverter(UNIX_timestamp){
    /*
    let diff=Date.now()-UNIX_timestamp;
       // Time difference in seconds 
       let sec     = diff; 
      
      // Convert time difference in minutes 
      let mint     = Math.round(diff / 60 ); 
        
      // Convert time difference in hours 
      let hrs     = Math.round(diff / 3600); 
        
      // Convert time difference in days 
      let days     = Math.round(diff / 86400 ); 
    
      // Convert time difference in weeks 
      let weeks     = Math.round(diff / 604800); 
        
      // Convert time difference in months 
      let mnths     = Math.round(diff / 2600640 ); 
        
      // Convert time difference in years 
      let yrs     = Math.round(diff / 31207680 ); 

      if(sec <= 60 ) { 
        return sec+"seconds ago"; 
    } 
      
    // Check for minutes 
    else if(mint <= 60) { 
        if(mint==1) { 
            return "one minute ago"; 
        } 
        else { 
            return mint+" minutes ago"; 
        } 
    } 
      
    // Check for hours 
    else if(hrs <= 24) { 
        if(hrs == 1) {  
            return  "an hour ago"; 
        } 
        else { 
            return hrs+"hours ago"; 
        } 
    } 
      
    // Check for days 
    else if(days <= 07) { 
        if(days == 1) { 
            return "Yesterday"; 
        } 
        else { 
            return days+" days ago"; 
        } 
    } 
      
    // Check for weeks 
    else if(weeks <= 4.3) { 
        if(weeks == 1) { 
            return "a week ago"; 
        } 
        else { 
            return weeks+"weeks ago"; 
        } 
    } 
      
    else { 
        var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getYear();
  var month = months[a.getMonth()];
  return month +":"+year+sec+mint;  
  }
        */
     
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
  return time;

}

</script>