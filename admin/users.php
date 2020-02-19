<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";

?>

 <!-- Table to show categories -->
 <div class="container-fluid mt-5" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover"  >            
                    <thead >
                      <tr>
                      <th><?php echo lang('uth1'); ?></th>
                        <th><?php echo lang('uth2'); ?></th>
                        <th><?php echo lang('uth3'); ?> </th>
                        <th><?php echo lang('uth4'); ?></th>
                        <th><?php echo lang('uth5'); ?></th>
                        <th><?php echo lang('uth7'); ?></th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th><?php echo lang('uth1'); ?></th>
                        <th><?php echo lang('uth2'); ?></th>
                        <th><?php echo lang('uth3'); ?> </th>
                        <th><?php echo lang('uth4'); ?></th>
                        <th><?php echo lang('uth5'); ?></th>
                        <th><?php echo lang('uth7'); ?></th>
                    </tr>
                  </tfoot>
                  <tbody id="user-body">
             
                  </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div> 
</div>


   


  <div id="editPri" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

						
					<div class="modal-header">						
						<h4 class="modal-title "><?php echo lang('cm2'); ?></h4>
						<button type="button" class="close mr-5" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
            <form id="editPri_form" >
              <div class="form-group">
            <input type="hidden" id="user_id" name="id" class="form-control">	
            <input type="hidden" name="type" value="2" class="form-control">	
            			<label for="priv">Choose new privallege:</label>	
						<select name="priv" id="priv" class="form-control">
              <option value="1">user</option>
              <option value="2">publisher</option>
              <option value="3">admin</option>
            </select>			
            </div>		
            </form>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-info" id="update" value="<?php echo lang('m3o1'); ?>">
						<button type="button" class="btn btn-danger"  data-dismiss="modal"><?php echo lang('m3o2'); ?></button>
					</div>
			</div>
		</div>
  </div>


  <div id="deleteUser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title "><?php echo lang('um2'); ?></h4>
						<button type="button" class="close mr-5" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<input type="hidden" id="state_d" name="state" class="form-control">					
						<p><?php echo lang('um2content'); ?></p>
						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-info" id="delete" value="<?php echo lang('um2o1'); ?>">
						<button type="button" class="btn btn-danger"  data-dismiss="modal"><?php echo lang('um2o2'); ?></button>
					</div>
				</form>
			</div>
		</div>
  </div>

<?php        require "footer.php";
?>
<script>  
  $(document).ready(function(){  
      	load_data();
  });  

  $('#update').on('click', function() {
                var data = $("#editPri_form").serialize();
                $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/user_controller.php",
                    success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $('#editPri').modal('hide');
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
    var priv=$(this).attr("data-priv");
    var id=$(this).attr("data-id");
   
    $('#user_id').val(id);
    $('#priv').val(priv);
  });

  $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    var state=$(this).attr("data-state");
    $('#id_d').val(id);
    $('#state_d').val(state);
  });

  $(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/user_controller.php",
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
                $('#deleteUser').modal('hide');
                sucMsg("user state changed successfully");
                load_data()						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    }
    });
  });

function load_data(){
		$.ajax({
			url:"controllers/user_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{
        var cats=JSON.parse(data);
        var tr='';
        //user_full_name , user_pass , user_email , user_phone ,register_date ,user_status ,user_group_id ,activiate_by
				$.each(cats, function( index, row ) {
                      tr+="<tr>"+
                  "<td>"+row.Full_Name+"</td>"+
                  "<td>"+row.User_Email+"</td>"+
                  "<td>"+row.User_Phone+"</td>"+
                  "<td>"+row.Register_Date+"</td><td>"+
                  (row.User_Status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='#editPri' class='update' data-toggle='modal' data-id='"+row.user_id+"' "+
                  "data-priv='"+row.user_group_id+"'>"+
                  "<i class='fas  fa-edit text-secondary' data-toggle='tooltip' 	title='Edit'></i>"+
                  " </a>"+
                  "<a href='#deleteUser' data-toggle='modal' class='delete m-2' data-id='"+row.user_id+"' data-state='"+
                  (row.User_Status==1?-1:1)+
                  "'>"+
                  "<i class='fas fa-check-square' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.User_Status==1?"Active":"unActive")+
                  "'></i></a>"+
                  "</td></tr>"
                
           });
                  $('#user-body').html(tr);
			}
		       });
}

</script>
