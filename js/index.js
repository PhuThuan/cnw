

$(document).ready(function() {
 
   $(window).scroll(function(){
       if ($(this).scrollTop() > 50) {
          $('#menu').addClass('test');
       } else {
          $('#menu').removeClass('test');
       }
   });
  });

