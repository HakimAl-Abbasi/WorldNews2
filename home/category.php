<?php 
require_once "../admin/controllers/post_controller.php";

require_once "../admin/controllers/comments_controller.php";
require_once "../admin/time.php";
require_once "header.php";
require_once "breaks.php";
$pendingP=$post_controller->get_ranking_post();
$lastC=$Comments_controller->get_last_Comments();

?>


<section>
<div class="container-flauid mr-4 ml-4">
    
<div class="row">
  <div class="col-lg-8 mt-4 ">
  <?php

$posts=$post_controller->get_FE_post($_GET['cat']);
 if(empty($posts)){
     echo "Empty";
 }else{
foreach($posts as $post){
?>

    <div class="row my-card p-4 ">
        <div class="col-lg-4">
        <img src=<?php echo "../admin/uploads/".$post['Post_img']; ?> style="height: 200px;object-fit:fill;" class="img-fluid " alt="">
        </div>
        <div class="col-lg-8">
        <h3 style="font-family: Roboto-Medium;
    font-size: 30px;
    line-height: 1.3;"><?php echo $post['Post_Title']; ?></h3>
 
      <p  class="mt-2  p-b-24 "   style="font-family: Roboto-Bold;
    font-size: 14px;
    line-height: 1.7; color: #666;">
            <?php echo $post['Post_Intro'];
          ?>
          

    </p>
    <span style="font-family: Roboto-Bold;
    font-size: 12px;
    line-height: 1.7; color: #888;">
   by Hopes news - <?php echo $post['Create_Date']; ?>
      </span><br/>
    <span class="btn btn-primary "> <a href="post.php?id=<?php echo $post['Post_ID']; ?>" style="color:#fff;text-decoration:none;" >Read more</a></span>
        </div>
    </div>
        <?php }
 }?>
 </div>

 <!-- <div class="col-lg-1"></div> -->
 <div class="col-lg-4">
   
   <div class="list-group mb-2 ">
   <h2 class=" card-title group-title "> Most Poupular</h2>  
   <?php
   $i=1;
   foreach($pendingP as $k=>$p){
     ?>
     <a href="post.php?id=<?php echo $p['Post_ID']?>" class="list-group-item ">
     <span class="number">0<?php echo $i?></span> 
     <?php echo $p['Post_Title']?>
   </a>
   <?php
   $i++;
 }
 ?>
   </div>
   <div class="list-group mb-2 ">
   <h2 class=" card-title group-title "> Recent Comments</h2>  
     <?php  foreach($lastC as $last){
        ?>
<a class="list-group-item " href="post.php?id=<?php echo $last['Post_ID']?>">
    <div style="width:auto;float:left;padding-right:2%;"><img src="../admin/img/boy.png" style="width:60px;height:60px;object-fit:fill;border-radius:50%;"/></div>
                      <div class="text-truncate font-weight-bold "><?php echo $last['Full_Name'] ;?></div>
                      <div class="small text-gray-500 "><?php echo $last['comm_content'] ;?></div>
                      <div class="small text-gray-500 message-time text-date " style="font-weight: 600 !important;color: #b7b9cc !important;" ><?php echo time_Ago($last['comm_date']);?> </div>
                    </a>
  <?php
}
?>
   </div>
   <div class="list-group mb-2 ">
   <h2 class=" card-title group-title "> CATEGORIES</h2>  
          <?php 
                         $cats=$category_controller->get_category();;
                         foreach($cats as $cat){
                       ?>
         <a class="list-group-item cats " href="category.php?cat=<?php echo $cat['Cat_name'] ?>"><?php echo $cat['Cat_name'] ?></a>
         <?php
         }
         ?>
   </div>
   
</div>

</div>

</section>



<?php require_once"footer.php" ?>