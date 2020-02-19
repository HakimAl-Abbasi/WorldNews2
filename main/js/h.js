$( window ).scroll(function(){
    var windowSize = $(window).width();
    if(windowSize<980){
    var st = $(this).scrollTop();
   if (st ==0){
       // downscroll code
       $('#Scroll').removeClass('navs').fadeIn(5000);
   } else {
      // upscroll code

      $('#Scroll').addClass('navs').fadeIn(5000);
      $('.navs').fadeIn(2000);
   }
}else{
  $('.navs').fadeOut(1000);
    $('#Scroll').removeClass('navs').fadeIn(5000);
}

//$('#Scroll').addClass('navs').fadeOut( "slow" );
});
/* 
$(window).ready(function() {
    $( "#Scroll" ).animate({
      left:100,
    },2000,function() {
      $( "#Scroll" ).animate({
        left:0,
      
      });
   
    });
$('#search').animate({
 
    right:100,
  },2000,function() {
    $( "#search" ).animate({
      left:0,
    
    });
 
});


});
*/