<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
require "controllers/group_controller.php";
  $privs=$group__controller->get_privs();
  $old_val=$group__controller->get_one($_GET['id']);
  $old_priv=json_decode($old_val[0]['privllages_id']);
  // print_r($old_priv);

?>
  <div class="container-fluid" id="container-wrapper">
       <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm mb-4 mt-1">
          <div class="card-body p-0">
                <div class="login-form">
                <form id="update_group" >
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label>name</label>
                      <input type="hidden" value="3" name="type">
                      <input type="hidden" value="<?php echo $_GET['id']  ?>" name="id">
                      <input type="text" class="form-control" id="name" value="<?php echo $old_val[0]['group_name']  ?>" name="name" >
                    </div>
                    <div class="form-group col-lg-12">
                       <label for="sel2">Mutiple select list (hold shift to select more than one):</label><br>
                        <?php foreach($privs as $priv){?>
                          <input type="checkbox" class="m-2" name="privllages_id[]" <?php if(in_array($priv['prv_id'],$old_priv)) echo"checked"?>
                          id="privllages_id" value="<?php echo$priv['prv_id']?>"><?php echo$priv['prv_name']?><br>
                        <?php } ?>
                    </div>
                  </div>                    
                    <hr>
                  </form>  
                          <button type="button" class="btn btn-secondary" id="update"><?php echo lang('m1o1'); ?></button>
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m1o2'); ?>">
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
$('#update').on('click', function() {
                var data = $("#update_group").serialize();
                $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/group_controller.php",
                    success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $('#editgroup').modal('hide');
                                sucMsg('<span>group updated successfully !</span>');
                                load_data();							
                            }
                            else if(dataResult.statusCode==201){
                               alert(dataResult);
                            }
                    }						
            });
  });



</script>
