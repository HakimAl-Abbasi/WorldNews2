<!-- Footer -->
<footer class="page-footer font-small cyan darken-3 mt-5" style="background-color: #fff;">

  <!-- Footer Elements -->
  <div class="container">
 
    <!-- Grid row-->
    <div class="row">
       <div class="col-lg-12 text-center">
                    <a href="#" class="fa fa-facebook  mt-3 mb-2 font"></a>
                    <a href="#" class="fa fa-twitter ml-5  mt-3 mb-2 font"></a>
                    <a href="#" class="fa fa-instagram ml-5  mt-3 mb-2 font "></a>
<br>
                    <span>copyright &copy; 2020 - developed by
              <b><a href="https://github/HakimAlabbasi/worldnews" target="_blank">hakim alabbasi</a></b>
            </span>
            <br>
            <br>
          </div>
    </div>
    <!-- Grid row

  </div>
   Footer Elements -->

  <!-- Copyright -->
  <!-- <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> Ibtehal Fahd</a>
  </div> -->
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script>


  //fixed bar
function openNav() {
  document.getElementById("mySidebar").style.width = "300px";
  
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}
</script>
      
      
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
 
<script>

$(".signup").click(function(){
        $("#signup").modal({
            backdrop: 'static',
            keyboard: false
        });
  });

  $('#btn-add').on('click', function() {
        var content= $('#un').val();
        var email= $('#email').val();
        var pass= $('#pass').val();
        if(content == '                      '){
              alert('Please enter your name ');
	            $('#un').css('border-color', '#cc0000');
        }
        else if(email == ''){
              alert('Please enter your email ');
	            $('#email').css('border-color', '#cc0000');
        }
        else if(pass == ''){
              alert('Please enter your password ');
	            $('#pass').css('border-color', '#cc0000');
        }
        else{
         var data = $("#break_form").serialize();
            $.ajax({
                    data: data,
                    type: "post",
                    url: "../admin/controllers/user_controller.php",
                    success: function(dataResult){
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                    $('#signup').modal('hide');
                                    alert('Your account added successfully, wait for activation'); 
                                    // load_data();					
                                }
                                else if(dataResult.statusCode==201){
                                   alert(dataResult);
                                }
                        }						
                });
              }
  });
  $(".login").click(function(){
        $("#login").modal({
            backdrop: 'static',
            keyboard: false
        });
  });

  $('#btn-login').on('click', function() {
        var email= $('#emaillog').val();
        var pass= $('#passlog').val();
        if(email == ''){
              alert('Please enter your email ');
	            $('#emaillog').css('border-color', '#cc0000');
        }
        else if(pass == ''){
              alert('Please enter your password ');
	            $('#passlog').css('border-color', '#cc0000');
        }
        else{
         var data = $("#login_form").serialize();
            $.ajax({
                    data: data,
                    type: "post",
                    url: "../admin/controllers/user_controller.php",
                    success: function(dataResul){
                               var dataResul = JSON.parse(dataResul);
                                if(dataResul.statusCode==200){
                                   
                                    location.reload();

                                    $('#login').modal('hide');
                                    // load_data();					
                                }
                                else if(dataResul.statusCode==204){
                                   alert(dataResul.message);
                                }
                        }						
                });
              }
  });

  $('#btn-comm').on('click', function() {
        var comm= $('#comment').val();
        if(comm != ''){
         var data = $("#comm_form").serialize();
            $.ajax({
                    data: data,
                   
                    type: "post",
                    url: "../admin/controllers/comments_controller.php",
                    success: function(dataResult){
                      
                                var dataResult = JSON.parse(dataResult);
                                if(dataResult.statusCode==200){
                                   alert(dataResult.message); 
                                   location.reload();

                               
                                }
                                else if(dataResult.statusCode==204){
                                   alert(dataResult.message);
                                   location.reload();
                                }
                        }						
                });
              }
  });
</script>


</body>
</html>