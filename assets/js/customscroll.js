function initializeScrollJS() {
	//custom scrollbar
        //for html
    jQuery("body").niceScroll({styler:"fb",cursorcolor:"#ffd400", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#ffd400", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    jQuery(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#ffd400", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
}

jQuery(document).ready(function(){
    initializeScrollJS();
    
});