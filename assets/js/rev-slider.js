var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";
                                            if(htmlDiv) {
                                                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                                            }else{
                                                var htmlDiv = document.createElement("div");
                                                htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                                                document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                                            }


setREVStartSize({c: jQuery('#rev_slider_1_1'), gridwidth: [1240], gridheight: [868], sliderLayout: 'fullwidth'});		
                                            var revapi1,
                                            tpj=jQuery;
                                    
                                            tpj(document).ready(function() {
                                                if(tpj("#rev_slider_1_1").revolution == undefined){
                                                        revslider_showDoubleJqueryError("#rev_slider_1_1");
                                                }else{
                                                        revapi1 = tpj("#rev_slider_1_1").show().revolution({
                                                                sliderType:"standard",
                                                                jsFileLocation:"//www.skycamintl.com/wp-content/plugins/revslider/public/assets/js/",
                                                                sliderLayout:"fullwidth",
                                                                dottedOverlay:"none",
                                                                delay:4000,
                                                                navigation: {
                                                                        onHoverStop:"off",
                                                                },
                                                                visibilityLevels:[1240,1024,778,480],
                                                                gridwidth:1240,
                                                                gridheight:868,
                                                                lazyType:"none",
                                                                shadow:0,
                                                                spinner:"spinner0",
                                                                stopLoop:"off",
                                                                stopAfterLoops:-1,
                                                                stopAtSlide:-1,
                                                                shuffle:"off",
                                                                autoHeight:"off",
                                                                disableProgressBar:"on",
                                                                hideThumbsOnMobile:"off",
                                                                hideSliderAtLimit:0,
                                                                hideCaptionAtLimit:0,
                                                                hideAllCaptionAtLilmit:0,
                                                                debugMode:false,
                                                                fallbacks: {
                                                                        simplifyAll:"off",
                                                                        nextSlideOnWindowFocus:"off",
                                                                        disableFocusListener:false,
                                                                }
                                                            }
                                                        );
                                            }
                                            });	/*ready*/
