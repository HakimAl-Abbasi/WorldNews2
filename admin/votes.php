<?php 
require "header.php";
require "fixedBar.php";
require "topBar.php";
?>

 <!-- Table to show voteegories -->
<div class="container-fluid mt-5" id="container-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover"  >
                    <a href="addVote.php"><button type="button" class="btn btn-secondary add-btn-btom float-right m-2 addvote " 
                     >
                      <i class="fa fa-plus m-1"></i>add new votes</button>    
                    </a>            
                    <thead >
                      <tr>
                        <th> No.</th>
                        <th> Question</th>
                        <th> Creator</th> 
                        <th> Create date</th>
                        <th> Status</th>
                        <th> Actions</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th> NO.</th>
                       <th> Question</th>
                        <th> Creator</th> 
                        <th> Create date</th>
                        <th> Status</th>
                        <th> Actions</th>
                    </tr>
                  </tfoot>
                  <tbody id="vote-body">
             
                  </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div> 
</div>


 <!-- moreInfo Modal view -->
<div class="modal fade" id="moreInfo_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content form-elegant">
      <div class="modal-header text-center" >
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-1" id="myModalLabel"><strong>Vote Details</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
        <div class="row">
      
          <table class="table">
             <thead>
               <tr>
                <th scope="col">NO.</th>
                <th scope="col">option</th>
                <th scope="col">#voters</th>
              </tr>
            </thead>
          <tbody id="moreInfo_body">
              
          </tbody>
          </table>
         
               
             
</div>
                  
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal view -->
<div class="modal fade" id="deletevoteegory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        url: "controllers/votes_controller.php",
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
                $('#deletevoteegory').modal('hide');
                sucMsg("category state successfully");
                load_data()						
            }
            else if(dataResult.statusCode==201){
               alert(dataResult);
            }
    }
    });
  });

  $(document).on("click", ".moreInfo", function() { 

    var options=JSON.parse($(this).attr("data-options"));
                // // alert(options);
                // var txt='';
                // $.each(options, function( i, option ) {
                //   txt+='('+option.voters+') '+option.option+'<br>';
                // });

          var start=$(this).attr("data-start");
          var end=$(this).attr("data-end");
          var dat=''
      $.each(options, function( index, row ) {
          
            dat+="<tr>"+
             "<td>"+index+"</td>"+
            "<td>"+row.option+"</td>"+
            "<td>"+row.voters+"</td>"+
            "</tr>";
          // });
        });
        // alert(dat);
        dat+="<tr><th colspan='3'>"+
        'Start Date:- <span id="startp" class="date ml-3">'+start+'</span><br>'+
        'End_ Date:- <span id="startp" class="date ml-3">'+end+'</span><br></th>'
          $("#moreInfo_body").html(dat);
          $('#moreInfo_model').modal('show');
            
  });

function load_data(){
		$.ajax({
			url:"controllers/votes_controller.php",
			method:"POST",
      data:{type:"1"},
			success:function(data)
			{
        var votes=JSON.parse(data);//vote_id	vote_question	vote_start	vote_end	vote_options	user_ids	create_by

        var tr='';
				$.each(votes, function( index, row ) {
               
                      tr+="<tr>"+
                  "<td>"+ (parseInt(index)+1) +"</td>"+
                  "<td>"+row.vote_question+"</td>"+
                  "<td>"+row.create_by+"</td>"+
                  "<td>"+row.create_date+"</td><td>"+
                  (row.vote_status==1?'active':'unActive')+
                  "</td><td>"+
                  "<a href='#deletevoteegory' data-toggle='modal' class='delete m-2' data-id='"+row.vote_id+"' data-state='"+
                  (row.vote_status==1?-1:1)+
                  "'>"+
                  "<i class='fas fa-check-square' style='color:darkslateblue;' data-toggle='tooltip'  title='"+
                  (row.vote_status==1?"Active":"unActive")+
                  "'></i></a>"+
                  "<a class='moreInfo' data-options='"+row.vote_options+"'"+
                  "data-start='"+row.vote_start+"' data-end='"+row.vote_end+"'>"+
                  "<i class='fas  fas fa-bookmark ' data-toggle='tooltip' style='color:darkslategrey;'	title='details'></i>"+
                  "</a></td></tr>"
                
           });
                  $('#vote-body').html(tr);
			}
		       });
}

</script>