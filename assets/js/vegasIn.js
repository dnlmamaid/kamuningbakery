var $body=$('body');

var backdrops=[
	{ src: '/kamuningbakery/assets/images/kb_facade.jpg', cover:true },
	{ src: '/kamuningbakery/assets/images/kamuning-bakery-6.jpg', cover:true },
	{ src: '/kamuningbakery/assets/images/home.jpg', cover:true },
	{ src: '/kamuningbakery/assets/images/products.jpg', cover:true },
	{ src: '/kamuningbakery/assets/images/users.jpg', cover:true },
];

function initializeVegas() {
	
	//Vegas
	$body.vegas({
		preload:true,
		animation: 'kenburns',
		transitionDuration:1000,
		cover: true,
		overlay: '/kamuningbakery/assets/vegas/overlays/04.png',
		slides: [
		    { src: '/kamuningbakery/assets/images/products.jpg', cover:true },
		]
	});
    
}

jQuery(document).ready(function(){
    initializeVegas();
    
});


	

