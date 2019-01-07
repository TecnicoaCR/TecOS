
	// Theme Panel Open/Close
	jQuery( "#theme-panel .panel-button" ).click(function(){
		jQuery( "#theme-panel" ).toggleClass( "close-theme-panel", "open-theme-panel", 1000 );
		jQuery( "#theme-panel" ).toggleClass( "open-theme-panel", "close-theme-panel", 1000 );
		return false;
	});
	//Navigation Color
	jQuery( "#theme-panel .menu-switcher-black" ).click(function(){
		 jQuery('#navigation , #navigation-fixed').removeClass('white-nav').addClass('dark-nav');
		return false;
	});

	jQuery( "#theme-panel .menu-switcher-white" ).click(function(){
		jQuery('#navigation , #navigation-fixed').removeClass('dark-nav').addClass('white-nav');
		return false;
	});

	
