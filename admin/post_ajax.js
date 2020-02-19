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


$(document).on('click','.more',function(e) {
    var intro=$(this).attr("data-intro");
    var content=$(this).attr("data-content");
    var create=$(this).attr("data-create");
    var publish=$(this).attr("data-publish");
    var img=$(this).attr("data-img");
    $('#int').html(intro);
    $('#cont').html(content);
    $('#pub').html(publish);
    $('#cre').html(create);
    $('#im').attr('src',img);
   
});



$('#update').on('click', function() {
    tinyMCE.triggerSave();
    // tinymce.get("disc").setContent("<h1>this is content</h1>");  
    var title = $('#title_n').val();
    var intro = $('#intro_n').val();
    var content = $('#disc').val();
    var cat = $('#cat_n').val();
    if(title == '')
    {
       
        errMsg("Please enter post title");          
	  $('#title_n').focus(); //The focus function will move the cursor to "fullname" field
    }
    else if(cat == '0')
    {
	  errMsg('Please enter post category');
	  $('#cat_n').focus();
    }
    else if(content == '')
    {
	  errMsg('Please enter post conteent ');
	  $('#content_n').focus();
    }
    else if(intro == '')
    {
	  errMsg('Please enter post introduction');
	  $('#intro_n').focus();
    }
   
    else{
    var file_data = $('#image2').prop('files')[0];   
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
                $("#img2").val(dataResult.path);
                var data = $("#update_form").serialize();
                $.ajax({
                    data: data,
                    type: "post",
                    url: "controllers/post_controller.php",
                    success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                errMsg(dataResult.message); 
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
    $('#id_d').val(id);
    $('#state_d').val(state);
    
});

$(document).on("click", ".history", function() { 
    var id=$(this).attr("data-id");
    $.ajax({
        url: "controllers/post_controller.php",
        type: "POST",
        cache: false,
        data:{
            type:6,
            id: id,
            
        },
        success: function(dataResult){
            var u=dataResult.split('^');
            // $.each(u, function(index, value) { 
            //     alert(index + ': ' + value);
            //   });
        var j=JSON.parse(u[0]);
        alert(j.date);

           
    }
    });
   
    
});

$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "controllers/post_controller.php",
        type: "POST",
        cache: false,
        data:{
            type:7,
            id: $("#id_d").val(),
            state:$('#state_d').val(),
            
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#deletePost').modal('hide');
                errMsg(dataResult.message); 
                location.reload();						
            }
            else if(dataResult.statusCode==201){
                errMsg(dataResult.message);
            }
    }
    });
});





$(document).on("click", "#delete_multiple", function() {
    var post = [];
    $(".post_checkbox:checked").each(function() {
        post.push($(this).data('post-id'));
    });
    if(post.length <=0) {
        errMsg("Please select records."); 
    } 
    else { 
        WRN_PROFILE_DELETE = "Are you sure you want to delete "+(post.length>1?"these":"this")+" row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            var selected_values = post.join(",");
            errMsg(selected_values);
            $.ajax({
                type: "POST",
                url: "./controllers/post_controller.php",
                cache:false,
                data:{
                    type: 4,						
                    id : selected_values
                },
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        errMsg('Data deleted successfully !'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                        errMsg("somthing wrong");
                    }
            }
            }); 
        }  
    } 
});





$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });
});
