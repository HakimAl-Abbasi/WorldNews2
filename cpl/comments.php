<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
include "time.php";
?>


 <!-- Table to show breakegories -->
 <div class="container-fluid mt-5" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                
               <div class="table-responsive p-3">
                 <table class="table align-items-center table-flush table-hover" id="dataTableHover">        
                    <thead >
                      <tr>
                        <th>No.</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>User Name</th> 
                        <th>post_id</th> 
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No.</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>User Name</th> 
                        <th>post id</th> 
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody id="break-body">
             
                  </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div> 
</div>



  <!-- add Modal HTML -->
<div class="modal fade" id="addbreak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong><?php echo lang('bm1'); ?></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
                  <form id="break_form" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label><?php echo lang('bth1'); ?></label>
                      <textarea  rows="6" class="form-control" id="contentB" name="contentB" >
                      </textarea>
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
					            <input type="hidden" value="2" name="type">
					        	  <button type="button" class="btn btn-secondary" id="btn-add"><?php echo lang('cm1o1'); ?></button>
					          	<input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('cm1o2'); ?>">
				          	</div>
                    <hr>
                  </form>
                  </div>
        </div>
    </div>
  </div>
</div>



<!-- Delete Modal HTML -->
<div class="modal fade" id="deletebreak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>Approve/Delete Comments</strong></h3>
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
						<p>Are you sure you want to change state of this comments?</p>
                 
                    <div class="modal-footer">
					             <input type="hidden" value="3" name="type">
						           <button type="button" class="btn btn-secondary" id="delete"><?php echo lang('bm2o1'); ?></button>
						           <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('bm2o2'); ?>">
					          </div>
                    <hr>
         </form>
      </div>
        </div>
    </div>
  </div>
</div>


  <?php        require "footer.php";
?>
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
        url: "controllers/comments_controller.php",
        type: "POST",
        cache: false,
        data:{
            type:3,
            id: $("#id_d").val(),
            state:$('#state_d').val(),
            
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#deletebreak').modal('hide');
                sucMsg("break status changed disabled successfully");
                load_data()						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    }
    });
  });
//comm_id	comm_content	comm_date	user_id	comm_status	post_id	approv_by

 
function load_data(){
		$.ajax({
			url:"controllers/comments_controller.php",
			method:"POST",
      data:{type:"4"},
     
			success:function(data)
			{		
        var breaks=JSON.parse(data);
        var tr='';
				$.each(breaks, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.comm_content+"</td>"+
                  "<td>"+timeConverter(row.comm_date)+"</td>"+
                  "<td>"+row.Full_Name+"</td>"+
                  "<td>"+row.Post_ID+"</td><td>"+
                  (row.comm_status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='#deletebreak' data-toggle='modal' class='delete m-2' data-id='"+row.comm_id+"' data-state='"+
                  (row.comm_status==1?-1:1)+
                  "'>"+
                  "<i class='"+(row.comm_status==1?'fas fa-trash':'fas fa-check-square')+"' style='color:darkslateblue;' data-toggle='tooltip'  title='change status'"+
                  "'></i></a>"+
                  "</td></tr>"
                
           });
                  $('#break-body').html(tr);
			}
		       });
}

</script>