<?php
    require 'assets/funcs.php';
    
    $errors = array();
        if(!empty($_POST)){

            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LeuHIkUAAAAANXHj_TANB27EJBaEvjpTtuROlRM';
		
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
<html>
    <head>
	<meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Formulario e información de contacto de TecnicoaCR</title>
		
	<!-- Metatags
	================================================== -->
	<meta name="description" content="Formulario e información de contacto de TecnicoaCR" />
	<meta name="keywords" content="contacto,empresa,desarrollo en costa rica, paginas web en costa rica, diseño web profesional en costa rica, empresa diseño web en costa rica, sitios web en costa rica, conectividad en costa rica, mantenimiento en costa rica, TecnicoaCR, paginas web,costa rica" />
	<meta property="og:title" content="Formulario e información de contacto de TecnicoaCR" />
	<meta property="og:description" content="Formulario e información de contacto de TecnicoaCR" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="es" />
	<meta property="og:url" content="contacto.php" />
	<meta property="og:site_name" content="TecnicoaCR" />
	<meta name="geo.region" content="Costa Rica" />
	<meta name="geo.placename" content="Guanacaste" />
	<meta name="author" content="www.tecnicoacr.com" />
	<meta name="googlebot" content="index,follow,all" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="7 days" />
	<meta name="rating" content="General" />
	
	<!-- CSS styles
	================================================== -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/custom.min_v12.css">
	
	
	<!-- Google Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
	
	

	<!-- InstanceBeginEditable name="styles" -->
	
	<!-- InstanceEndEditable -->
		
	<!-- Favicons 
	================================================== -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<!-- Sitemap
	================================================== -->
	<link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Recaptcha================================================== -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>

	<!-- Header
	================================================== -->
	<header id="header">	
            <?php include 'assets/nav.php';?>
	</header>
	
	<!-- Content
	================================================== -->
	<main>
            <!-- Main Title
            ================================================== -->
            <div class="hero hero-1">
                <div class="container">
                    <div class="hero-message">
                        <div class="row">
                            <div class="col-md-12 col-lg-7 pr-5">
				<h1>¿Listo para el siguiente paso? <span class="CR">¡Contáctenos!</span></h1>
				<p>Estamos muy emocionados de hablar o chatear con usted. O simplemente use el siguiente formulario y envíenos un mensaje.</p>
				<div id="more">
                                    <a class="btn-cta btn-cta-orange" href="#contacto"><i class="fal fa-chevron-circle-down"></i> Ir al formulario</a>
				</div>
                            </div>
                            <!--<div class="col-md-12 col-lg-5 text-center">
				<div class="websites">
                                    <a href="https://proserfi.herokuapp.com" target="_blank" title="Proserfi Professional Services"><img src="assets/img/websites/monitor-proserfi.png" class="img-fluid mt-4" width="640" height="511" alt="Proserfi Professional Services" title="Proserfi Professional Services"></a>
                                    <div class="text-center py-3">
					<small><a href="https://proserfi.herokuapp.com" target="_blank" title="Proserfi Profesional Services"><i class="fal fa-external-link"></i> PROSERFI Professional Services in Finances</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="https://proserfi.herokuapp.com" title="Vea nuestro trabajo"><i class="far fa-chevron-circle-right"></i> Vea nuestro trabajo </a></small>
                                    </div>
				</div>
                            </div>-->
			</div>
                    </div>
		</div>
            </div>

            <!-- Contact form
            ================================================== -->
            <div class="section-blue">
		<div class="container" id="contacto">
                    <div class="shadow-box bg-white border-t-5 border-red rounded-br-lg">
			<div class="row contactForm" itemscope itemtype="http://schema.org/PostalAddress">
                            <div class="col-md-12 col-lg-5">
                                <h3>Información de contacto</h3>
                                <div class="media text-muted mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x fa-fw"></i>
                                    <div class="pl-3">
                                        <p class="media-body mb-2">
                                            <strong class="d-block text-grey-dark">Ubicación</strong>
                                            <span itemprop="streetAddress">
                                                Nicoya, Guanacaste, Costa Rica								
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media text-muted mb-3">
                                    <i class="fas fa-phone fa-2x fa-fw"></i>
                                    <div class="pl-3">
                                        <p class="media-body mb-2">
                                            <strong class="d-block text-grey-dark">Teléfono</strong>
                                            <span itemprop="telephone"><a href="tel:+506-8739-7420">+506-8739-7420</a></span><br>
                                            <span itemprop="telephone"><a href="tel:+506-6295-7664">+506-6295-7664</a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media text-muted mb-3">
                                    <span class="text-success"><i class="fab fa-whatsapp fa-2x fa-fw"></i></span>
                                    <p class="media-body pl-3 pb-3 mb-0 lh-125y">
                                        <strong class="d-block ">Whatsapp</strong>
                                        <a href="https://api.whatsapp.com/send?phone=50687397420" target="_blank">506 8739 7420</a><br>
                                        <a href="https://api.whatsapp.com/send?phone=50662957664" target="_blank">506 6295 7664</a>
                                    </p>
                                </div>
                                <div class="media text-muted mb-3">
                                    <span class="text-blue-darker"><i class="fas fa-envelope fa-2x fa-fw"></i></span>
                                    <p class="media-body pl-3 pb-3 mb-0 lh-125y">
                                        <strong class="d-block ">Correo eléctronico</strong>
                                        <a href="mailto:info@tecnicoacr.com" target="_blank">info@tecnicoacr.com</a>
                                    </p>
                                </div>
                                <div class="media text-muted mb-3">
                                    <span class="text-blue-darker"><i class="fab fa-facebook fa-2x fa-fw"></i></span>
                                    <p class="media-body pl-3 pb-3 mb-0 lh-125y">
                                        <strong class="d-block ">Facebook</strong>
                                        <a href="https://facebook.com/tecnicoacr" target="_blank">@tecnicoacr</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-7">
                                <div id="contactForm">
                                    <form id="formContacto" name="contact" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <div class="contact_input_area">
                                            <div class="row">
                                                <div class="col-12 messages-box">
                                                    <div id="statusBox">
                                                        <div class="alert alert-info d-block">
                                                            <i class="far fa-envelope fa-lg"></i> 
                                                            Enviénos un mensaje mediante el siguiente formulario:
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <input id="lang" name="lang" type="hidden" value="es">
                                                        <input id="genPass" name="genPass" type="hidden" value="o+XBlbjo2+/jqay12bW8ypGE5qe48eW+rNWlr+np0ZY=">
							<input type="text" class="form-control" name="name" id="inputNombre" placeholder="Su nombre completo" value="" required>
							<div class="invalid-feedback inputNombre">Por favor indique el nombre</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Su email" value="" required>
							<div class="invalid-feedback inputEmail">Por favor indique el email</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="emailconfirm" id="inputEmailConf" placeholder="Confirme su email" value="" required>
							<div class="invalid-feedback inputEmailConf">Por favor indique el email</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" name="phone" id="inputTelefono" placeholder="Su teléfono" value="" required>
							<div class="invalid-feedback inputTelefono">Por favor indique el número telefónico</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6"></div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" id="inputMensaje" cols="30" rows="4" placeholder="Su mensaje" required></textarea>
							<div class="invalid-feedback inputMensaje">Falta el mensaje</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-7 col-lg-12 col-xl-7">
                                                            <div class="form-group">
                                                                <div id="recaptcha" class="g-recaptcha" data-sitekey="6LeuHIkUAAAAAPqjGXiK8115SVbg68OTUfejsbPz" data-callback="vcc"></div>
								<div class="inputCaptcha d-none">¡Debe marcar la casilla de recaptcha!</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-5 col-lg-12 col-xl-5">
                                                            <button id="btnSubmit" type="submit" class="btn-cta btn-cta-blue mt-3"><i class="far fa-chevron-circle-right"></i> Enviar ahora</button>
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
	</main>
	
	<!-- Footer
	================================================== -->
		
	<footer class="footer" itemscope itemtype="http://schema.org/LocalBusiness">
            <?php include 'assets/footer.php';?>
	</footer>

	<!-- Scripts
	================================================== -->
        <script src="assets/js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="assets/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<!-- fontawesome
	================================================== -->
        <script defer src="assets/js/all.js" integrity="sha384-3yBLeJ4waqGSAf4A8pjZ13UF7GuhgbdKnBQvIp/TkWoXtQbtwjlIPNjkDRJ46UCn" crossorigin="anonymous"></script>
		
	<!-- Scroll
	================================================== -->
	<script>$(window).scroll(function() {if ($(this).scrollTop() >= 200) {$('#return-to-top').fadeIn(300);} else {$('#return-to-top').fadeOut(300);}});$('#return-to-top').click(function() {
        $('body,html').animate({scrollTop : 0}, 500);});</script>

	<script>$(function(){var r=$("#header nav");$(window).scroll(function(){$(window).scrollTop()>=60?(r.removeClass("bg-custom").addClass("bg-custom-scrolled")):(r.removeClass("bg-custom-scrolled").addClass("bg-custom"))})})</script>
	<script>$(document).ready(function(){var $root=$("html, body");$("#more a").click(function(t){t.preventDefault();var r=$.attr(this,"href"),o=$(r).offset().top-115;return $root.animate({scrollTop:o},1e3),!1});})</script>	
	<script>$(document).ready(function(){var $root=$("html, body");$("#more1 a").click(function(t){t.preventDefault();var r=$.attr(this,"href"),o=$(r).offset().top-115;return $root.animate({scrollTop:o},1e3),!1});})</script>
		
	<!-- Contact Form Scripts
	================================================== -->
	<script src="../../../www.share.sitiosweb-costarica.com/js/functions.js"></script>

	<script>var msgAlert1='Por favor verifique ',msgAlert2=' error(es) en rojo!',msgNameEmpty='Por favor indique el nombre',msgAlfaRegex='Solamente se permiten letras',msgPhoneEmpty='Por favor indique el número telefónico',msgPhoneRegex='No parece ser un número de teléfono válido',msgEmailEmpty='Por favor indique el email',msgEmailRegex='El email no es válido',msgEmailMatch='El email no es válido y/o emails no concuerdan',msgMsgEmpty='Falta el mensaje',msgMsgRegex='Solamente se permiten números y ()-.#',msgSending='¡Un momento por favor, estamos enviando su solicitud!',msgSuccess=', ¡su mensaje fue enviado exitosamente!',msgError='¡El email no se pudo enviar! Se dió el siguiente error',msgOkFields='¡Todo bien por el momento!',msgEmptyFields='¡Por favor revise los campos marcados en rojo!',thankYouPage = 'mensajeEnviado/index.html';</script>
	
	<!-- Contact Form JS
	================================================== -->
	<script defer src="../../../www.share.sitiosweb-costarica.com/js/contactForm.min.js"></script>

	<!-- Structured Data
	================================================== -->
	<script type="application/ld+json">{"@context":"http://schema.org","@type":"LocalBusiness","address":{"@type":"PostalAddress":"40104","addressLocality":"Lagunilla","addressRegion": "Heredia","addressCountry":"Costa Rica","streetAddress":""},"description":"Empresa de desarrollo y diseño web","name":"misChunches","contactPoint":[{"@type":"ContactPoint","telephone":"+506-6003-7033","contactType":"Customer Service","areaServed":"Costa Rica"}],"url": "https://www.mischunches.com","logo":"https://www.mischunches.com/assets/img/brand/mischunches-tagline.png"}
	</script>
    </body>
</html>

