function initializeJS() {
	
	//clickable row
	 $(".clickable-row").click(function() {
	        window.document.location = $(this).data("href");
	});	
	
	//datepicker
	 $('#sdate').datetimepicker({
			format : 'YYYY-MM-DD',
	 });
	 
	 //forms
	 $('select[name="supplier_ID"]').bind('change',function(){
	    var showOrHide = ($(this).val() != 0) ? true : false;
	    $('#prodInfo').toggle(showOrHide);
 	});
	 //datepicker
	 $('#edate').datetimepicker({
			format : 'YYYY-MM-DD',
	 });
	   
	//searchboxanimate
	$('#searchbox').focus(function()
	{ 
	$(this).animate({
	    width: '300px'
	  }, 300, function() {
	    // Animation complete.
	  });
	});
	     
	$('#searchbox').blur(function()
	{ 
	$(this).animate({
	     width: '200px'
	   }, 300, function() {
	     // Animation complete.
	   });
	 });
	 
    //tool tips   
  	$('[data-toggle="tooltip"]').tooltip();

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
    
}

jQuery(document).ready(function(){
    initializeJS();
    
});