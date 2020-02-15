<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/category_controller.php";
$cate=$category_controller->get_category_name();
?>

 <!-- Table to show categories -->
<div class="container-fluid mt-5" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4 ">
              <div class="col-lg-12">
              <button type="button" style="width: 175px;" class="btn btn-secondary add-btn-btom float-right m-1 mt-2 addcat " >
                          <i class="fa fa-plus m-1"></i><?php echo lang('caction1'); ?></button>  
              </div>   
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover" >
                              
                    <thead >
                      <tr>
                        <th><?php echo lang('cth0'); ?></th>
                        <th><?php echo lang('cth1'); ?></th>
                        <th><?php echo lang('cth2'); ?></th>
                        <th><?php echo lang('cth3'); ?></th> 
                        <th><?php echo lang('cth4'); ?></th> 
                        <th><?php echo lang('cth5'); ?></th>
                        <th><?php echo lang('cth6'); ?></th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th><?php echo lang('cth0'); ?></th>
                      <th><?php echo lang('cth1'); ?></th>
                      <th><?php echo lang('cth2'); ?></th>
                      <th><?php echo lang('cth3'); ?></th> 
                      <th><?php echo lang('cth4'); ?></th> 
                      <th><?php echo lang('cth5'); ?></th>
                      <th><?php echo lang('cth6'); ?></th>
                    </tr>
                  </tfoot>
                  <tbody id="cat-body">
             
                  </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div> 
</div>

 <!-- Add Modal view -->
<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
     
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('cm1'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
                  <form id="category_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label><?php echo lang('cth1'); ?></label>
                      <input type="text" class="form-control" id="title" name="title" >
                    </div>
                    <div class="form-group col-lg-12">
                      <label><?php echo lang('th2'); ?></label>
                      <select id="parent" name="parent"  class="form-control">
                        <option value="0">select category <?php echo lang('cth2'); ?></option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['cat_id']?>"><?php echo$cat['Cat_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  
                    <div class="modal-footer">
					            <input type="hidden" value="2" name="type">
					        	  <button type="button" class="btn btn-secondary" id="btn-add"><?php echo lang('m1o1'); ?></button>
					          	<input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m1o2'); ?>">
				          	</div>
                    <hr>
                  </form>
                  </div>
        </div>
    </div>
  </div>
</div>                


 <!-- History Modal view -->
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

<!-- edit Modal view -->
<div class="modal fade" id="editCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('cm3'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
        <form id="update_category" >
          <input type="hidden" name="id" id="cat_id" >
          <div class="row">
                  <div class="form-group col-lg-12">
                      <label><?php echo lang('cth1'); ?></label>
                      <input type="text" class="form-control" id="cat_title" name="title" >
                  </div>
                  <div class="form-group col-lg-12">
                      <label>Parent Category</label>
                      <select id="cat_parent" name="parent"  class="form-control">
                        <option value="0">No Parent</option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['cat_id']?>"><?php echo$cat['Cat_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="update"><?php echo lang('cm3o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('cm3o2'); ?>">
					          </div>
                    <hr>
         </form>
      </div>
        </div>
    </div>
  </div>
</div>

<!-- Delete Modal view -->

<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('cm2'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
      <input type="hidden" id="id_d" name="id" class="form-control">					
            <input type="hidden" id="state_d" name="state" class="form-control">				
            
        <form id="update_category" >
          <div class="row">
          <input type="hidden" id="id_d" name="id" class="form-control">					
						<input type="hidden" id="state_d" name="state" class="form-control">					
						<p><?php echo lang('cm2content'); ?></p>
                 
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="delete"><?php echo lang('cm2o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('cm2o2'); ?>">
					          </div>
                    <hr>
         </form>
      </div>
        </div>
    </div>
  </div>
</div>




  

<?php  require "footer.php"; ?>


<script>  
  $(document).ready(function(){  
      	load_data();
  });  

  $(".addcat").click(function(){
        $("#addcat").modal({
            backdrop: 'static',
            keyboard: false
        });
  });

  $('#btn-add').on('click', function() {
        var parent= $('#parent').val();
        var title= $('#title').val();
        if(title == ''){
              errMsg('Please enter post category name');
	            $('#title').css('border-color', '#cc0000');
        }
        else if(parent == 0){
              errMsg('Please enter  category parent');
	            $('#parent').css('border-color', '#cc0000');
        }
        else{
         var data = $("#category_form").serialize();
             $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/category_controller.php",
                    success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $('#addcat').modal('hide');
                                    sucMsg('category added successfully'); 
                                    load_data();					
                                }
                                else if(dataResult.statusCode==201){
                                   alert(dataResult);
                                }
                        }						
                });
              }
  });

  $('#update').on('click', function() {
                var data = $("#update_category").serialize();
                $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/category_controller.php",
                    success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $('#editCat').modal('hide');
                                sucMsg('<span>Category updated successfully !</span>');
                                load_data();							
                            }
                            else if(dataResult.statusCode==201){
                               alert(dataResult);
                            }
                    }						
            });
  });

  $(document).on('click','.update',function(e) {
    var id=$(this).attr("data-id");
    var title=$(this).attr("data-title");
    var parent=$(this).attr("data-parent");
   
    $('#cat_id').val(id);
    $('#cat_title').val(title);
    $('#cat_parent').val(parent);   
  });

  $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    var state=$(this).attr("data-state");
    $('#id_d').val(id);
    $('#state_d').val(state);
  });

  $(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/category_controller.php",
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
                $('#deleteCategory').modal('hide');
                sucMsg("category disabled successfully");
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
			url:"controllers/category_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{
        var cats=JSON.parse(data);
        var tr='';
				$.each(cats, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.Cat_name+"</td>"+
                  "<td>"+row.parent+"</td>"+
                  "<td>"+row.update_date+"</td>"+
                  "<td>"+row.updated_by+"</td><td>"+
                  (row.category_statu==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='#editCat' class='update' data-toggle='modal' data-id='"+row.cat_id+"' "+
                  "data-title='"+row.Cat_name+"' data-parent='"+row.parent+"'>"+
                  "<i class='fas  fa-edit text-secondary' data-toggle='tooltip' 	title='Edit'></i>"+
                  " </a>"+
                  "<a href='#deleteCategory' data-toggle='modal' class='delete m-2' data-id='"+row.cat_id+"' data-state='"+
                  (row.category_status==1?-1:1)+
                  "'>"+
                  "<i class='"+
                  (row.category_status==-1?"fas fa-trash":"fas fa-check-square")+
                 "' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.category_status==1?"Active":"unActive")+
                  "'></i></a>"+
                  "<a class='history' data-updates='"+row.updates+"'>"+
                  "<i class='fas  fas fa-history ' data-toggle='tooltip' style='color:darkslategrey;'	title='details'></i>"+
                  "</a></td></tr>"
                
           });
                  $('#cat-body').html(tr);
			}
		       });
}

</script>