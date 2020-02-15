<?php
session_start();
require_once "../admin/controllers/public_controller.php";
require_once "../admin/controllers/category_controller.php";
require_once "../admin/controllers/user_controller.php";
$public_controller->add_visit();


?>
    <!DOCTYPE html>
    <html lang="en ">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>WORLD NEWS</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="css/fontawesome/css/brands.css" rel="stylesheet">
        <link href="css/fontawesome/css/solid.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Long+Cang&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Cute+Font|Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Cute+Font|Karla|Markazi+Text&display=swap" rel="stylesheet">
        <link rel="icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/306ce244ed.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.4.1.min.js"></script> 
        <Script src="js/h.js"></script>
    </head>

    <body>
      <!--

        <div class="container-fluid" style="background-color: #fff" >
        
            <div class="row">
                <div class="col-lg-2  " id="Scroll" >
                        <img src="img/logo.png" style=" width: 150px; height:80px; margin-top:10px; margin-left:20px; " alt="">
                </div>
                <div class="col-lg-10 float-lg-right " id="search">
                    <div class="form-group row mt-lg-5 mr-5 float-right" >
               
                        <form class="form-inline">
                        <input class="form-control " type="search" id='topSearch' placeholder="Search" aria-label="Search">
                        <button class="btn btn-default  ml-2" style="background-color: #29a0da; color:#fff; " type="submit"><i class="fa fa-search " ></i></button>
                        </form>                   
                    </div>
                </div>
            </div>-->






            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
  <a class="navbar-brand" href="#">WORLD NEWS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link foc" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      

       <?php 
                        
                          $cats=$category_controller->get_category();
                          foreach($cats as $cat){
                            
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="category.php?cat=<?php echo $cat['Cat_name'] ?>"><?php echo $cat['Cat_name'] ?></a>
                        </li>
                        <?php }?>
                        <?php  if(isset($_SESSION['priv'])){
                                    if($_SESSION['priv']==0 or $_SESSION['priv']==1 ){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/">لوحة التحكم</a>
                        </li>
                        <?php } } ?>
                       




      
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle" style="font-size: 24px;"></i>
        </a>
                                  
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item " href="contact.php">للتواصل معنا</a>
        <?php if(!isset($_SESSION['id'])){ ?>
                       
                            <a class="dropdown-item login" href="#" >تسجيل الدخول</a>
                        
                  
                            <a class="dropdown-item signup" href="#" > تسجبل مستخدم جديد</a>
                      
                        <?php }else{ ?>
                        
                            <a class="dropdown-item" href="logout.php" >تسجبل خروج</a>
                      
                        <?php }?>
                     
        </div>
      </li>
      
    </ul>
     </div>
</nav>





































            <!--

            <div class="row container " >
         
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
                    <button class="navbar-toggler  " onclick="openNav()" type="button"  style="position: fixed; top:10px;right:10px;border:none;z-index:3;" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link foc" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
                        </li>
                        <?php 
                        
                          $cats=$category_controller->get_category();
                          foreach($cats as $cat){
                            
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="category.php?cat=<?php echo $cat['Cat_name'] ?>"><?php echo $cat['Cat_name'] ?></a>
                        </li>
                        <?php }?>
                        <?php  if(isset($_SESSION['priv'])){
                                    if($_SESSION['priv']==0 or $_SESSION['priv']==1 ){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/">لوحة التحكم</a>
                        </li>
                        <?php } } ?>
                       
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle" style="font-size: 24px;"></i>
        </a>
                                  
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item " href="contact.php">للتواصل معنا</a>
        <?php if(!isset($_SESSION['id'])){ ?>
                       
                            <a class="dropdown-item login" href="#" >تسجيل الدخول</a>
                        
                  
                            <a class="dropdown-item signup" href="#" > تسجبل مستخدم جديد</a>
                      
                        <?php }else{ ?>
                        
                            <a class="dropdown-item" href="logout.php" >تسجبل خروج</a>
                      
                        <?php }?>
                     
        </div>
      </li>
                       
                        </ul>
                     </div>
                </nav>-->
            </div>
        </div>
        
    <div id="mySidebar" class="sidebar" style="background-color: #FFF">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link ml-5 active" style="color:#2a5d8e !important; font-style:bold;" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <?php 
                 foreach($cats as $cat){
                        ?>
                  <li class="nav-item">
                            <a class="nav-link ml-5" style="color:#2a3d8e !important;" href="category.php?cat=<?php echo $cat['Cat_name'] ?>"><?php echo $cat['Cat_name'] ?></a>
                   </li>
                 <?php }?>
                 <li class="nav-item">
                                  
        <a class="nav-link ml-5 active " style="color:#2a5d8e !important; font-style:bold;"  href="contact.php">للتواصل معنا</a>
        <?php if(!isset($_SESSION['id'])){ ?>
                       
                            <a class="nav-link ml-5 active login"  style="color:#2a5d8e !important; font-style:bold;" href="#" >تسجيل الدخول</a>
                        
                  
                            <a class=" nav-link ml-5 active signup"  style="color:#2a5d8e !important; font-style:bold;" href="#" > تسجبل مستخدم جديد</a>
                      
                        <?php }else{ ?>
                        
                            <a class="nav-link ml-5 active"  style="color:#2a5d8e !important; font-style:bold;" href="logout.php" >تسجبل خروج</a>
                      
                      
                        <?php }?>
                     
       
      </li>
                      
        </ul>
    </div>

 <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>signup</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <form id="break_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>Full Name</label>
                      <input type="text"class="form-control" name="name" id="un" placeholder="Username" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required="required">  
                    </div>
                    <div class="modal-footer">
                                <input type="hidden" value="4" name="type">
                                  <button type="button" class="btn btn-secondary" id="btn-add">confirm</button>
                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="cancel">
                              </div>
                    <hr>
                  </form>
                  </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>Login</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <form id="login_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="emaillog" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="passlog" placeholder="Password" required="required">  
                    </div>
                    <div class="modal-footer">
                                <input type="hidden" value="5" name="type">
                                  <button type="button" class="btn btn-secondary" id="btn-login">confirm</button>
                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="cancel">
                              </div>
               
                    <hr>
                  </form>
               
                  </div>
        </div>
    </div>
  </div>
</div>
<!--

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/n1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/n1.jpg" class="d-block w-100" alt="...">
    </div>
    
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
-->

