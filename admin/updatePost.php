<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/post_controller.php";
  $post_data=$post_controller->get_one($_GET['id']);
  // print_r($post_data);
  $cate=$post_controller->get_categories();

?>


  <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
         
          <!-- Row -->
     <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm mb-4 mt-1">
          <div class="card-body p-0">
                <div class="login-form">
                 
                <form id="update_post" >
                  
               
                    <div class="form-group">
                      <label><?php echo lang('th1'); ?></label>
                      <input type="hidden" name="id" id="id_n">
                      <textarea  id="title_n" name="title"  class="form-control" cols="30" rows="1" aria-describedby="emailHelp" required
                     ></textarea>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                      <label><?php echo lang('th2'); ?></label>
                      <input type="hidden" name="type" value="2">
                      <select id="cat_n" name="cat"  class="form-control">
                        <option value="0">select post post</option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['cat_id']?>"><?php echo$cat['cat_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                   
                    <div class="form-group col-lg-6">
                        <label><?php echo lang('th4'); ?></label>
                        <input type="date" class="form-control" id="publish_n"  name="publish">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                    <label>Image</label>
                    <div class="file-container" style="margin: auto 0;">
                  <div style=" position: relative;cursor: pointer;border: none;" >
                    <img class="img-fluid m-2 mt-0" src="l2.png" style="height: 300px;" id="old_img">
                       <span class="btn btn-secondary btn-file" id="span" style="position: absolute; ">
                       <i class="fas fa-edit">change</i> <input type="file"  id="image2" name='image'>
                        </span>
                        <input type="hidden" class="form-control" id="img2" name='img' >
                  </div>
                </div>
                    </div>
                    <div class="form-group col-lg-6">
                    <label><?php echo lang('th8'); ?></label>
                      <textarea  id="intro_n" name='intro'  class="form-control" cols="30" rows="14" aria-describedby="emailHelp"
                       ></textarea>
                    </div>
                    </div>
                  
                   
                    <div class="form-group">
                      <label><?php echo lang('th9'); ?></label>
                      <textarea  id="disc" name='content'  class="form-control" cols="30" rows="10" aria-describedby="emailHelp"
                       ></textarea>
                    </div>

                  </form>
                  <div class="form-group">
                      <button  class="btn btn-primary btn-block" id="update"><?php echo lang('m1o1'); ?></button>
                    </div>
                    <hr>
                  <hr>
                </div>
          </div>
        </div>
      </div>
     </div>     
        </div>
         
<?php 

require "footer.php";
?>

<script>
$( document ).ready(function() {
  tinyMCE.triggerSave();
  // tinyMCE.activeEditor.setContent("<h1><img src='uploads/logo2.png' alt='' width='295' height='468' />this is content</h1>");  
  //   alert( tinymce.get("disc").innerHtml);
  //  tinymce.get("disc").setContent("<h1>this is content</h1>");  
  //  alert( tinymce.get("disc").getContent());

    $('#id_n').val(<?php echo $post_data['0']['post_id'];?>);
    $('#title_n').val(<?php echo "\"".trim(preg_replace('/\s\s+/', ' ', $post_data['0']['post_title']))."\"";?>);
    $('#cat_n').val(<?php echo $post_data['0']['cat_id'];?>);
    $('#intro_n').val(<?php echo "\"".trim(preg_replace('/\s\s+/', ' ', $post_data['0']['post_intro']))."\"";?>);
    $('#publish_n').val(<?php echo $post_data['0']['publish_date'];?>);
    $('#old_img').attr("src",<?php echo "'".$post_data['0']['post_img']."'";?>);
    
    $('#disc').val(<?php echo "'".trim(preg_replace('/\s\s+/', ' ', $post_data['0']['post_content']))."'" ?>);

});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#old_img').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image2").change(function() {
  readURL(this);
});

</script>
<script>
 
$('#update').on('click', function() {
    tinyMCE.triggerSave();
    // tinymce.get("disc").setContent("<h1>this is content</h1>");  
    var title = $('#title_n').val();
    var intro = $('#intro_n').val();
    var content = $('#disc').val();
    var cat = $('#cat_n').val();
    if(title == '')
    {
       
        errMsg("Please enter post title");          
	  $('#title_n').focus(); //The focus function will move the cursor to "fullname" field
    }
    else if(cat == '0')
    {
	  errMsg('Please enter post category');
	  $('#cat_n').focus();
    }
    else if(content == '')
    {
	  errMsg('Please enter post conteent ');
	  $('#content_n').focus();
    }
    else if(intro == '')
    {
	  errMsg('Please enter post introduction');
	  $('#intro_n').focus();
    }
   
    else{
    var file_data = $('#image2').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('img', file_data);
    $.ajax({
        url: 'upload.php', 
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $("#img2").val(dataResult.path);
                var data = $("#update_post").serialize();
                $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/post_controller.php",
                    success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                sucMsg(dataResult.message); 
                            }
                            else if(dataResult.statusCode==201){
                               errMsg(dataResult.message);
                            }
                    }						
            });
        }
            else if(dataResult.statusCode==201){
                errMsg("somthing wrong");
            }
    }
     });
    }
});

</script>
