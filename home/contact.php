<?php 
require_once "header.php";
require_once "breaks.php";

?>



<section>
<div class="container-flauid mr-4 ml-5 p-3" >
    
    <div class="row " style=" background:#fff; "  >
        
        <div class="col-lg-7  pr-5">
            <h2 class="card-title" style="width:360px;"> Send Us Messge</h2>
  <div class="container mt-3">
<form id="contact_form" >
              <input type="hidden" name="type" value="2">
              <div class="row">
                  <div class="col-md-6 form-group">
                      <label for="fname">First Name*</label>
                      <input type="text" id="fname" name="fname" class="form-control form-control-lg">
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="lname">Last Name*</label>
                      <input type="text" id="lname" name="lname" class="form-control form-control-lg">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="eaddress">Email Address</label>
                      <input type="email" name="email" id="emailadd" class="form-control form-control-lg">
                  </div>
                 
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" cols="30"  rows="10" class="form-control"></textarea>
                  </div>
              </div>

            </form>
            
            <div class="row">
                <div class="col-12 ">
                    <button  id="btn-add"  style="background-color: #212529; color:white" class="btn btn-default py-3 px-5 btn-add">
                    Send Message</button>
                </div>
            </div>
        


        </div>

  </div>
  <div class="col-lg-5 pl-4 mt-4" style="border-left: 1px #d0cbcb solid;">
				<div class="pt-4 ">
					<div class="txt1">
						<span class="fa fa-map-marker iicon"></span>
					

						<span class="txt1 p-5">
                            Address
						</span>
                    </div>
                <div class="ml-5 mt-3 mr-5">
						<span class="txt2 ">
							Ininite Center 8th floor, 379 dept St, Sana'a Yemen.
						</span>
					</div>
				</div>
             
             <div class="pt-4 ">
					<div class="txt1">
						<span class="fa fa-phone iicon"></span>
					

						<span class="txt1 p-5">
                        Lets Talk
						</span>
                    </div>
                <div class="ml-5 mt-3 mr-5">
						<span class="txt3 ">
							+967 777 777 777
						</span>
					</div>
                </div>
                <div class="pt-4 ">
					<div class="txt1">
						<span class="fa fa-envelope iicon"></span>
					

						<span class="txt1 p-5">
                        General Support
						</span>
                    </div>
                <div class="ml-5 mt-3 mr-5">
						<span class="txt3 ">
						      adnim@ininiteNews.com
						</span>
					</div>
				</div>

			
				
			</div>
		</div>
 
    </div>

</div>

</section>


<script>
 $('.btn-add').on('click', function() {
     alert($("#contact_form").serialize());
        var fn= $('#fname').val();
        var ln= $('#lname').val();
        var email= $('#emailadd').val();
        var msg= $('#msg').val();
        if(fn == ''){
              alert('Please enter your first name');
	            $('#fname').css('border-color', '#cc0000');
        }
        else if(ln == ''){
              alert('Please enter  your last name');
	            $('#lname').css('border-color', '#cc0000');
        }
        else if(email == ''){
              alert('Please enter your email');
	            $('#emailadd').css('border-color', '#cc0000');
        }
        else if(msg == ''){
              alert('Please enter  your message');
	            $('#message').css('border-color', '#cc0000');
        }
        else{
         var data = $("#contact_form").serialize();
             $.ajax({
                    data: data,
                    type: "post",
                    url: "../admin/controllers/message_controller.php",
                    success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $('#addcat').modal('hide');
                                    alert('Your message sent successfully, thanks for your time'); 
                                    				
                                }
                                else if(dataResult.statusCode==201){
                                   alert(dataResult);
                                }
                        }						
                });
              }
  });

</script>
<?php require_once"footer.php" ?>