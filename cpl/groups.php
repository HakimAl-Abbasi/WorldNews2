<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "time.php";
?>

 <!-- Table to show categories -->
<div class="container-fluid mt-5" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4 ">
              <div class="col-lg-12">
              <a href="addGroup.php"> <button type="button" style="width: 175px;" class="btn btn-secondary add-btn-btom float-right m-1 mt-2 addgroup " >
                          <i class="fa fa-plus m-1"></i>Add group</button>  </a>
              </div>   
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover" >
                              
                    <thead >
                      <tr>
                        <th>No.</th>
                        <th>Group name</th>
                        <th>Create by</th> 
                        <th>Create date </th> 
                        <th><?php echo lang('cth5'); ?></th>
                        <th><?php echo lang('cth6'); ?></th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No.</th>
                        <th>Group name</th>
                        <th>Create by</th> 
                        <th>Create date </th> 
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
<div class="modal fade" id="editgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          <input type="hidden" name="id" id="group_id" >
          <div class="row">
                  <div class="form-group col-lg-12">
                      <label><?php echo lang('cth1'); ?></label>
                      <input type="text" class="form-control" id="cat_title" name="title" >
                  </div>
                  <div class="form-group col-lg-12">
                      <label>privllages_id Category</label>
                      <select id="cat_privllages_id" name="privllages_id"  class="form-control">
                        <option value="0">No privllages_id</option>
                        <?php foreach($cate as $cat){?>
                          <option value="<?php echo$cat['group_id']?>"><?php echo$cat['group_name']?></option>
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

<div class="modal fade" id="deleteGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


  $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    var state=$(this).attr("data-state");
    $('#id_d').val(id);
    $('#state_d').val(state);
  });

  $(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/group_controller.php",
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
                $('#deleteGroup').modal('hide');
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
			url:"controllers/group_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{
        var cats=JSON.parse(data);
        var tr='';
				$.each(cats, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.group_name+"</td>"+
                  "<td>"+row.create_by+"</td>"+
                  "<td>"+timeConverter(row.group_date)+"</td><td>"+
                  (row.group_status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='editgroup.php?id="+row.group_id+"' class='update'  data-id='"+row.group_id+"' "+
                  "data-title='"+row.group_name+"' data-privllages_id='"+row.privllages_id+"'>"+
                  "<i class='fas  fa-edit text-secondary' data-toggle='tooltip' 	title='Edit'></i>"+
                  " </a>"+
                  "<a href='#deleteGroup' data-toggle='modal' class='delete m-2' data-id='"+row.group_id+"' data-state='"+
                  (row.group_status==1?-1:1)+
                  "'>"+
                  "<i class='"+
                  (row.group_status==1?"fas fa-trash":"fas fa-check-square")+
                 "' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.group_status==1?"Active":"unActive")+
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