
 /* ==============================================
Page Loader
=============================================== */

jQuery(window).load(function() {
	'use strict';
	jQuery(".loader-item").delay(700).fadeOut();
	jQuery("#pageloader").delay(1200).fadeOut("slow");
});

 /* ==============================================
Fit Videos
=============================================== */
jQuery(window).load(function(){
	'use strict';
     jQuery(".fit-vids").fitVids();
 });

/* ==============================================
Drop Down Menu Fade Effect
=============================================== */	

jQuery('.nav-toggle').hover(function() {
	'use strict';
    jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown(250);
    }, function() {
    jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp(250)
 });

/* ==============================================
Mobile Menu Button
=============================================== */	

jQuery('.mini-nav-button').click(function() {
    jQuery(".nav-menu").slideToggle("9000");
 });

jQuery('.nav a').click(function () {
	if (jQuery(window).width() < 970) {
    	jQuery(".nav-menu").slideToggle("2000")}
	
});

/* ==============================================
Flex Slider Home Page
=============================================== */	
	
 jQuery(window).load(function(){
	  'use strict';

      jQuery('.hometexts').flexslider({
        animation: "slide",
		selector: ".slide-text .hometext",
		controlNav: false,
		directionNav: false ,
		slideshowSpeed: 4000,  
		direction: "vertical",
        start: function(slider){
         jQuery('body').removeClass('loading'); 
        }
      });
 });


 /* ==============================================
Flex Slider Home Page Animated Version
=============================================== */	
	
 jQuery(window).load(function(){
	  'use strict';
		
      jQuery('.hometexts-1').flexslider({
        animation: "fade",
		selector: ".slide-text-1 .hometext-1",
		controlNav: false,
		directionNav: false ,
		slideshowSpeed: 5000,  
		direction: "horizontal",
        start: function(slider){
         jQuery('body').removeClass('loading'); 
        }
      });
 });

  /* ==============================================
Flex Slider Home Page V5
=============================================== */	
	
 jQuery(window).load(function(){
	  'use strict';
		
      jQuery('.hometexts-5').flexslider({
        animation: "fade",
		selector: ".slide-text-5 .hometext-5",
		controlNav: false,
		directionNav: true ,
		slideshowSpeed: 5000,  
		direction: "horizontal",
        start: function(slider){
         jQuery('body').removeClass('loading'); 
        }
      });
 });

  /* ==============================================
Flex Slider Blog
=============================================== */	
	
 jQuery(window).load(function(){
	  'use strict';
		
      jQuery('.post .flex').flexslider({
        animation: "fade",
		selector: ".post-slides .post-slide",
		controlNav: false,
		directionNav: true ,
		slideshowSpeed: 5000,  
		direction: "horizontal",
        start: function(slider){
         jQuery('body').removeClass('loading'); 
        }
      });
 });




/* ==============================================
Home Super Slider (images)
=============================================== */

 jQuery('#slides').superslides({
      animation: 'fade',
    });

 /* ==============================================
Scroll Navigation
=============================================== */	

jQuery(function() {
		'use strict';

		jQuery('.scroll').bind('click', function(event) {
			var jQueryanchor = jQuery(this);
			var headerH = jQuery('#navigation, #navigation-fixed').outerHeight();
			jQuery('html, body').stop().animate({
				scrollTop : jQuery(jQueryanchor.attr('href')).offset().top - headerH + "px"
			}, 1200, 'easeInOutExpo');

			event.preventDefault();
		});
	});



 /* ==============================================
Active Navigation Calling
=============================================== */

jQuery('body').scrollspy({ 
	target: '.nav-menu',
	offset: 95
})

 /* ==============================================
Tooltips Calling
=============================================== */	

jQuery('[data-toggle="tooltip"]').tooltip();

/* ==============================================
Navigation Scroll Effect
=============================================== */


jQuery(document).ready(function () {
	'use strict';

    var menu = jQuery('#navigation');

    jQuery(window).scroll(function () {
        var y = jQuery(this).scrollTop();
        var z = jQuery('.waypoint').offset().top - 200;

        if (y >= z) {
            menu.removeClass('not-visible-nav').addClass('visible-nav');
        }
        else{
            menu.removeClass('visible-nav').addClass('not-visible-nav');
        }
    });

});



 /* ==============================================
Flex Slider Testimonials
=============================================== */	
	
 jQuery(window).load(function(){
	  'use strict';
		
      jQuery('.inner').flexslider({
        animation: "fade",
		selector: ".t-slides .monial",
		controlNav: false,
		directionNav: true ,
		slideshowSpeed: 7000,  
		direction: "horizontal",
        start: function(slider){
          jQuery('body').removeClass('loading'); 
        }
      });
 });


 /* ==============================================
Pretty Photo
=============================================== */	
	
	jQuery(document).ready(function(){
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        theme: "light_square",
    });
  });



/* ==============================================
Parallax Calling
=============================================== */


( function ( jQuery ) {
'use strict';
jQuery(document).ready(function(){
jQuery(window).bind('load', function () {
		parallaxInit();						  
	});
	function parallaxInit() {
		testMobile = isMobile.any();
		if (testMobile == null)
		{
			jQuery('.image1').parallax("50%", 0.5);
			jQuery('.image2').parallax("50%", 0.5);
			jQuery('.image3').parallax("50%", 0.5);
			jQuery('.image4').parallax("50%", 0.5);
			jQuery('.parallax').parallax("-50%", 0.3);
			jQuery('.parallax1').parallax("50%", 0.5);
			jQuery('.parallax2').parallax("50%", 0.5);
			jQuery('.parallax3').parallax("50%", 0.5);
			jQuery('.parallax4').parallax("50%", 0.5);
			jQuery('.parallax5').parallax("50%", 0.5);
			jQuery('.parallax6').parallax("50%", 0.5);
		}
	}	
	parallaxInit();	 
});	
//Mobile Detect
var testMobile;
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
}( jQuery ));


/* ==============================================
Slap Text for Typography
=============================================== */	

  // Function to slabtext the H1 headings
    function slabTextHeadlines() {
        jQuery(".typographic h1, .typographic h2").slabText({
            // Don't slabtext the headers if the viewport is under 380px
            "viewportBreakpoint":300
        });
    };
    
    // Called one second after the onload event for the demo (as I'm hacking the
    // fontface load event a bit here)

    // Please do not do this in a production environment - you should really use
    // google WebFont loader events (or something similar) for better control
    jQuery(window).load(function() {
        // So, to recap... don't actually do this, it's nasty!
        setTimeout(slabTextHeadlines, 1000);
    });



/* ==============================================
Animated Items
=============================================== */	
	jQuery(document).ready(function(jQuery) {
	
	'use strict';

    	jQuery('.animated').appear(function() {
	        var elem = jQuery(this);
	        var animation = elem.data('animation');
	        if ( !elem.hasClass('visible') ) {
	        	var animationDelay = elem.data('animation-delay');
	            if ( animationDelay ) {

	                setTimeout(function(){
	                    elem.addClass( animation + " visible" );
	                }, animationDelay);

	            } else {
	                elem.addClass( animation + " visible" );
	            }
	        }
	    });
});



 /* ==============================================
Count Factors
 =============================================== */	
  

		jQuery(function() {

				jQuery(".fact-number").appear(function(){
				jQuery('.fact-number').each(function(){
	        	dataperc = jQuery(this).attr('data-perc'),
				jQuery(this).find('.factor').delay(6000).countTo({
	            from: 50,
	            to: dataperc,
	            speed: 3000,
	            refreshInterval: 50,
	            
        	});  
		});
					});
});
 
(function(jQuery) {
    jQuery.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = jQuery.extend({}, jQuery.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return jQuery(this).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                jQuery(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    jQuery.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
})(jQuery);





/* ==============================================
Video Script
=============================================== */

jQuery(function(){
			'use strict';

            jQuery(".player").mb_YTPlayer();
		});	
	














