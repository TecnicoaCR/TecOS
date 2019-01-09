<?php
    require 'assets/funcs.php';
    
    $errors = array();
        if(!empty($_POST)){

            $name = $_POST["name"];
            $service = $_POST["service"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LcDcIgUAAAAALGvcuiq-JR2ewSVl6sa4n8iNZWO';
		
        if (!$captcha){
            $errors[] = "Verificar Catcha.";
        }
        if (isNull($name, $service, $email, $phone,$message)){
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
                        $body .= 'Servicio: ' . $service . "\n\n";
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
                <strong>Nombre Completo: </strong> $name <br><br>
                <strong>Servicio: </strong> $service <br>
                <strong>Email: </strong> $email<br>
                <strong>Telefono: </strong> $phone<br><br>
                <strong>Mensaje: </strong>$message.<br>
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
			if(!(enviarEmail($name, $service, $body))){
                            $errors[] = "Error al enviar Email.";
			}
        }}      
	}
 ?>

<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<base  />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="asesoría, gestoría, contabilidad, asesoría fiscal, asesoría contable, seguros, emprendedores." />
        <meta name="rights" content="TecnicoaCR" />
        <meta name="description" content="Servicio Profesionales en Finanzas" />
 
        <title>PROSERFI Professional Services</title>
        
        <link href="indexc0d0.html?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
        <link href="index7b17.html?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
        <link href="templates/oxygen/favicon.ico" rel="shortcut icon" />
        <link rel="stylesheet" href="plugins/system/iceshortcodes/assets/iceshortcodes.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/animate.min.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/flexslider.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/owl.carousel.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/prettyPhoto.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/gradients.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/YTPlayer.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/theme_panel.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/shortcodes.css" type="text/css" />
        <link rel="stylesheet" href="templates/oxygen/css/custom.css" type="text/css" />
        <link rel="stylesheet" href="modules/mod_cookiesaccept/screen.css" type="text/css" />
        <link rel="stylesheet" href="media/com_uniterevolution/assets/rs-plugin/css/settings.css" type="text/css" />
        <link rel="stylesheet" href="media/com_uniterevolution/assets/rs-plugin/css/captions.css" type="text/css" />
  
        <script src="media/jui/js/jquery.min.js" type="text/javascript"></script>
        <script src="media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
        <script src="media/jui/js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="media/system/js/caption.js" type="text/javascript"></script>
        <script src="../code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="media/com_uniterevolution/assets/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
        <script src="media/com_uniterevolution/assets/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
        <script type="text/javascript">
            jQuery(window).on('load',  function() {
		new JCaption('img.caption');
            });
        </script>

	<link rel="stylesheet" href="templates/oxygen/css/style.css" />
	<link rel="stylesheet" href="templates/oxygen/css/colors/red.css" />
	<!--<link id="changeable-colors" rel="stylesheet" href="/templates//css/colors/red.css" type="text/css"/>-->

	<!--[if lt IE 9]>
		<script src="/media/jui/js/html5.js"></script>
	<![endif]-->
    </head>

    <body>
	<!-- Page Top -->
	<section id="pagetop" class="relative clearfix">
            <div class="pagetop-inner clearfix">
		<div class="col-xs-8 left t-left no-padding">
                    <p class=" normal no-padding no-margin">
                        PROSERFI | FISCAL - LABORAL - JURÍDICO - CONTABLE											</p>
		</div>
		<div class="col-xs-4 right t-right">
                    <a href="tel:506 8974 46 94 " class="semibold page-link">
			<i class="fa fa-angle-right"></i>
			+506 8974-4694
                    </a>
                    <a href="mailto:maynor.greencr@gmail.com " class="semibold page-link">
			<i class="fa fa-angle-right"></i>
                            maynor.greencr@gmail.com
                    </a>
		</div>
            </div>
	</section>
	<!-- End Page Top -->
	
        <!-- NAVBAR SECTION -->
        <?php include 'assets/nav.php'; ?>
        
	<!-- Home Section -->
	<section id="home"> 	
            <div class="moduletable">
		<!-- START REVOLUTION SLIDER ver. 2.2.1 -->
    		<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:500px;direction:ltr;">
                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:500px;height:500px;">						
			<ul>
                            <li data-transition="slotslide-horizontal" data-slotamount="7" data-masterspeed="300" > 
				<img src="images/slider/asesoria-slide1.jpg" alt="" />													
				<div class="tp-caption fade" accesskey="" data-x="-91" data-y="265" data-speed="300" data-start="800" data-easing="easeOutExpo"  >
                                    <p class="rev-text-500 bold uppercase white t-center"> FISCAL - LABORAL - CONTABLE - MERCANTIL </p>
                                </div>
                            </li>				
                            <li data-transition="slotzoom-horizontal" data-slotamount="7" data-masterspeed="300" >    
				<img src="images/slider/asesoria-slide2.jpg" alt="" />														
				<div class="tp-caption fade" data-x="36" data-y="250" data-speed="300" data-start="500" data-easing="easeOutExpo"  >
                                    <p class="rev-text-5 bold uppercase white t-center"> Tu Asesoría de confianza</p>
                                </div>
                            </li>
			</ul>
			<div class="tp-bannertimer"></div>
                    </div>
                </div>				
		
                <script type="text/javascript">
                    var tpj=jQuery;
                    var revapi1;
                    
                    tpj(document).ready(function() {
                        if (tpj.fn.cssOriginal != undefined)
                            tpj.fn.css = tpj.fn.cssOriginal;
                            if(tpj('#rev_slider_1_1').revolution == undefined)
                                revslider_showDoubleJqueryError('#rev_slider_1_1',"joomla");
                            else	
				revapi1 = tpj('#rev_slider_1_1').show().revolution(
				{   delay:5000,
                                    startwidth:960,
                                    startheight:500,
                                    hideThumbs:200,                       
                                    thumbWidth:100,
                                    thumbHeight:50,
                                    thumbAmount:2,
                                    navigationType:"bullet",
                                    navigationArrows:"verticalcentered",
                                    navigationStyle:"round",
                                    touchenabled:"off",
                                    onHoverStop:"off",
                                    shadow:0,
                                    fullWidth:"on",
                                    navigationHAlign:"center",
                                    navigationVAlign:"bottom",
                                    navigationHOffset:0,
                                    navigationVOffset:20,
                                    stopLoop:"off",
                                    stopAfterLoops:-1,
                                    stopAtSlide:-1,
                                    shuffle:"off",
                                    hideSliderAtLimit:0,
                                    hideCaptionAtLimit:0,
                                    hideAllCaptionAtLilmit:0
                                }
                            );
                    });	//ready
		</script>
            <!-- END REVOLUTION SLIDER -->
            </div>
	</section><!-- End Home Section -->
	
        <section id="home-bottom" class="relative full-width clearfix">
            <div class="home-bottom-inner clearfix">
                <div class="moduletable">	
                    <div class="custom"  >
                        <div class="col-xs-7 no-padding t-left left">
                            <h2 class="white normal no-margin no-padding">
                                <span style="color: #ffffff;">Solic&iacute;ta presupuesto</span>
                                <span class="colored condiment bigger"> Sin Compromiso</span>
                            </h2>
                        </div>
                        <div class="col-xs-5 no-padding t-right">
                            <span class="white normal no-margin no-padding"> </span>
                            <span style="color: #ffffff;">
                                <a href="#contc" class="home-bottom-button normal colored-bg white uppercase scroll">
                                    <span style="color: #ffffff;"> Contactar </span>
                                </a>
                                    
                            </span>
                        </div>
                    </div>
		</div>
            </div>
	</section>

	<!-- Servicios -->
	<section id="servicios" class="container waypoint bg">
            <div class="inner">
                <div class="moduletable">			
                    <!-- Header -->
                    <h1 id="serv" class="header semibold dark">
                        <h2>Nuestros Servicios</h2>
                    </h1>
                    <!-- Description -->
                    <h4 class="h-desc d-dark">
                        <p><span style="font-size: 14pt;">
                            PROSERFI Profersonal Services se establece en el 2010 y desde entonces desarrolla soluciones que cubren 
                            todo el espectro de la gesti&oacute;n empresarial. Nuestra clientela compone un abanico muy amplio en cuanto 
                            a tama&ntilde;os, formas jur&iacute;dicas y sectores.</span>
                        </p>
                    </h4>			
                    <!-- Boxes -->
                    <div class="boxes d-dark">
                        <!-- Box 1 -->
			<div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="100">
                            <a class="about-icon">
                                <i class="fa fa-calculator "></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;">CONTABILIDAD Y FINANZAS</a></span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">Desde la realización de auditorías financieras hasta el desarrollo de recomendaciones de gestión: nuestro equipo reúne amplias competencias en materia...</p></p>
			</div>								
			<!-- Box 2 -->
			<div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="300">
                            <a class="about-icon">
                                <i class="fa fa-calendar"></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;">FISCALIDAD Y TRIBUTACI&Oacute;N</a></span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">Abarca todas las exigencias tributarias relacionadas con la gestión empresarial, así como la asistencia a posibles Inspecciones ante el Ministerio de Hacienda.</p></p>
			</div>					
			<!-- Box 3 -->
			<div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="500">
                            <a class="about-icon">
                                <i class="fa fa-group"></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;">CONTROL Y PLANIFICACI&Oacute;N EMPRESARIAL</a></span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">Aproveche toda nuestra experiencia y buen hacer para garantizar el futuro de su empresa a través de medidas empresariales a corto y largo plazo</p></p>
			</div>						
			<!-- Box 4 -->	
                        <div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="700">
                            <a class="about-icon">
                                <i class="fa fa-book"></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;">JURIDICO MERCANTIL</a></span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">Nuestro equipo jurídico  velará porque sus intereses queden a salvo, asistiéndoles en cualquier conflicto ante el Servicio de Mediación Conciliación y Arbitraje</p></p>
			</div>	
			<!-- Box 5 -->
                        <div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="700">
                            <a class="about-icon">
                                <i class="fa fa-bar-chart"></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;">FINANCIERO</a></span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">Contamos con personal altamente cualificado y con una dilatada experiencia bancaria y financiera que podr&aacute; guiarle en sus decisiones tanto de inversi&oacute;n como de financiaci&oacute;n.</p></p>
			</div>
                        <!-- Box 6 -->
                        <div class="col-xs-4 about-box animated" data-animation="fadeIn" data-animation-delay="700">
                            <a class="about-icon">
                                <i class="fa fa-briefcase"></i>
                            </a>
                            <p class="uppercase normal about-head"><p><span style="color: #a61e37;"><a style="color: #a61e37;"></a>PRESUPUESTO PERSONALIZADO</span></p></p>
                            <p class="light about-text"><p style="text-align: justify;">PROSERFI Profesional Services tiene unos precios muy competitivos que se ajustan perfectamente a las necesidades de las empresas. Contacta ahora para obtener un presupuesto personalizado a medida.</p></p>
			</div>
                    </div><!-- End Boxes -->
                </div>
            </div><!-- End About Inner -->
        </section><!-- End About Section -->

	<!-- Testimonials -->
	<section class="testimonials parallax2">
            <div class="inner">
                <div class="moduletable">
                    <h3>Nuestros clientes opinan:</h3>
                    <!-- Header -->
                    <ul class="t-slides">
                        <!-- Testimonial -->
                        <li class="monial">
                            <!-- Logo Client -->
                            <img src="images/client_1.png" alt="" />
                            <!-- Text -->
                            <h1 class="uppercase bold condensed white"><p>Seguridad Falcon Guanacaste</p></h1>
                            <!-- Name -->
                            <p class="light uppercase"><p>Atenci&oacute;n muy profesional y eficiente. Con la ayuda de PROSERFI, hemos aumentado nuestro rendimiento empresarial.</p></p>
			</li>	
                        <!-- Testimonial -->
                        <li class="monial">
                            <!-- Logo Client -->
                            <img src="images/client_2.png" alt="" />
                            <!-- Text -->
                            <h1 class="uppercase bold condensed white"><p>TecnicoaCR Professional Services</p></h1>
                            <!-- Name -->
                            <p class="light uppercase"><p>Amplios concocimientos contables, laborales y fiscales. Capaces de ofrecer una verdadera solución.</p></p>
			</li>				
			<!-- Testimonial -->
                        <li class="monial">
                            <!-- Logo Client -->
                            <img src="images/client_3.png" alt="" />
                            <!-- Text -->
                            <h1 class="uppercase bold condensed white"><p>Servicios Técnicos de Centroamerica HT Setecca</p></h1>
                            <!-- Name -->
                            <p class="light uppercase"><p>Una gestor&iacute;a de confianza y con grandes profesionales</p></p>
                        </li>	
                    </ul>
                </div>
            </div><!-- End Inner Div -->
        </section><!-- End Testimonials Section -->     
        
        <!-- Contact Section -->
	<section id="contact" class="container parallax5">
            <!-- Contact Inner -->
            <div class="inner contact" id="contc">
                
                <?php
                    // Imprimir errores registrados
                    echo resultBlock($errors);
                ?>
                
                <div class="moduletable">
                    <h1 class="header semibold white"><p><span style="color: #000000;">Contacta con PROSERFI Professional Services</span></p></h1>
                    <br />
    
                    <form name="contac" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div id="sp_quickcontact118" class="sp_quickcontact contact-form">
                            <!-- Left Inputs -->
                            <div class="col-xs-6 animated" data-animation="fadeInLeft" data-animation-delay="300">
                                <div id="sp_qc_status"></div>
                                <div class="sp_qc_clr"></div>
                                <input type="text" name="name" id="name" class="form light" placeholder="Nombre Completo" />
                                <div class="sp_qc_clr"></div>
                                <input type="text" name="service" id="email" class="form light" placeholder="Servicio" />
                                <div class="sp_qc_clr"></div>
                                <input type="text" name="email" id="email" class="form light" placeholder="Correo Electrónico" />
                                <div class="sp_qc_clr"></div>
                                <input type="text" name="phone" id="email" class="form light" placeholder="Telefono" />
                                <div class="sp_qc_clr"></div>
                            </div><!-- End Left Inputs -->
			<!-- Right Inputs -->
			<div class="col-xs-6 animated" data-animation="fadeInRight" data-animation-delay="300">
                            <textarea name="message" id="message" class="form textarea light" cols="" rows="" placeholder="Mensaje"></textarea>	
                            <div class="sp_qc_clr"></div>
                            <div class="g-recaptcha" data-sitekey="6LcDcIgUAAAAAGaPvgZ2IfMVRflMqlCzni-8s-JT"></div>
                            <div class="sp_qc_clr"></div>
                            <br />
			</div><!-- End Right Inputs -->
			<!-- Bottom Submit -->
			<div class="relative fullwidth col-xs-12">
                            <input id="sp_qc_submit" class="button form-btn light" type="submit" value="Enviar" />
                            <div class="sp_qc_clr"></div>
			</div><!-- End Bottom Submit -->
			<!-- Clear -->
                        <div class="clear"></div>
                    </div>
                    </form>                        	
                </div>
            </div><!-- End Inner -->
	</section><!-- End Contact Section -->

	<!-- Site Socials and Address -->
	<section id="site-socials" class="no-padding  bg">
            <div class="site-socials inner no-padding">
		<div class="moduletable">		 
                    <!-- Header --
                    <div class="socials">
                        <a  target="_blank" class="social" href="http://facebook.com/proserfi/"><i class="fa fa-facebook"></i></a>
                        <a  target="_blank" class="social" href="http://#"><i class="fa fa-twitter"></i></a>
                        <a  target="_blank" class="social" href="http://#"><i class="fa fa-instagram"></i></a>
                    </div>
		
                    <!-- Adress, Mail -->
                    <div class="address">
			<!-- Phone Number, Mail -->
			<p> +506 8974-4694 | <a href="mailto:maynor.greencr@gmail.com" class="bold dark">maynor.greencr@gmail.com</a></p>
			<!-- Adress -->
			<p>Desde Hojancha, Guanacaste. <span class="bold colored">(Costa Rica) </span></p>
			<!-- Top Button -->
                    </div><!-- End Adress, Mail -->
                </div>
		<!-- Socials -->
		<!-- Adress, Mail -->
		<a href="#home" class="scroll top-button">
                    <i class="fa fa-angle-double-up"></i>
		</a>
            </div><!-- End Inner -->
	</section><!-- End Site Socials and Address -->


        <!-- Shortcode Section -->
        <section id="shortcodes" class="container">
            <div class="inner_s">
		<!-- Accordions, Tabs -->
		<div class="cont">
                    <!-- Tabs -->
		    <div class="clear"></div>
		</div><!-- End Accordions, Tabs Inner -->
		<!-- Facts, Skills -->
		<div class="cont">
                    <div class="clear"></div>
		</div>
            </div><!-- End inner -->
	</section><!-- End Short Codes -->

	<!-- Footer -->
	<footer class="footer">
            <h2 class="company-name condensed uppercase white bold"><a class="white" href="/">PROSERFI Profssional Services</a></h2>
            <!-- Copyright -->
            <p class="copyright normal">&copy;2019 Todos los derechos reservados | Powered by <a href="http://www.tecnicoacr.com" target="_blank" class="white">TecnicoaCR</a>&nbsp;</p>
	</footer><!-- End Footer -->

	<!-- JS Files -->
	<!--<script src="/templates//js/jquery-1.11.0.min.js" type="text/javascript"></script>-->
	<script src="templates/oxygen/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.appear.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/waypoints.min.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/modernizr-latest.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/SmoothScroll.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.superslides.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.flexslider.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.isotope.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.fitvids.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.slabtext.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/jquery.sticky.js" type="text/javascript"></script>
	<script src="templates/oxygen/js/plugins.js" type="text/javascript"></script>
	<!-- Theme Panel JS-->
	<script src="templates/oxygen/js/theme-panel.js" type="text/javascript"></script>
	  <!--End JS Files -->
</body>
</html>
