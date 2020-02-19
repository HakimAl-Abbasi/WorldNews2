<?php 
    require_once "../admin/controllers/breakN_controller.php";
  
    $breaks=$BreakNews_controller->get_FE_BreakNews();
    $i=0;
    ?>
    <section id="breaking News">
    <div class="sitewidth" style="clear:both;height:30px;">
    <!--<div class="br-title">v</div>-->
    <marquee style="width:100%;background:orange;">

        <?php 
      
         foreach($breaks as $break){
           if($break['break_status']==1){
            $i++;
           echo'<span class="step">'.$i.'</span>';
            ?>

            

            <span style="    font-size: 15px;
    line-height: 1.7; color: #000;
    margin-right:30px;">
   <?php echo $break['break_content'];?>
      </span>
    <?php   
          }
         else{
           echo "<span style='font-size: 15px;line-height: 30px;margin-right:30px;'>";
         }
        }
    ?>
    </marquee>
    </div>
    </section>
