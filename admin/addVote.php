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
        <div class="card shadow-sm mb-4 mt-1">
          <div class="card-body p-0">
                <div class="login-form">
                <form id="vote_form" >
                    <div class="form-group">
                      <label>Question</label>
                      <textarea  id="ques" name="ques"  class="form-control" cols="30" rows="2" aria-describedby="emailHelp" required
                     ></textarea>
                    </div>
                    <fieldset style="border: 1px solid #d1d3e2;padding:15px;" class="mb-3" >
                      <legend style="width: 130px "><span class="btn btn-secondary add-option">
                       <i class="fas fa-plus">add option</i> 
                    </span></legend>
                    <div class="form-group">
                      <!-- <label>option 1</label> -->
                      <input type="text"   name="option[]" placeholder="option 1"  class="form-control"  required>
                    </div>
                    <div class="form-group">
                      <!-- <label>option 2</label> -->
                      <input type="text"   name="option[]" placeholder="option 2"  class="form-control"  required>
                    </div>
                    <div class="extra-options">

                    </div>
                    
                   
                    </fieldset>
                    <div class="row">
                  
                    <div class="form-group col-lg-6">
                        <label><?php echo lang('th4'); ?></label>
                        <input type="date" class="form-control" 
                         id="start"  name="start">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>publish time</label>
                        <input type="time" class="form-control" 
                         id="startt"  name="startt">
                    </div>

                    </div>
                    <div class="row">
                  
                    <div class="form-group col-lg-6">
                        <label>End_date</label>
                        <input type="date" class="form-control" 
                         id="end"  name="end">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>End time</label>
                        <input type="time" class="form-control" 
                         id="endt"  name="endt">
                    </div>

                    </div>
                
                    <input type="hidden" name="type" value="2">
                  </form>
                  <div class="form-group">
                     <button type="button" class="btn btn-primary" id="btn-add">confirm</button>
					          	<input type="button" class="btn btn-default" data-dismiss="modal" value="<?php echo lang('m1o2'); ?>">
                    </div>
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
   var i=3;
  $('.add-option').on('click',function(){
    // alert("jhhh");
    var options= $('.extra-options').html();
    // alert(options);
    options+=
    '<div class="form-group">'+
        '<input type="text"   name="option[]" placeholder="option'+ i +'"  class="form-control"  >'+
    '</div>';

    $('.extra-options').html(options);
    i++;

  })

 $('#btn-add').on('click', function() {
        // var parent= $('#parent').val();
        // var title= $('#title').val();
        // if(title == ''){
        //       errMsg('Please enter post voteegory name');
	      //       $('#title').css('border-color', '#cc0000');
        // }
        // else if(parent == 0){
        //       errMsg('Please enter  voteegory parent');
	      //       $('#parent').css('border-color', '#cc0000');
        // }
        // else{
         var data = $("#vote_form").serialize();
         alert(data);
             $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/votes_controller.php",
                    success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $('#addvote').modal('hide');
                                    sucMsg('<span style="padding:10px;font-size:18px;">'+
                                            'voteegory added successfully</span>'); 
                                    load_data();					
                                }
                                else if(dataResult.statusCode==201){
                                   alert(dataResult);
                                }
                        }						
                });
              // }
  });

</script>

