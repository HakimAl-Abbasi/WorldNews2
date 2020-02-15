<?php 
require_once "../admin/controllers/post_controller.php";
require_once "../admin/controllers/comments_controller.php";
require_once "header.php";
require_once "../admin/time.php";
$data=$post_controller->get_one($_GET['id']);
$post_controller->update_visit($_GET['id']);
$comments=$Comments_controller->get_Post_Comments($_GET['id']);

$comnum=$Comments_controller->get_Comment_Number($_GET['id']);


require_once "breaks.php";
$pendingP=$post_controller->get_ranking_post();
$lastC=$Comments_controller->get_last_Comments();

?>

<section>
<div class="container-flauid ml-4 mr-4">
<div class="row">
  <div class="col-lg-8 p-4" style="background:#fff; " >
  <h1 style="font-family: Roboto-Medium;
    font-size: 30px;
    line-height: 1.3;"><?php echo $data[0]['Post_Title']; ?></h1>
    
      <img src="<?php echo "../admin/uploads/".$data[0]['Post_img']; ?>" class="img-fluid mt-4" alt="">
      <p  class="mt-4 "  style="line-height: 1.7;text-align: justify; 
    color: gray;
    font-weight: 300;">
   <?php echo $data[0]['post_content']; ?>
   <br/>
   <span style="font-family: Roboto-Bold;
   font-size: 12px;
   line-height: 1.7; color: #888;">
   By Hopes news - <?php echo $data[0]['create_date']; 


   ?>   

     </span>
<span style="font-family: Roboto-Bold;
   font-size: 12px;
   line-height: 1.7; color: #888;float:right;"><?Php echo $comnum[0]['count(comm_id)'];?>comments   </span>
    </p>
    <div class="mt-5">
								<span class="mr-3">
									Tags:
								</span>
								
								<span >
									<a href="#" class="ml-3">
										Streetstyle
									</a>

									<a href="#" class="ml-3">
										Crafts
									</a>
								</span>
							
     </div>
     
     <h1>Coments</h1>
   <div class="row" style="<?php  if(!empty($comments)) echo 'overflow-y:scroll;height:300px;';?>">
    <div class="comments  mt-0 mr-5 ml-5">
    <!-- Contenedor Principal -->
	<div class="comments-container">
		

		<ul id="comments-list" class="comments-list">
      
  <?php 
    
        if(!empty($comments)){
       
        foreach($comments as $comm){
          if($comm['comm_status']==1){?>
			<li>
				<div class="comment-main-level ">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="../admin/img/def.png" alt="" style="object-fit:cover;"></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name  <?php if($comm['Create_by']==$comm['User_Id']){ echo "by-author";}?>"><?php echo $comm['Full_Name']; ?></h6>
							<span> <?php echo time_Ago($comm['comm_date']); ?></span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
						<div class="comment-content">
            <?php echo $comm['comm_content']; }
        }
            ?>						</div>
					</div>
				</div>
      </li>
      
		</ul>
   <?php 
        }else{
          echo' <p style="line-height: 1.7; 
          color: gray;
          font-weight: 300;">No comment Yet </p>';
        }
        ?>
	</div>
    
      </div>
       
        <?php if(isset($_SESSION['id'])){ ?>
        <div   class="row comm py-5">
          <h3 style="font-size: 1.75rem;" >Leave a comment</h3>
          <div class="comments-container comm">
		

		<ul id="comments-list" class="comments-list">
    <li>
  
				<div class="comment-main-level ">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="../admin/img/def.png" alt="" style="object-fit:cover;"></div>
        <form  id="comm_form" >
          <input type="hidden" name="type" value="2">
          <input type="hidden" name="postId" id="postId" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['id']; ?>">
        
          <div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name"><?php echo $_SESSION['fullname'];?></h6>
              </div>
                        <div class="col-11" style="float:left;padding:0;">  <input Type="text" name="comment" id="comment"   class="form-control"></div>  <div class="col-2" style="float:left;padding:4px;max-width:fit-content!important;"> 
                        <div class="btn-com"  id="btn-comm"> <i class="fa fa-space-shuttle"  id="btn-comm"></i></div>
                        </div>
                          </div>          
                

                      </form>
                      </div>
                      </li>
                      </ul>
                      </div>
                          
                       
        </div>
        <?php } ?>

    </div>
  </div>
  <div class="col-lg-4">
   
   <div class="list-group mb-2 ">
   <h2 class=" card-title group-title "> Most Poupular</h2>  
   <?php
   $i=1;
   foreach($pendingP as $p){
   
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
</div>

</div>

</section>




<?php require_once"footer.php" ?>