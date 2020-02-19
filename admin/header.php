<?php
session_start();
if(empty($_SESSION)){
  header("Location:../main/index.php");
  
  }
  else{
    if($_SESSION['priv']!=0 or $_SESSION['priv']!=1 ){
     // header("Location:../main/index.php");
     #print_r($_SESSION);
  }
}

// print_r($_SESSION);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Infinite - Dashboard</title>

  <link href="" id="href1" rel="stylesheet"> 
 
  <link href="vendor/fontawesome-free/css/all.min.css"  rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" id="href2" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" id="href3" rel="stylesheet">
  <link href="css/ruang-admin.css" id="href4" rel="stylesheet">
  <link href="src/jquery.toast.css"  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
  <style>
    .small-icon{
      color:#ddd;
    }
    .top{
      /* font-family: 'Francois One', sans-serif; */
      font-family: 'Cairo', sans-serif;
      font-size: 17px;
    /* margin-top: 20px; */
    }
    .topVisit{
      font-family: 'Cairo', sans-serif;
    }
    </style>
    <!-- <script src="https://kit.fontawesome.com/795336d087.js" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
   
    <script>
	tinymce.init({
		selector : '#disc',
		plugins : 'image',
		toolbar : 'image',

		images_upload_url : 'tinyupload.php',
		automatic_uploads : false,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'tinyupload.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
  });
  
</script>
  <style>
   
#span {
 left:0;
 text-align:center;
 bottom:0;
}

.file-container > div {
display:inline-block;
overflow: hidden;
height: auto;
padding: 20px;
-webkit-box-shadow: 0 2px 0 2px #f8f8f8;
box-shadow: 0 2px 0 2px #f8f8f8;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 100px;
    text-align: center;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    border-radius:35px;
    font-size: 24px;
    line-height: 1.33;
}

.add-btn-btom {
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
}
    </style>
  <script>
    // window.onload = function WindowLoad(event) {
    //   // <?php 
    //   // session_start();
    //   // if($_SESSION["lang"]=="english")
    //   //    include"languages/english.php"; 
    //   //  else
    //   //    include"languages/arabic.php";
    //   // ?>;

    //   if(localStorage.getItem('lang')=="arabic"){
    // document.getElementById('href2').setAttribute('href',"vendor/bootstrap/css/bootstrap -rtl.css")
    // document.getElementById('href3').setAttribute('href',"vendor/datatables/dataTables.bootstrap4 -rtl.css")
    // document.getElementById('href4').setAttribute('href',"css/ruang-admin -rtl.css")
    // document.getElementById('href1').setAttribute('href',"css/bootstrap-rtl.css")
    // <?php  //include"languages/arabic.php"; ?>
    //   }
     
    // }
  </script>
  <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->

</head>

<body id="page-top">
  <div id="wrapper">
  <?php  include"languages/english.php"; ?>