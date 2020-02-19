<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
?>

        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
       
          <!-- Row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
              <div class="col-lg-12">
              <button type="button" style="width: 175px;" class="btn btn-secondary add-btn-btom float-right  mt-2 addpost " >
                          <i class="fa fa-plus m-1"></i><?php echo lang('baction1'); ?></button>  
              </div> 
                <div class="card-header py-3 d-flex flex-row  ">
               
                </div>
                
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead >
                      <tr>
                        <th><?php echo lang('th0'); ?></th>
                        <th><?php echo lang('th1'); ?></th>
                        <th><?php echo lang('th2'); ?></th>
                        <!-- <th><?php echo lang('th3'); ?></th> -->
                        <!-- <th><?php echo lang('th4'); ?></th> -->
                        <th><?php echo lang('th5'); ?></th>
                        <th><?php echo lang('th6'); ?></th>
                        <th><?php echo lang('th7'); ?></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th><?php echo lang('th0'); ?></th>
                        <th><?php echo lang('th1'); ?></th>
                        <th><?php echo lang('th2'); ?></th>
                        <!-- <th><?php echo lang('th3'); ?></th> -->
                        <!-- <th><?php echo lang('th4'); ?></th> -->
                        <th><?php echo lang('th5'); ?></th>
                        <th><?php echo lang('th6'); ?></th>
                        <th><?php echo lang('th7'); ?></th>
                      </tr>
                    </tfoot>
                    <tbody id="post-body" >
                                   
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> 
        </div>





<div class="modal fade" id="history_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('cm4'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
        <dl class="row">
          <table class="table">
             <thead>
               <tr>
                <th scope="col">BY</th>
                <th scope="col">Affected</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
          <tbody id="history_body">
    
          </tbody>
          </table>
        </dl>
              
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal HTML -->

  <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('m2'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <input type="hidden" id="id_d" name="id" class="form-control">					
            <input type="hidden" id="state_d" name="state" class="form-control">				
            
        <form id="update_post" >
          <div class="row">
          <input type="hidden" id="id_d" name="id" class="form-control">					
						<input type="hidden" id="state_d" name="state" class="form-control">					
						<p><?php echo lang('m2content'); ?></p>
                 
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="delete"><?php echo lang('m2o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m2o2'); ?>">
					          </div>
                    <hr>
         </form>
      </div>
        </div>
    </div>
  </div>
</div>

<!--add post model-->

     <div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('bm2'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <input type="hidden" id="id_d" name="id" class="form-control">					
            <input type="hidden" id="state_d" name="state" class="form-control">				
            
                <form id="post_form" >
                    <div class="form-group">
                      <label><?php echo lang('th1'); ?></label>
                      <textarea  id="title" name="title"  class="form-control" cols="30" rows="1" aria-describedby="emailHelp" required
                     ></textarea>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                      <label><?php echo lang('th2'); ?></label>
                      <input type="hidden" name="type" value="3">
                      <select id="cat" name="cat"  class="form-control">
                        <option value="0">select post category</option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['cat_id']?>"><?php echo$cat['Cat_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label><?php echo lang('th4'); ?></label>
                        <input type="date" class="form-control" 
                        placeholder="Repeat Password" id="publish"  name="publish">
                    </div>
                    </div>
                   <div class="form-group">
                      <label><?php echo lang('th10'); ?></label>
                      <input type="file" class="form-control" id="image" name='image' >
                      <input type="hidden" class="form-control" id="img" name='img' >
                   </div>
                    <div class="form-group">
                      <label><?php echo lang('th8'); ?></label>
                      <textarea  id="intro" name='intro'  class="form-control" cols="30" rows="3" aria-describedby="emailHelp"
                       ></textarea>
                    </div>
                    <div class="form-group">
                      <label><?php echo lang('th9'); ?></label>
                      <textarea  id="disc" name='content'  class="form-control" cols="30" rows="10" aria-describedby="emailHelp"
                       ></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                      <label><?php echo lang('bth2'); ?></label>
                      <input type="date" class="form-control" id="start" name="start" >
                    </div>
                    <div class="form-group col-lg-12">
                      <label><?php echo lang('bth3'); ?></label>
                      <input type="date" class="form-control" id="end" name="end" >
                    </div>
               
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="delete"><?php echo lang('bm2o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('bm2o2'); ?>">
					          </div>
                    <hr>
                  </form>
                  <div class="form-group">
                      <button  class="btn btn-primary btn-block" id="btn-add"><?php echo lang('m1o1'); ?></button>
                    </div>
                    </div>
                    <hr>
                  <hr>
                </div>
          </div>
        </div>

     </div> 


<?php  require "footer.php"; ?>


<script>  
  $(document).ready(function(){  
      	load_data();
  });  
$(".addpost").click(function(){
  $('#contentB').val("");
         $('#start').val("");
        $('#end').val("");
        $("#addpost").modal({
            backdrop: 'static',
            keyboard: false
          
        });

});
$('#btn-add').on('click', function() {
    tinyMCE.triggerSave();
    var title = $('#title').val();
    var intro = $('#intro').val();
    var content = $('#disc').val();
    var cat = $('#cat').val();
    var img = $('#image').val();
    
    if(title == '')
    {
	  errMsg('Please enter post title ');
	  $('#title').focus(); //The focus function will move the cursor to "fullname" field
    }
    else if(cat == '0')
    {
	  errMsg('Please enter post category');
	  $('#cat').focus();
    }
    else if(img == '')
    {
	  errMsg('Please enter post image ');
	  $('#image').focus();
    }
    else if(intro == '')
    {
	  errMsg('Please enter post introduction');
	  $('#intro').focus();
    }
    else if(content == '')
    {
	  errMsg('Please enter post discription');
	  $('#content').focus();
    }
   
    else{
        var file_data = $('#image').prop('files')[0];   
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
                    $("#img").val(dataResult.path);
                    var data = $("#post_form").serialize();
                    $.ajax({
                        data: data,
                        type: "post",
                        url: "controllers/post_controller.php",
                        success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                errMsg(dataResult.message); 
                                location.reload();						
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


  $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    var state=$(this).attr("data-state");
    alert(id);
    $('#id_d').val(id);
    $('#state_d').val(state);
  });

  $(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/post_controller.php",
        type: "POST",
        cache: false,
        data:{
            type:4,
            id: $("#id_d").val(),
            state:$('#state_d').val(),
            
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#deletePost').modal('hide');
                sucMsg("post disabled successfully");
                load_data()						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    }
    });
  });

  $(document).on("click", ".history", function() { 
    
          var updates=$(this).attr("data-updates");
          var upobject=JSON.parse(updates);
          var dat=''
      $.each(upobject, function( index, row ) {
            // $.each(value, function( i, row ) {
          
            dat+="<tr>"+
            // "<td>"+index+"</td>"+
            "<td>"+row.by+"</td>"+
            "<td>"+row.affected_data+"</td>"+
            "<td>"+row.date+"</td>"+
            "</tr>";
          // });
        });
        // alert(dat);
          $("#history_body").html(dat);
          $('#history_model').modal('show');
            
  });

function load_data(){
		$.ajax({
			url:"controllers/post_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{

        var posts=JSON.parse(data);
        var tr='';
				$.each(posts, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.post_title+"</td>"+
                  "<td>"+row.cat_name+"</td>"+
                  "<td>"+row.create_by+"</td><td>"+
                  (row.post_status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='updatePost.php?id="+row.post_id+"' class='update'>"+
                        "<i class='fas  fa-edit text-secondary' title='Edit'></i></a>"+
                  "<a href='#deletePost' data-toggle='modal' class='delete m-2' data-id='"+row.post_id+"' data-state='"+
                  (row.post_status==1?-1:1)+
                  "'>"+
                  "<i class='"+
                  (row.post_status==1?"fas fa-trash":"fas fa-check-square")+
                 "' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.post_status==1?"Active":"unActive")+
                  "'></i></a>"+
                  "<a class='history' data-updates='"+row.updates+"'>"+
                  "<i class='fas  fas fa-history ' data-toggle='tooltip' style='color:darkslategrey;'	title='details'></i>"+
                  "</a>"+
                  "<a href='../main/post.php?id="+row.post_id+"' class='more m-1'>"+
                        "<i class='fas  fa-bookmark text-secondary' title='details'></i></a>"+
                  "</a></td></tr>";
           });
                  $('#post-body').html(tr);
			}
		       });
}

</script>
    