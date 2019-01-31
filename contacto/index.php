<?php
    //require 'assets/funcs.php';
    
    $errors = array();
        if(!empty($_POST)){

            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '	6LdyEI4UAAAAAHrwgUSJ02ES8L3jMjAoJ1Pb-uaB';
		
        if (!$captcha){
            $errors[] = "Verificar Catcha.";
        }
        if (isNull($name, $email, $phone, $message)){
            $errors[] = "Todos los datos son necesarios.";
        }
        if (!isEmail($email)){
            $errors[] = "Email Incorrecto.";
        }
        if (count($errors) == 0) {
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr = json_decode($response, TRUE);
		
                    if($arr['success']){
			
			$body = 'Nombre: ' . $name . "\n\n";
                        $body .= 'Email: ' . $email . "\n\n";
                        $body .= 'Telefono: ' . $phone . "\n\n";
                        $body .= "Mensaje:\n" . $message . "\n\n";
                        
                        $body = "
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='x-ua-compatible' content='ie=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Mensaje del Formulario de Contacto</title>
        
        <style type='text/css'>
            @media screen {
                @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Source Sans Pro Regular'), local('ourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
                }
                @font-face {
                  font-family: 'Source Sans Pro';
                  font-style: normal;
                  font-weight: 700;
                  src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
                }
            }
            
            /** Avoid browser level font resizing.
             * 1. Windows Mobile
             * 2. iOS / OSX
            */
             
            body, table, td, a {
              -ms-text-size-adjust: 100%; /* 1 */
              -webkit-text-size-adjust: 100%; /* 2 */
            }
            /**
             * Remove extra space added to tables and cells in Outlook.
             */
            table, td {
              mso-table-rspace: 0pt;
              mso-table-lspace: 0pt;
            }
            /**
             * Better fluid images in Internet Explorer.
             */
            img {
              -ms-interpolation-mode: bicubic;
            }
            /**
             * Remove blue links for iOS devices.
             */
            a[x-apple-data-detectors] {
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              color: inherit !important;
              text-decoration: none !important;
            }
            /**
             * Fix centering issues in Android 4.4.
             */
            div[style*='margin: 16px 0;'] {
              margin: 0 !important;
            }
            body {
              width: 100% !important;
              height: 100% !important;
              padding: 0 !important;
              margin: 0 !important;
            }
            /**
             * Collapse table borders to avoid space between cells.
             */
            table {
              border-collapse: collapse !important;
            }
            a {
              color: #1a82e2;
            }
            img {
              height: auto;
              line-height: 100%;
              text-decoration: none;
              border: 0;
              outline: none;
            }
        </style>
    </head>
    <body style='background-color: #e9ecef;'>
        <!-- start preheader -->
        <div class='preheader' style='display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;'>
            Mensaje del Formulario de Contacto
        </div>
        <!-- end preheader -->

        <!-- start body -->
        <table border='0' cellpadding='0' cellspacing='0' width='100%''>
            <!-- start logo -->
            <tr>
                <td align='center' bgcolor='#e9ecef'>
                    <!--[if (gte mso 9)|(IE)]>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
                        <tr>
                            <td align='center' valign='top' width'600'>
                                <![endif]-->
                                <table border='0' cellpadding='0' cellspacing='0' width='100%'' style='max-width: 600px;''>
                                    <tr>
                                        <td align='center' valign='top' style='adding: 36px 24px;'>
                                            <a href='http://www.tecnicoacr.com' target='_blank' style='display: inline-block;''>
                                                <img src='https://dl.dropboxusercontent.com/s/do6memaps3dva8i/logotec.png?dl=0' alt='Logo' border='0' style='display: block;'>
                                            </a>
                            </td>
                        </tr>
                    </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
            </tr>
        </table>
          <![endif]-->
        </td>
      </tr>
      <!-- end logo -->

      <!-- start copy block -->
      <tr>
        <td align='center' bgcolor=''#e9ecef'>
          <!--[if (gte mso 9)|(IE)]>
          <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
          <tr>
          <td align='center' valign='top' width='600'>
          <![endif]-->
          <table border='0' cellpadding='0' cellspacing='0' width='100%'' style='max-width: 600px;'>

            <!-- start copy -->
            <tr>
              <td align='left' bgcolor=''#ffffff' style='padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;'>
                <p style='margin: 0;'><br><br>Hola, ha recibido un nuevo mensaje de contacto.<br><br>
                Detalle: <br><br>
                <strong>Nombre Completo: </strong> $name. <br><br>
                <strong>Email: </strong> $email <br>
                <strong>Telefono: </strong> $phone <br><br>
                <strong>Mensaje: </strong>$message. <br>
              </td>
            </tr>
            <!-- end copy -->

            <!-- start copy -->
            <tr>
              <td align='right' bgcolor=''#ffffff' style='padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf'>
                <p style='margin: 0;'>Saludos,<br>TecnicoaCR-Team</p>
              </td>
            </tr>
            <!-- end copy -->

          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <!-- end copy block -->

      <!-- start footer -->
      <tr>
        <td align='center' bgcolor='#e9ecef' style='padding: 24px;'>
          <!--[if (gte mso 9)|(IE)]>
          <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
          <tr>
          <td align='center' valign='top' width='600'>
          <![endif]-->
          <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>

            <!-- start permission -->
            <tr>
              <td align='center' bgcolor='#e9ecef' style='padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;'>
                <p style='margin: 0;'>Está recibiendo este correo electrónico porque recientemente se envio un nuevo formulario de contacto.</p>
              </td>
            </tr>
            <!-- end permission -->

          </table>
          <!--[if (gte mso 9)|(IE)]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
      <!-- end footer -->

    </table>
    <!-- end body -->

  </body>
  </html>";	
                        /* MENSAJE DEL CONTACTO */
			if(!(enviarEmail($body))){ 
                            $errors[] = "Error al enviar Email.";
			}
                        
                        /* MENSAJE PARA CONTACTO */
                        if(!(sendConfirm($email, $name, 'Mensaje de TecnicoaCR', "Hola $name, Es un placer recibir sus datos, nos comunicaremos con usted con la mayor brevedad posible."))){
                            $errors[] = "Error al enviar Confirmación.";
			}                        
        }}      
	}
 ?>
<!DOCTYPE html>
<html lang="es-CR">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- favicon-->
        <link rel="shortcut icon" href="../wp-content/uploads/2017/10/favicon-1.png" type="image/png">
        <meta property="og:image" content="../wp-content/uploads/2017/10/skycam.png" />

        <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
        
        <title>Contacto &#8211; Seguridad TRS S.A</title>
        
        <script>window._wca = window._wca || [];</script>
        <link rel='dns-prefetch' href='http://s0.wp.com/' />
        <link rel='dns-prefetch' href='http://maps.googleapis.com/' />
        <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
        <link rel='dns-prefetch' href='http://s.w.org/' />
        <link rel="alternate" type="application/rss+xml" title="Skycam International &raquo; Feed" href="../" />
        <link rel="alternate" type="application/rss+xml" title="Skycam International &raquo; Comments Feed" href="../" />
        
        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/www.skycamintl.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.0.3"}};
                !function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
        </script>
        
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>
        
        <link rel='stylesheet' id='wp-block-library-css'  href='../wp-includes/css/dist/block-library/style.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='jetpack-email-subscribe-css'  href='../wp-content/plugins/jetpack/modules/shortcodes/css/jetpack-email-subscribe5152.css?ver=1.0' type='text/css' media='all' />
        <link rel='stylesheet' id='es-widget-css-css'  href='../wp-content/plugins/email-subscribers/widget/es-widgetaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='ultimate-headings-style-css'  href='../wp-content/plugins/Ultimate_VC_Addons/assets/min-css/headings.minf28f.css?ver=3.16.12' type='text/css' media='all' />
        <link rel='stylesheet' id='rs-plugin-settings-css'  href='../wp-content/plugins/revslider/public/assets/css/settings78d9.css?ver=5.4.3.1' type='text/css' media='all' />
        
        <style id='rs-plugin-settings-inline-css' type='text/css'>
            #rs-demo-id {}
        </style>
        
        <link rel='stylesheet' id='woocommerce-layout-css'  href='../wp-content/plugins/woocommerce/assets/css/woocommerce-layout1aae.css?ver=3.5.3' type='text/css' media='all' />

        <style id='woocommerce-layout-inline-css' type='text/css'>           
            .infinite-scroll .woocommerce-pagination {
		display: none;
            }
        </style>
        
        <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='../wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen1aae.css?ver=3.5.3' type='text/css' media='only screen and (max-width: 768px)' />
        <link rel='stylesheet' id='woocommerce-general-css'  href='../wp-content/plugins/woocommerce/assets/css/woocommerce1aae.css?ver=3.5.3' type='text/css' media='all' />
        
        <style id='woocommerce-inline-inline-css' type='text/css'>
           .woocommerce form .form-row .required { visibility: visible; }
        </style>

        <link rel='stylesheet' id='brick-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Titillium+Web%3A200%2C200i%2C300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%2C900%7CQuicksand%3A300%2C400%2C500%2C700%7CRoboto%3A100%2C100i%2C300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='animate-css'  href='../wp-content/themes/brick/assets/css/animateaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='font-awesome-css'  href='../wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min5fba.css?ver=5.2' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-css'  href='../wp-content/themes/brick/assets/lib/slick-master/slick/slickaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='normalize-css'  href='../wp-content/themes/brick/assets/lib/normalizeaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='lightgallery-css'  href='../wp-content/themes/brick/assets/lib/lightGallery/dist/css/lightgallery.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/uikit.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-sticky-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/components/sticky.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-slidenav-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/components/slidenav.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-slideshow-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/components/slideshow.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-dotnav-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/components/dotnav.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='uikit-slider-css'  href='../wp-content/themes/brick/assets/lib/uikit/css/components/slider.minaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='fotorama-css'  href='../wp-content/themes/brick/assets/lib/fotorama-4.6.4/fotoramaaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='brick-core-css'  href='../wp-content/themes/brick/assets/css/brick-coreaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='brick-main-css'  href='../wp-content/themes/brick/assets/css/mainaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='js_composer_front-css'  href='../wp-content/plugins/js_composer/assets/css/js_composer.min5fba.css?ver=5.2' type='text/css' media='all' />
        <link rel='stylesheet' id='bsf-Defaults-css'  href='../wp-content/uploads/smile_fonts/Defaults/Defaultsaead.css?ver=5.0.3' type='text/css' media='all' />
        <link rel='stylesheet' id='ultimate-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Titillium+Web:regular,900|Quicksand' type='text/css' media='all' />
        <link rel='stylesheet' id='ultimate-style-css'  href='../wp-content/plugins/Ultimate_VC_Addons/assets/min-css/style.minf28f.css?ver=3.16.12' type='text/css' media='all' />
        <link rel='stylesheet' id='redux-google-fonts-brick_smof_data-css'  href='https://fonts.googleapis.com/css?family=Titillium+Web%3A200%2C300%2C400%2C600%2C700%2C900%2C200italic%2C300italic%2C400italic%2C600italic%2C700italic&amp;ver=1508607447' type='text/css' media='all' />
        <link rel='stylesheet' id='jetpack_css-css'  href='../wp-content/plugins/jetpack/css/jetpackd4d0.css?ver=6.9' type='text/css' media='all' />

        <!-- This site uses the Google Analytics by MonsterInsights plugin v 6.2.0 - https://www.monsterinsights.com/ -->
        <!-- Normally you will find the Google Analytics tracking code here, but the webmaster disabled your user group. -->
        <!-- / Google Analytics by MonsterInsights -->

        <script type='text/javascript' src='../wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
        <script type='text/javascript' src='../wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
        <script type='text/javascript' src='../wp-content/plugins/Ultimate_VC_Addons/assets/min-js/headings.minf28f.js?ver=3.16.12'></script>
        <script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min78d9.js?ver=5.4.3.1'></script>
        <script type='text/javascript' src='../wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min78d9.js?ver=5.4.3.1'></script>
        <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
        
        <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/www.skycamintl.com","is_cart":"","cart_redirect_after_add":"no"};
        /* ]]> */
        </script>
        
        <script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min1aae.js?ver=3.5.3'></script>
        <script type='text/javascript' src='../wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart5fba.js?ver=5.2'></script>
        <script type='text/javascript' src='../wp-content/themes/brick/assets/lib/hoverdir/modernizr.custom.97074aead.js?ver=5.0.3'></script>
        <script type='text/javascript' src='../wp-content/plugins/Ultimate_VC_Addons/assets/min-js/ultimate-params.minf28f.js?ver=3.16.12'></script>
        <script type='text/javascript' src='../wp-content/plugins/Ultimate_VC_Addons/assets/min-js/jquery-appear.minf28f.js?ver=3.16.12'></script>
        <script type='text/javascript' src='../wp-content/plugins/Ultimate_VC_Addons/assets/min-js/custom.minf28f.js?ver=3.16.12'></script>
        <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAgrGvAIrMMSeO-A1o9aYRJs2k3stlKrs8'></script>
        <link rel='https://api.w.org/' href='../wp-json/index.html' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="../xmlrpc0db0.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../wp-includes/wlwmanifest.xml" /> 
        <meta name="generator" content="WordPress 5.0.3" />
        <meta name="generator" content="WooCommerce 3.5.3" />
        <link rel="canonical" href="index.php" />
        <link rel='shortlink' href='https://wp.me/P9ajU9-1e' />
       
        <link rel='dns-prefetch' href='http://v0.wordpress.com/'/>
        <link rel='dns-prefetch' href='http://i0.wp.com/'/>
        <link rel='dns-prefetch' href='http://i1.wp.com/'/>
        <link rel='dns-prefetch' href='http://i2.wp.com/'/>
        <style type='text/css'>img#wpstats{display:none}</style>
        <style type="text/css">.fa fa-search { display: none;}</style>
        
        <style type="text/css">#header .header-v1 .top-bar .box ul.br-info li{color:#676767;}#header .header-v1{background:rgba(255,255,255,1);}#header .header-v1 .header{background:rgba(16,9,9,1);}#header .header .br-navbar ul li a, #header .menu-primary-show ul  li  a{
            text-transform: uppercase;
            }body{background:none;background-size:100%;background-position:center center;background-repeat:repeat;}
        </style>
        <style> @media (min-width: 992px){}</style>
        <style type="text/css">.footer{ background: #1e1f1f;  background-repeat:repeat; color: #dcddde;}.footer .sec-padding{ padding:90px 0 90px 0; margin:0px auto;}.footer .footer-widget ul li a{ color: #dcddde;}.footer .footer-widget ul li a:hover{ color: #0d9af4;}.footer .col-footer .footer-widget .title{ color: #dcddde;}</style>
        
        <script type="text/javascript">
                jQuery(function ($) {
                    if ($('#footer-particles-js').length) {
                        particlesJS('footer-particles-js',
                                {
                                    "particles": {
                                        "number": {
                                            "value": 80,
                                            "density": {
                                                "enable": true,
                                                "value_area": 1000
                                            }
                                        },
                                        "color": {
                                            "value": "#ffffff"
                                        },
                                        "shape": {
                                            "type": "circle",
                                            "stroke": {
                                                "width": 0,
                                                "color": "#000000"
                                            },
                                            "polygon": {
                                                "nb_sides": 5
                                            },
                                            "image": {
                                                "src": "img/github.svg",
                                                "width": 100,
                                                "height": 100
                                            }
                                        },
                                        "opacity": {
                                            "value": 0.5,
                                            "random": false,
                                            "anim": {
                                                "enable": false,
                                                "speed": 1,
                                                "opacity_min": 0.1,
                                                "sync": false
                                            }
                                        },
                                        "size": {
                                            "value": 5,
                                            "random": true,
                                            "anim": {
                                                "enable": false,
                                                "speed": 40,
                                                "size_min": 0.1,
                                                "sync": false
                                            }
                                        },
                                        "line_linked": {
                                            "enable": true,
                                            "distance": 150,
                                            "color": "#ffffff",
                                            "opacity": 0.4,
                                            "width": 1                                        },
                                        "move": {
                                            "enable": true,
                                            "speed": 6,
                                            "direction": "none",
                                            "random": false,
                                            "straight": false,
                                            "out_mode": "out",
                                            "attract": {
                                                "enable": false,
                                                "rotateX": 600,
                                                "rotateY": 1200
                                            }
                                        }
                                    },
                                    "interactivity": {
                                        "detect_on": "canvas",
                                        "events": {
                                            "onhover": {
                                                "enable": true,
                                                "mode": "repulse"
                                            },
                                            "onclick": {
                                                "enable": true,
                                                "mode": "push"
                                            },
                                            "resize": true
                                        },
                                        "modes": {
                                            "grab": {
                                                "distance": 400,
                                                "line_linked": {
                                                    "opacity": 1
                                                }
                                            },
                                            "bubble": {
                                                "distance": 400,
                                                "size": 40,
                                                "duration": 2,
                                                "opacity": 8,
                                                "speed": 3
                                            },
                                            "repulse": {
                                                "distance": 200
                                            },
                                            "push": {
                                                "particles_nb": 4
                                            },
                                            "remove": {
                                                "particles_nb": 2
                                            }
                                        }
                                    },
                                    "retina_detect": true,
                                    "config_demo": {
                                        "hide_card": false,
                                        "background_color": "#b61924",
                                        "background_image": "",
                                        "background_position": "50% 50%",
                                        "background_repeat": "no-repeat",
                                        "background_size": "cover"
                                    }
                                }

                        );
                    }
                });
            </script>
            <noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
            <meta name="generator" content="Powered by TecnicoaCR"/>

            <!-- Jetpack Open Graph Tags -->
            <meta property="og:type" content="article" />
            <meta property="og:title" content="Contacto" />
            <meta property="og:url" content="https://www.seguridadtrscr.com/contacto/" />
            <meta property="og:description" content="Pagina de Contacto Seguridad TRS." />
            <meta property="article:published_time" content="2019-01-16T02:36:22-06:00" />
            <meta property="article:modified_time" content="2019-01-21T18:45:12-06:00" />
            <meta property="og:site_name" content="Seguridad TRS S.A" />
            <meta property="og:image" content="https://s0.wp.com/i/blank.jpg" />
            <meta property="og:locale" content="es_CR" />
            <meta name="twitter:text:title" content="Contacto" />
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:description" content="Pagina de Contacto Seguridad TRS" />

            <!-- End Jetpack Open Graph Tags -->
            <script type="text/javascript">function setREVStartSize(e){
                    try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;					
                            if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})					
                    }catch(d){console.log("Failure at Presize of Slider:"+d)}};
            </script>
            <style type="text/css" title="dynamic-css" class="options-output">.br_page_loader{background-color:#FFFFFF;}.page-title-bar{background-color:#1E1E1E;background-repeat:no-repeat;background-size:cover;background-position:center top;background-image:url('../wp-content/plugins/qtc-brick/qtc-options/options/images/bg_title_bar.jpg');}.page-title-bar{margin-top:0;margin-right:0;margin-bottom:5%;margin-left:0;}.page-title-bar{padding-top:110px;padding-right:0;padding-bottom:110px;padding-left:0;}.blog-title-bar{background-color:#1e1e1e;background-repeat:no-repeat;background-size:cover;background-position:center top;background-image:url('../wp-content/plugins/qtc-brick/qtc-options/options/images/bg_title_bar.jpg');}.blog-title-bar{margin-top:0;margin-right:0;margin-bottom:5%;margin-left:0;}.blog-title-bar{padding-top:110px;padding-right:0;padding-bottom:110px;padding-left:0;}.product-title-bar{background-color:#1E1E1E;background-repeat:no-repeat;background-size:cover;background-position:center top;background-image:url('../wp-content/plugins/qtc-brick/qtc-options/options/images/bg_title_bar.jpg');}.product-title-bar{margin-top:0;margin-right:0;margin-bottom:5%;margin-left:0;}.product-title-bar{padding-top:110px;padding-right:0;padding-bottom:110px;padding-left:0;}body{font-family:"Titillium Web";line-height:26px;font-weight:400;font-style:normal;color:#4e5453;font-size:14px;}h1{font-family:"Titillium Web";line-height:48px;font-weight:900;font-style:normal;color:#1b2725;font-size:42px;}h2{font-family:"Titillium Web";line-height:42px;font-weight:700;font-style:normal;color:#1b2725;font-size:36px;}h3{font-family:"Titillium Web";line-height:30px;font-weight:700;font-style:normal;color:#1b2725;font-size:24px;}h4{font-family:"Titillium Web";line-height:24px;font-weight:400;font-style:normal;color:#1b2725;font-size:18px;}h5{font-family:"Titillium Web";line-height:22px;font-weight:400;font-style:normal;color:#1b2725;font-size:16px;}h6{font-family:"Titillium Web";line-height:18px;font-weight:300;font-style:normal;color:#1b2725;font-size:14px;}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1495521238394{padding-right: 26% !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript><script async src='../../stats.wp.com/s-201902.js'></script>
    
            <!-- Recaptcha================================================== -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    
    </head>
    <body class="page-template-default page page-id-76 woocommerce-no-js brick-body brick-sticky wpb-js-composer js-comp-ver-5.2 vc_responsive" > 
        
        <div id="wrapper">
                        
            <!-- BEGIN HEADER -->
            <header class="header-v1" data-uk-sticky="{top: -500, animation: 'uk-animation-slide-top'}">
                <?php require_once '../assets/nav_1.php'; ?>
            </header>            <!--END BEGIN HEADER -->
            
            <div class="page-title-bar br_title_bar">
                <div class="uk-container uk-container-center">
                    <div class="box uk-clearfix">
                        <h1 class="br-title">Contacto</h1>
                        <div class="br-breadcrumb">
                            <div id="br-crumbs">
                                <span typeof="v:Breadcrumb">
                                    <a rel="v:url" property="v:title" href="../">Inicio</a>
                                </span>/
                                <span class="current">Contacto</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-container uk-container-center">
                <div class="uk-grid ">
                    <div id="main-content" class="uk-width-large-1-1 uk-width-medium-1-1 uk-width-small-1-1 uk-width-1-1 brick-content page-content ">
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="col-text-contact wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner vc_custom_1495521238394">
                                                    <div class="wpb_wrapper">
                                                        <div id="ultimate-heading-25895c3a7404be5ce" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-25895c3a7404be5ce uvc-9650 " data-hspacer="no_spacer"  data-halign="left" style="text-align:left">
                                                            <div class="uvc-heading-spacer no_spacer" style="top"></div>
                                                            <div class="uvc-main-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-25895c3a7404be5ce h2'  data-responsive-json-new='{"font-size":"desktop:33px;","line-height":"desktop:35px;"}' >
                                                                <h2 style="font-family:&#039;Titillium Web&#039;;font-weight:900;color:#1b2725;margin-bottom:10px;">Oficina Principal</h2>
                                                            </div>
                                                            <div class="uvc-sub-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-25895c3a7404be5ce .uvc-sub-heading '  data-responsive-json-new='{"font-size":"desktop:14px;","line-height":"desktop:26px;"}'  style="font-family:&#039;Quicksand&#039;;font-weight:normal;color:#4e5453;">
                                                                Estamos listos para ayudarlo con cualquier pregunta, solicitud o inquietud que pueda tener. Utilice el formulario a continuación para compartir algunos detalles sobre cómo podemos ayudarlo y uno de nuestros representantes responderá lo antes posible.                                                     
                                                            </div>
                                                        </div>        <!-- BEGIN BLOCK OUR CLIENTS -->
                                                        <div id="br_contact_us_f8d0e304ac488f5575c2829f8ca53112" class="br-contact_us ">
                                                            <ul>
                                                                <li>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-phone primary-color"></span>
                                                                        <p class="brick-hover-color-primary"><a href="https://api.whatsapp.com/send?phone=50671720886">+506-7172 0886</a></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-map-marker primary-color"></span>
                                                                        <p class="brick-hover-color-primary"><a href="https://wego.here.com/directions/mix/mylocation/e-eyJuYW1lIjoiU2VndXJpZGFkIFRSUyBTLkEiLCJhZGRyZXNzIjoic2FuIGpvc2UgcHVyaXNjYWwgc2FudGlhZ28sIFNhbnRpYWdvIERlIFB1cmlzY2FsLCBTYW4gSm9zZSwgQ29zdGEgUmljYSIsImxhdGl0dWRlIjo5Ljg1MTQxLCJsb25naXR1ZGUiOi04NC4zMDYyMDk5LCJwcm92aWRlck5hbWUiOiJmYWNlYm9vayIsInByb3ZpZGVySWQiOjIzODEwMDc3Mjg1OTI0NTZ9?map=9.85141,-84.30621,15,normal&fb_locale=es_LA">Santiago De Puriscal, San Jose, Costa Rica</a></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-envelope primary-color"></span>
                                                                        <a href="mailto:seguridadtrscr@gmail.com"><p class="brick-hover-color-primary">seguridadtrscr@gmail.com</p></a>
                                                                    </div>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-envelope primary-color"></span>
                                                                        <a href="mailto:info@seguridadtrscr.net.in"><p class="brick-hover-color-primary">info@seguridadtrscr.net.in</p></a>
                                                                    </div>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-envelope primary-color"></span>
                                                                        <a href="mailto:luis@seguridadtrscr.net.in"><p class="brick-hover-color-primary">luis@seguridadtrscr.net.in</p></a>
                                                                    </div>
                                                                    
                                                                </li>
                                                                <li>
                                                                    <div class="brick-flex-box">
                                                                        <span class="fa fa-facebook primary-color"></span>
                                                                        <a href="https://facebook.com/seguridadtrscr"><p class="brick-hover-color-primary">Facebook Fan Page</p></a>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                        <!-- END BEGIN BLOCK OUR CLIENTS -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-form-contact wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div id="ultimate-heading-46615c3a7404be964" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-46615c3a7404be964 uvc-9469 " data-hspacer="no_spacer"  data-halign="center" style="text-align:center">
                                                            <div class="uvc-heading-spacer no_spacer" style="top"></div>
                                                            <div class="uvc-main-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-46615c3a7404be964 h2'  data-responsive-json-new='{"font-size":"desktop:33px;","line-height":"desktop:35px;"}' >
                                                                <h2 style="font-family:&#039;Titillium Web&#039;;font-weight:900;color:#1b2725;">Estar en contacto</h2>
                                                            </div>
                                                            <div class="uvc-sub-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-46615c3a7404be964 .uvc-sub-heading '  data-responsive-json-new='{"font-size":"desktop:19px;","line-height":"desktop:26px;"}'  style="font-family:&#039;Quicksand&#039;;font-weight:normal;color:#4e5453;margin-bottom:47px;">
                                                                Estamos siempre aquí para usted! Soporte 24/7.
                                                            </div>    
                                                        </div>
                                                        <noscript class="ninja-forms-noscript-message">
                                                            Notice: JavaScript is required for this content.
                                                        </noscript>
                                                        <div id="nf-form-1-cont" class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-1" aria-describedby="nf-form-errors-1" role="form">
                                                            <div class="nf-loading-spinner"></div>
                                                        </div><!-- TODO: Move to Template File. -->
                                                        
                                                        <div id="contactForm">
                                    <form id="formContacto" name="contact" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <div >
                                            <div>
                                                <div>
                                                    <div id="statusBox">
                                                        <div class="alert alert-info d-block">
                                                            <i class="fa fa-envelope fa-lg"></i> 
                                                            Enviénos un mensaje mediante el siguiente formulario:
                                                        </div>
                                                    </div>
                                                </div> <br>
                                                <div>
                                                    <div class="form-group">
                                                        <input id="lang" name="lang" type="hidden" value="es">
                                                        <input id="genPass" name="genPass" type="hidden" value="o+XBlbjo2+/jqay12bW8ypGE5qe48eW+rNWlr+np0ZY=">
							<input type="text" class="form-control" name="name" id="inputNombre" placeholder="Su nombre completo" value="" required>
                                                    </div>
                                                </div><br>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Su email" value="" required>
                                                    </div>
                                                </div><br>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="emailconfirm" id="inputEmailConf" placeholder="Confirme su email" value="" required>
                                                    </div>
                                                </div><br>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" name="phone" id="inputTelefono" placeholder="Su teléfono" value="" required>
                                                    </div>
                                                </div><br>
                                               
                                                <div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" id="inputMensaje" cols="30" rows="4" placeholder="Su mensaje" required></textarea>
                                                    </div>
                                                </div><br>
                                                
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-7 col-lg-12 col-xl-7">
                                                            <div class="form-group">
                                                                <div id="recaptcha" class="g-recaptcha" data-sitekey="6LdyEI4UAAAAAPAIpL9ihQOMe-SICCkXqoQ6bpUy" data-callback="vcc"></div>
                                                            </div>
                                                        </div> <br>
                                                        <div class="col-12 col-sm-12 col-md-5 col-lg-12 col-xl-5">
                                                            <button id="btnSubmit" type="submit" class="btn-cta btn-cta-blue mt-3"><i class="fa fa-chevron-circle-right"></i> Enviar ahora</button>
							</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="successMsg"></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid no_margin">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div id='wrap_map_5c3a7404c20d7' class='ultimate-map-wrapper ult-adjust-bottom-margin no_margin' style=' height:560px;'>
                                            <div id='map_5c3a7404c20d7' data-map_override='full' class='ultimate_google_map wpb_content_element page_margin_top' style='width:100%;height:560px;'></div>    
                                        </div>
                                        <script type='text/javascript'>
			(function($) {
  			'use strict';
			var map_map_5c3a7404c20d7 = null;
			var coordinate_map_5c3a7404c20d7;
			var isDraggable = $(document).width() > 641 ? true : true;
			try
			{
				var map_map_5c3a7404c20d7 = null;
				var coordinate_map_5c3a7404c20d7;
				coordinate_map_5c3a7404c20d7=new google.maps.LatLng(9.85141,  -84.3062099);
				var mapOptions=
				{
					zoom: 13,
					center: coordinate_map_5c3a7404c20d7,
					scaleControl: true,
					streetViewControl: false,
					mapTypeControl: false,
					panControl: false,
					zoomControl: false,
					scrollwheel: false,
					draggable: isDraggable,
					zoomControlOptions: {
						position: google.maps.ControlPosition.RIGHT_BOTTOM
					},mapTypeId: google.maps.MapTypeId.ROADMAP,};var map_map_5c3a7404c20d7 = new google.maps.Map(document.getElementById('map_5c3a7404c20d7'),mapOptions);
						var x = 'infowindow_open_value';
						var marker_map_5c3a7404c20d7 = new google.maps.Marker({
						position: new google.maps.LatLng(25.7823907, -80.2994986),
						animation:  google.maps.Animation.DROP,
						map: map_map_5c3a7404c20d7,
						icon: 'site-data/i2.wp.com/www.skycamintl.com/wp-content/uploads/2017/05/dot-map.png?fit=57%2C80&#038;ssl=1'
					});
					google.maps.event.addListener(marker_map_5c3a7404c20d7, 'click', toggleBounce);}
			catch(e){};
			jQuery(document).ready(function($){
				google.maps.event.trigger(map_map_5c3a7404c20d7, 'resize');
				$(window).resize(function(){
					google.maps.event.trigger(map_map_5c3a7404c20d7, 'resize');
					if(map_map_5c3a7404c20d7!=null)
						map_map_5c3a7404c20d7.setCenter(coordinate_map_5c3a7404c20d7);
				});
				$('.ui-tabs').bind('tabsactivate', function(event, ui) {
				   if($(this).find('.ultimate-map-wrapper').length > 0)
					{
						setTimeout(function(){
							$(window).trigger('resize');
						},200);
					}
				});
				$('.ui-accordion').bind('accordionactivate', function(event, ui) {
				   if($(this).find('.ultimate-map-wrapper').length > 0)
					{
						setTimeout(function(){
							$(window).trigger('resize');
						},200);
					}
				});
				$(window).load(function(){
					setTimeout(function(){
						$(window).trigger('resize');
					},200);
				});
				$('.ult_exp_section').select(function(){
					if($(map_map_5c3a7404c20d7).parents('.ult_exp_section'))
					{
						setTimeout(function(){
							$(window).trigger('resize');
						},200);
					}
				});
				$(document).on('onUVCModalPopupOpen', function(){
					if($(map_map_5c3a7404c20d7).parents('.ult_modal-content'))
					{
						setTimeout(function(){
							$(window).trigger('resize');
						},200);
					}
				});
				$(document).on('click','.ult_tab_li',function(){
					$(window).trigger('resize');
					setTimeout(function(){
						$(window).trigger('resize');
					},200);
				});
			});
			function toggleBounce() {
			  if (marker_map_5c3a7404c20d7.getAnimation() != null) {
				marker_map_5c3a7404c20d7.setAnimation(null);
			  } else {
				marker_map_5c3a7404c20d7.setAnimation(google.maps.Animation.BOUNCE);
			  }
			}
			})(jQuery);
			</script></div></div></div></div>
                     
                                    </div>
            </div>
</div>
            <footer class = "footer">
                                    
            </footer>
                    <div class="footer-bottom">
            
        </div>
                    <div id="br_backtop" class="brick-backtotop bg-primary-color"><i class="fa fa-arrow-up"></i></div>
            </div> <!--end #wrapper -->
	<div style="display:none">
	</div>
	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
	<link rel='stylesheet' id='dashicons-css'  href='../wp-includes/css/dashicons.minaead.css?ver=5.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='nf-display-css'  href='../wp-content/plugins/ninja-forms/assets/css/display-structureaead.css?ver=5.0.3' type='text/css' media='all' />
<script type='text/javascript' src='../wp-content/plugins/jetpack/_inc/build/photon/photon.minb3d9.js?ver=20130122'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var es_widget_page_notices = {"es_email_notice":"Please enter email address","es_rate_limit_notice":"You need to wait for sometime before subscribing again","es_success_message":"Successfully Subscribed.","es_success_notice":"Your subscription was successful! Kindly check your mailbox and confirm your subscription. If you don't see the email within a few minutes, check the spam\/junk folder.","es_email_exists":"Email Address already exists!","es_error":"Oops.. Unexpected error occurred.","es_invalid_email":"Invalid email address","es_try_later":"Please try after some time","es_ajax_url":"https:\/\/www.skycamintl.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/email-subscribers/widget/es-widget-pageaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../site-data/s0.wp.com/wp-content/js/devicepx-jetpack2acb.js?ver=201902'></script>
<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js?ver=2.1.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min1aae.js?ver=3.5.3'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_a430b3fc371e1c2c14b0807cf505c531","fragment_name":"wc_fragments_a430b3fc371e1c2c14b0807cf505c531"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min1aae.js?ver=3.5.3'></script>
<script type='text/javascript'>
		jQuery( 'body' ).bind( 'wc_fragments_refreshed', function() {
			jQuery( 'body' ).trigger( 'jetpack-lazy-images-load' );
		} );
	
</script>
<script type='text/javascript' src='../wp-includes/js/comment-reply.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/smoothscrollaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/ultimate.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/hoverdir/jquery.hoverdiraead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/jquery-waypoints/2.0.3/waypoints.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/particles/particles.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/lightGallery/dist/js/lightgallery-all.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/lightGallery/dist/js/jquery.mousewheel.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/isotope.pkgd.minaead.js?ver=5.0.3'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var brickPortfolioAjax = {"ajaxurl":"https:\/\/www.skycamintl.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/ajax_load_portfolioaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/uikit.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/grid.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/slider.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/slideshow.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/slideset.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/lightbox.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/uikit/js/components/sticky.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/slick-master/slick/slick.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/fotorama-4.6.4/fotoramaaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/lib/loading/modernizr.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/main.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/themes/brick/assets/js/woocommerceaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-includes/js/wp-embed.minaead.js?ver=5.0.3'></script>
<script type='text/javascript' src='../wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min5fba.js?ver=5.2'></script>
<script type='text/javascript' src='../wp-includes/js/underscore.min4511.js?ver=1.8.3'></script>
<script type='text/javascript' src='../wp-includes/js/backbone.min9632.js?ver=1.2.3'></script>
<script type='text/javascript' src='../wp-content/plugins/ninja-forms/assets/js/min/front-end-depsd878.js?ver=3.3.21.3'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var nfi18n = {"ninjaForms":"Ninja Forms","changeEmailErrorMsg":"Please enter a valid email address!","changeDateErrorMsg":"Please enter a valid date!","confirmFieldErrorMsg":"These fields must match!","fieldNumberNumMinError":"Number Min Error","fieldNumberNumMaxError":"Number Max Error","fieldNumberIncrementBy":"Please increment by ","fieldTextareaRTEInsertLink":"Insert Link","fieldTextareaRTEInsertMedia":"Insert Media","fieldTextareaRTESelectAFile":"Select a file","formErrorsCorrectErrors":"Please correct errors before submitting this form.","validateRequiredField":"This is a required field.","honeypotHoneypotError":"Honeypot Error","fileUploadOldCodeFileUploadInProgress":"File Upload in Progress.","fileUploadOldCodeFileUpload":"FILE UPLOAD","currencySymbol":"","fieldsMarkedRequired":"Fields marked with an <span class=\"ninja-forms-req-symbol\">*<\/span> are required","thousands_sep":",","decimal_point":".","dateFormat":"m\/d\/Y","startOfWeek":"1","of":"of","previousMonth":"Previous Month","nextMonth":"Next Month","months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"weekdaysMin":["Su","Mo","Tu","We","Th","Fr","Sa"]};
var nfFrontEnd = {"adminAjax":"https:\/\/www.skycamintl.com\/wp-admin\/admin-ajax.php","ajaxNonce":"1f8f8104f6","requireBaseUrl":"https:\/\/www.skycamintl.com\/wp-content\/plugins\/ninja-forms\/assets\/js\/","use_merge_tags":{"user":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"post":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"system":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"fields":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"calculations":{"html":"html","hidden":"hidden","note":"note","unknown":"unknown"}},"opinionated_styles":""};
/* ]]> */
</script>
<script type='text/javascript' src='../wp-content/plugins/ninja-forms/assets/js/min/front-endd878.js?ver=3.3.21.3'></script>
<script type='text/javascript' src='../../stats.wp.com/e-201902.js' async='async' defer='defer'></script>
<script type='text/javascript'>
	_stq = window._stq || [];
	_stq.push([ 'view', {v:'ext',j:'1:6.9',blog:'135446821',post:'76',tz:'0',srv:'www.skycamintl.com'} ]);
	_stq.push([ 'clickTrackerInit', '135446821', '76' ]);
</script>
<script id="tmpl-nf-layout" type="text/template">
	<span id="nf-form-title-{{{ data.id }}}" class="nf-form-title">
		{{{ ( 1 == data.settings.show_title ) ? '<h3>' + data.settings.title + '</h3>' : '' }}}
	</span>
	<div class="nf-form-wrap ninja-forms-form-wrap">
		<div class="nf-response-msg"></div>
		<div class="nf-debug-msg"></div>
		<div class="nf-before-form"></div>
		<div class="nf-form-layout"></div>
		<div class="nf-after-form"></div>
	</div>
</script>

<script id="tmpl-nf-empty" type="text/template">

</script>
<script id="tmpl-nf-before-form" type="text/template">
	{{{ data.beforeForm }}}
</script><script id="tmpl-nf-after-form" type="text/template">
	{{{ data.afterForm }}}
</script><script id="tmpl-nf-before-fields" type="text/template">
    <div class="nf-form-fields-required">{{{ data.renderFieldsMarkedRequired() }}}</div>
    {{{ data.beforeFields }}}
</script><script id="tmpl-nf-after-fields" type="text/template">
    {{{ data.afterFields }}}
    <div id="nf-form-errors-{{{ data.id }}}" class="nf-form-errors" role="alert"></div>
    <div class="nf-form-hp"></div>
</script>
<script id="tmpl-nf-before-field" type="text/template">
    {{{ data.beforeField }}}
</script><script id="tmpl-nf-after-field" type="text/template">
    {{{ data.afterField }}}
</script><script id="tmpl-nf-form-layout" type="text/template">
	<form>
		<div>
			<div class="nf-before-form-content"></div>
			<div class="nf-form-content {{{ data.element_class }}}"></div>
			<div class="nf-after-form-content"></div>
		</div>
	</form>
</script><script id="tmpl-nf-form-hp" type="text/template">
	<label for="nf-field-hp-{{{ data.id }}}" aria-hidden="true">
		{{{ nfi18n.formHoneypot }}}
		<input id="nf-field-hp-{{{ data.id }}}" name="nf-field-hp" class="nf-element nf-field-hp" type="text" value=""/>
	</label>
</script>
<script id="tmpl-nf-field-layout" type="text/template">
    <div id="nf-field-{{{ data.id }}}-container" class="nf-field-container {{{ data.type }}}-container {{{ data.renderContainerClass() }}}">
        <div class="nf-before-field"></div>
        <div class="nf-field"></div>
        <div class="nf-after-field"></div>
    </div>
</script>
<script id="tmpl-nf-field-before" type="text/template">
    {{{ data.beforeField }}}
</script><script id="tmpl-nf-field-after" type="text/template">
    <#
    /*
     * Render our input limit section if that setting exists.
     */
    #>
    <div class="nf-input-limit"></div>
    <#
    /*
     * Render our error section if we have an error.
     */
    #>
    <div id="nf-error-{{{ data.id }}}" class="nf-error-wrap nf-error" role="alert"></div>
    <#
    /*
     * Render any custom HTML after our field.
     */
    #>
    {{{ data.afterField }}}
</script>
<script id="tmpl-nf-field-wrap" type="text/template">
	<div id="nf-field-{{{ data.id }}}-wrap" class="{{{ data.renderWrapClass() }}}" data-field-id="{{{ data.id }}}">
		<#
		/*
		 * This is our main field template. It's called for every field type.
		 * Note that must have ONE top-level, wrapping element. i.e. a div/span/etc that wraps all of the template.
		 */
        #>
		<#
		/*
		 * Render our label.
		 */
        #>
		{{{ data.renderLabel() }}}
		<#
		/*
		 * Render our field element. Uses the template for the field being rendered.
		 */
        #>
		<div class="nf-field-element">{{{ data.renderElement() }}}</div>
		<#
		/*
		 * Render our Description Text.
		 */
        #>
		{{{ data.renderDescText() }}}
	</div>
</script>
<script id="tmpl-nf-field-wrap-no-label" type="text/template">
    <div id="nf-field-{{{ data.id }}}-wrap" class="{{{ data.renderWrapClass() }}}" data-field-id="{{{ data.id }}}">
        <div class="nf-field-label"></div>
        <div class="nf-field-element">{{{ data.renderElement() }}}</div>
        <div class="nf-error-wrap"></div>
    </div>
</script>
<script id="tmpl-nf-field-wrap-no-container" type="text/template">

        {{{ data.renderElement() }}}

        <div class="nf-error-wrap"></div>
</script>
<script id="tmpl-nf-field-label" type="text/template">
	<div class="nf-field-label"><label for="nf-field-{{{ data.id }}}"
	                                   id="nf-label-field-{{{ data.id }}}"
	                                   class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ ( 'undefined' != typeof data.required && 1 == data.required ) ? '<span class="ninja-forms-req-symbol">*</span>' : '' }}} {{{ data.maybeRenderHelp() }}}</label></div>
</script>
<script id="tmpl-nf-field-error" type="text/template">
	<div class="nf-error-msg nf-error-{{{ data.id }}}">{{{ data.msg }}}</div>
</script><script id="tmpl-nf-form-error" type="text/template">
	<div class="nf-error-msg nf-error-{{{ data.id }}}">{{{ data.msg }}}</div>
</script><script id="tmpl-nf-field-input-limit" type="text/template">
    {{{ data.currentCount() }}} {{{ nfi18n.of }}} {{{ data.input_limit }}} {{{ data.input_limit_msg }}}
</script><script id="tmpl-nf-field-null" type="text/template">
</script><script id="tmpl-nf-field-textbox" type="text/template">
	<input
			type="text"
			value="{{{ data.value }}}"
			class="{{{ data.renderClasses() }}} nf-element"
			{{{ data.renderPlaceholder() }}}
			{{{ data.maybeDisabled() }}}
			{{{ data.maybeInputLimit() }}}

			id="nf-field-{{{ data.id }}}"
			<# if( ! data.disable_browser_autocomplete && -1 < [ 'city', 'zip' ].indexOf( data.type ) ){ #>
				name="{{ data.custom_name_attribute || 'nf-field-' + data.id + '-' + data.type }}"
				autocomplete="on"
			<# } else { #>
				name="{{ data.custom_name_attribute || 'nf-field-' + data.id }}"
				{{{ data.maybeDisableAutocomplete() }}}
			<# } #>

			aria-invalid="false"
			aria-describedby="nf-error-{{{ data.id }}}"
			aria-labelledby="nf-label-field-{{{ data.id }}}"

			{{{ data.maybeRequired() }}}
	>
</script>
<script id='tmpl-nf-field-input' type='text/template'>
    <input id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element" type="text" value="{{{ data.value }}}" {{{ data.renderPlaceholder() }}} {{{ data.maybeDisabled() }}}
           aria-labelledby="nf-label-field-{{{ data.id }}}"

            {{{ data.maybeRequired() }}}
    >
</script>
<script id="tmpl-nf-field-email" type="text/template">
	<input
			type="email"
			value="{{{ data.value }}}"
			class="{{{ data.renderClasses() }}} nf-element"

			id="nf-field-{{{ data.id }}}"
			<# if( ! data.disable_browser_autocompletes ){ #>
			name="{{ data.custom_name_attribute || 'nf-field-' + data.id + '-' + data.type }}"
			autocomplete="email"
			<# } else { #>
			name="{{ data.custom_name_attribute || 'nf-field-' + data.id }}"
			{{{ data.maybeDisableAutocomplete() }}}
			<# } #>
			{{{ data.renderPlaceholder() }}}
			{{{ data.maybeDisabled() }}}

			aria-invalid="false"
			aria-describedby="nf-error-{{{ data.id }}}"
			aria-labelledby="nf-label-field-{{{ data.id }}}"

			{{{ data.maybeRequired() }}}
	>
</script>
<script id="tmpl-nf-field-textarea" type="text/template">
    <textarea id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element" {{{ data.renderPlaceholder() }}} {{{ data.maybeDisabled() }}} {{{ data.maybeDisableAutocomplete() }}} {{{ data.maybeInputLimit() }}}
        aria-labelledby="nf-label-field-{{{ data.id }}}"

        {{{ data.maybeRequired() }}}
    >{{{ data.value }}}</textarea>
</script>

        <!-- Rich Text Editor Templates -->

        <script id="tmpl-nf-rte-media-button" type="text/template">
            <span class="dashicons dashicons-admin-media"></span>
        </script>

        <script id="tmpl-nf-rte-link-button" type="text/template">
            <span class="dashicons dashicons-admin-links"></span>
        </script>

        <script id="tmpl-nf-rte-unlink-button" type="text/template">
            <span class="dashicons dashicons-editor-unlink"></span>
        </script>

        <script id="tmpl-nf-rte-link-dropdown" type="text/template">
            <div class="summernote-link">
                URL
                <input type="url" class="widefat code link-url"> <br />
                Text
                <input type="url" class="widefat code link-text"> <br />
                <label>
                    <input type="checkbox" class="link-new-window"> {{{ nfi18n.fieldsTextareaOpenNewWindow }}}
                </label>
                <input type="button" class="cancel-link extra" value="Cancel">
                <input type="button" class="insert-link extra" value="Insert">
            </div>
        </script>
    
        <script id="tmpl-nf-field-submit" type="text/template">
                <input id="nf-field-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element " type="button" value="{{{ data.label }}}" {{{ ( data.disabled ) ? 'disabled' : '' }}}>
        </script>
        
        <script id='tmpl-nf-field-button' type='text/template'>
            <button id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" class="{{{ data.classes }}} nf-element">
                {{{ data.label }}}
            </button>
        </script>        
        <script>
            var post_max_size = '64';
            var upload_max_filesize = '64';
            var wp_memory_limit = '40';
        </script>

    </body> <!--end body-->
</html> <!--end html -->
	