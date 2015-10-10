function initializeJS() {
	
	//clickable row
	 $(".clickable-row").click(function() {
	        window.document.location = $(this).data("href");
	});	

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    $(document).ready(function () {
	  var trigger = $('.hamburger'),
	      overlay = $('.overlay'),
	     isClosed = false;
	
	    trigger.click(function () {
	      hamburger_cross();      
	    });
	
	    function hamburger_cross() {
	
	      if (isClosed == true) {          
	        overlay.hide();
	        trigger.removeClass('is-open');
	        trigger.addClass('is-closed');
	        isClosed = false;
	      } else {   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
	        $('#wrapper').toggleClass('toggled');
	  });  
	});
    
    //Vegas
	$('body').vegas({
		overlay: 'assets/vegas/overlays/05.png',
		slides: [
			
		    { src: 'assets/images/kb_facade.jpg' },

		]
	});
		
    
}

jQuery(document).ready(function(){
    initializeJS();
    
});