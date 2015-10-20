function initializeVegas() {
	
	//Vegas
	$('body').vegas({
		overlay: '/kamuningbakery/assets/vegas/overlays/05.png',
		slides: [
		    { src: '/kamuningbakery/assets/images/kb_facade.jpg' },

		]
	});
    
}

jQuery(document).ready(function(){
    initializeVegas();
    
});