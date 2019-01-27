<?php
    require '../../assets/funcs_2.php';
    
    $errors = array();
        if(!empty($_POST)){
            
            $plan = $_POST['inputPaquete'];
            $pagoInicial = $_POST['pagoInicial'];
            $anualidad = $_POST['anualidad'];
            $dominio = $_POST['dominio'];
            $metodoPago = $_POST['metodoPago'];
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $nombreEmpresa = $_POST['nombreEmpresa'];
            $cedulaEmpresa = $_POST['cedulaEmpresa'];
            $direccion = $_POST['direccion'];
            $pais = $_POST['pais'];
            $provincia = $_POST['provincia'];
            $canton = $_POST['canton'];
         
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LeyBI0UAAAAAB342ImmRDCmOMHRPWb2nOyrR_TP';
		
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
		
                        $body = "Hola, ha recibido un nuevo mensaje del formulario Plan PYME.<br><br>
                            Servicio <br><br>
                            Plan: $plan<br>
                            Pago Inicial: $pagoInicial<br>
                            Anualidad:  $anualidad<br>
                            Dominio: $dominio<br>
                            Metodo de Pago: $metodoPago<br><br>
                                
                            Solicitante<br><br>
                            <strong>Nombre Completo: </strong> $nombre . $apellido <br><br>
                            <strong>Email: </strong> $email <br>
                            <strong>Telefono: </strong> $telefono <br><br>
                            <strong>Mensaje: </strong>$mensaje. <br>
                            <p style='margin: 0;'>Saludos,<br>TecnicoaCR-Team</p>";
                        
                        /* MENSAJE DEL CONTACTO */
			if(!(enviarEmail($body))){ 
                            $errors[] = "Error al enviar Email.";
			}
                        
                        /* MENSAJE PARA CONTACTO */
                        if(!(sendConfirm($email, $name, 'Mensaje de TecnicoaCR', "Hola $name $apellido, Es un placer recibir sus datos, nos comunicaremos con usted con la mayor brevedad posible. Muchas Gracias!."))){
                            $errors[] = "Error al enviar su confirmación.";
			}                        
                    }
                }      
	}
 ?>

<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Plan PYME | TecnicoaCR</title>
		
	<!-- Metatags
	================================================== -->
	<meta name="description" content="Plan de diseño web de una página, especial para PyMEs, Profesionales, Trabajadores Indendienes y Servicios profesionales" />
	<meta name="keywords" content="plan, diseño web, una página, pyme, servicios profesionales, TecnicoaCR, costa rica" />
	<meta property="og:title" content="Plan de diseño web de una página | TecnicoaCR | Costa Rica" />
	<meta property="og:description" content="Plan de diseño web de una página, especial para PyMEs, Profesionales, Trabajadores Indendienes y Servicios profesionales" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="es" />
	<meta property="og:url" content="../planes_de_servicio/dev_pyme/" />
	<meta property="og:site_name" content="TecnicoaCR" />
	<meta name="geo.region" content="Costa Rica" />
	<meta name="geo.placename" content="Guanacaste" />
	<meta name="author" content="TecnicoaCR-Team" />
	<meta name="googlebot" content="index,follow,all" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="7 days" />
	<meta name="rating" content="General" />
	
	<!-- CSS styles
	================================================== -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/custom.min_v12.css">
        
	<!-- Google Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400" rel="stylesheet">
		
	<!-- Favicons 
	================================================== -->
        <link rel="apple-touch-icon" sizes="57x57" href="../../assets/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../../assets/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../../assets/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../../assets/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../../assets/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../../assets/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../../assets/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon_16x16.png">
        <link rel="manifest" href="assets/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

        <link rel="canonical" href="../../index.php" />
        <link rel="alternate" hreflang="en" href="../../en/index.php" />
        
        <!-- Google AdSense
	================================================== -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-7341472316576010",
              enable_page_level_ads: true
            });
        </script>
        
        <!-- Recaptcha================================================== -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
	

</head>
<body>

	<!-- Header
	================================================== -->
	<header id="header">	
            <?php include '../../assets/nav_2.php';?>
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
                                <h1>Plan de Desarrollo Web <span class="pyme">PYME <i class="fal fa-book pyme"></i></span></h1>
                                <p>Este servicio le ofrece sitio web de 2 páginas, para incursionar en Internet con una baja inversión sin sacrificar ni la calidad ni la funcionalidad del sitio web, mostrando la información más relevante de su empresa, productos y/o servicios.</p>
                                <div id="more">
                                    <a class="btn-cta btn-cta-orange" style="background: darkorange" href="#next"><i class="fal fa-chevron-circle-down"></i> Ver Plan PYME <i class="fal fa-book "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		
            <!-- content
            ================================================== -->
            <div class="section-white-wave"><div id="next"></div></div>
            <div class="container section-b" id="content">
                <div class="row">
                    <div class="d-none d-lg-block col-3">
                        <!-- Menu del plan
                        ================================================== -->
                        <nav class="sticky">
                            <h2><i class="fal fa-list pyme"></i> Menú</h2>
                            <ul class="sidebarList mb-5" id="sidebar">
                                <li><a href="#descripcion"><i class="fal fa-comments fa-fw pyme"></i> Descripción</a></li>
                                <li><a href="#caracteristicas"><i class="fal fa-clipboard-list-check fa-fw pyme"></i> Características</a></li>
                                <li><a href="#inversion"><i class="fal fa-file-invoice-dollar fa-fw pyme"></i> Condiciones de pago</a></li>
                                <li><a href="#pago"><i class="fal fa-money-check-alt fa-fw pyme"></i> Métodos de de pago</a></li>
                                <li><a href="#dominio"><i class="fal fa-globe-americas fa-fw pyme"></i> Disponibilidad de dominio</a></li>
                                <!--<li><a href="#comprar"><i class="fal fa-shopping-cart fa-fw"></i> Contratar plan</a></li>-->
                            </ul>
                            <h4 class="mt-5"><i class="fal fa-list pyme"></i> Otros Planes</h4>
                            <ul class="sidebarList">
                                <li><a href="../dev_pro/"><i class="fal fa-coffee fa-fw pro"></i> PRO</a></li>
                                <li><a href="../dev_plus/"><i class="fal fa-code fa-fw plus"></i> PLUS</a></li>
                                <li><a href="../mkt_social/"><i class="fal fa-globe fa-fw social"></i> SOCIAL</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col offset-0 pr-4">
                        <!-- descripcion -->
                        <div class="section-b">
                            <h2 class="pb-3" id="descripcion"><i class="fal fa-book pyme"></i> <strong><span class="tecnicoa">Plan</span> <span class="pyme">PYME</span></strong></h2>
                            <div class="text-justify">
                                <p>Este plan de servicio le ofrece un sitio web de dos (2) páginas con todas las funcionalidades de un diseño tradicional. No posee límite de texto aunque se recomienda publicar la información más relevante para no confundir al usuario.</p>
				<p>Nuestro <strong><span class="tecnicoa">Plan</span> <span class="pyme">PYME</span></strong> es ideal para Emprendedores, PyMEs, Profesionales, Trabajadores Independientes, Instituciones y en general para los que  que deseen tener presencia en la Internet con una inversión baja, pero de gran calidad y funcionalidad. La estructura formal del plan es la siguiente:</p>
				<ol>
                                    <li><strong>Página principal</strong>: <br>Información de la empresa y lista de servicios o productos ofrecidos.</li>
                                    <li><strong>Página de contacto</strong>: <br>Información de contacto, redes sociales y formulario de contacto</li>                                    
				</ol>
                            </div>
                        </div>			
			<!-- caracteristicas -->
                        <div class="section-b">
                            <h2 class="pb-3" id="caracteristicas"><i class="fal fa-clipboard-list-check pyme"></i> Características del <strong><span class="tecnicoa">Plan</span> <span class="pyme">PYME</span></strong></h2>
                            <!-- Caracteristicas generales
                            ================================================== -->
                            <h4>Características generales</h4>
                            <ul>
                                <li>Diseño web personalizado</li>
                                <li>Diseño web adaptativo para dispositivos móviles</li>
                                <li>Diseño web en cumplimiento de estándares de diseño web internacionales</li>
                                <li>Registro de dominio gratuito (.com)</li>
                                <li>Hospedaje web</li>
                                <li>Diseño de logo básico</li>
                                <li>Posicionamiento del sitio con SEO básico - optimización del motor de búsqueda</li>
                            </ul>	
                            <h4>Características específicas</h4>
                            <ul>
                                <li>2 páginas o secciones</li>
                                <li>1 formulario de contacto</li>
                                <li>1 actualización mensual del contenido (texto e imagenes)</li>
                                <li>2 imagenes de alta definición gratuitas</li>
                                <li>Tiempo de entrega: 7 - 15 días laborales</li>
                            </ul>
                        </div>
                        <!-- inversion -->
                        <div class="section-b">
                            <h2 class="pb-3" id="inversion"><i class="fal fa-file-invoice-dollar pyme"></i> Condiciones de pago del <strong><span class="tecnicoa">Plan</span> <span class="pyme">PYME</span></strong></h2>
                            <div class="row pb-5">
                                <div class="col-sm-12 col-md-4 text-center">
                                    <div class="card shadow-pricing mb-4">
                                        <div class="card-header text-white bg-site-pyme">Primer mensualidad</div>
                                        <div class="card-body plans-price">
                                            <p>US $24.99</p>
                                            <small>(₡ 15,243.88)</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="mt-0">Inversión inicial:</h5>
                                    <p>La inversión inicial de <strong>US $24.99</strong> incluye todas las características indicadas para este plan. ¡No existe ningún otro costo oculto!</p>
                                    <h5 class="mt-4">Condiciones de pago:</h5>
                                    <ul>
                                        <li>Pago de contado: <strong>US $24.99</strong> para iniciar el proceso.</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <!-- metodos de pago -->
                        <div class="section-b">
                            <h2 class="pb-3" id="pago"><i class="fal fa-money-check-alt pyme"></i> Métodos de pago</h2>
                            <div class="text-justify pb-3">
                                <p>Aceptamos unicamente transferencia o depósito bancario y pago mediante tarjeta de crédito a través de PayPal. Además, en cumplimiento con las leyes de Costa Rica, Ud. recibirá una factura digital por cualquier pago que le realice a <strong><span class="tecnicoa">Tecnicoa</span><span class="CR">CR</span>&reg;</strong></p>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-5 text-center">
                                    <div class="shadow-img-bank">
                                        <img src="../../assets/img/brand/logo-bncr.png" class="img-fluid img-thumbnail" width="220" height="90" alt="Banco Nacional de Costa Rica">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-5 text-center">
                                    <div class="shadow-img-bank">
                                        <img src="../../assets/img/brand/logo_bcr.png" class="img-fluid img-thumbnail" width="220" height="90" alt="Banco de Costa Rica">
                                    </div>
                                </div>
                               
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 mb-5 text-center">
                                    <div class="shadow-img-bank">
                                        <img src="../../assets/img/brand/logo_paypal.png" class="img-fluid img-thumbnail" width="220" height="90" alt="PayPal">
                                    </div>
                                </div>
                            </div>
                        </div>		
                        <!-- dominio -->
                        <div class="section-b">
                            <h2 class="pb-3" id="dominio"><i class="fal fa-globe-americas pyme"></i> Nosotros nos encargamos de encontrar el nombre de dominio por usted</h2>
                            <div class="text-justify pb-4">
                                <p>Que no le preocupe el tema del sobre los nombres de dominio, el equipo de TecnicoaCR se encargará de registrarlo y configurarlo al sitio web.</p>
				<p>En <strong><span class="tecnicoa">Tecnicoa</span><span class="CR">CR</span>&reg;</strong> el costo y la configuración del dominio (.com) están incluidos en nuestros planes de desarrollo web. Otros dominios pueden ser utilizados pero el costo del mismo no está incluido.</p>
                            </div>
                        </div>
                        <!-- solicitar diseño web --
                        <div class="section section-b" id="formulario">
                            <h2 class="pb-3" id="comprar"><i class="fal fa-shopping-cart tecnicoa"></i> Contratar <strong><span class="tecnicoa">Plan</span> <span class="tecnicoa">PYME</span></strong></h2>
                            <div class="text-justify pb-4">
                                <p>Para contratar este plan, por favor complete el siguiente formulario. O bien, si requiere de alguna información adicional, no dude en <a href="../../contacto.php">contactarnos</a>, y con gusto le ayudaremos en lo que necesite para seleccionar el servicio ideal para su empresa o negocio.</p>
                            </div>
                            <!--web design plan request form --
                            <div class="shadow-d-md bg-white border-t-5 border-blue rounded-br">
                                <form id="solicitarPlanPYME" novalidate>
                                    <fieldset class="pb-4"> 
                                        <legend>Información del <strong><span class="tecnicoa">Plan</span> <span class="tecnicoa">PYME <i class="fal fa-book "></i></span></strong></legend>
                                            <div class="form-row">
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label for="inputPaquete">Plan </label>
                                                    <input class="form-control" id="inputPaquete" name="plan" value="PYME" readonly required>
						</div>
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label for="inputPagoInicial">Pago inicial (US$)</label>
                                                    <input class="form-control" id="inputPagoInicial" name="pagoInicial" value="24.99" readonly required>
						</div>
                                              
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label for="inputAnualidad">Anualidad (US$)</label>
                                                    <input class="form-control" id="inputAnualidad" name="anualidad" value="299.88" readonly required>
						</div>
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label for="inputDominio">Dominio</label>
                                                    <input class="form-control" id="inputDominio" name="inputDominio" required>
                                                    <div class="invalid-feedback inputDominio"></div>
						</div>
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label for="selectPago">Método de pago</label>
                                                    <select id="selectPago" class="form-control" name="selectPago" tabindex="3">
                                                        <option value="">Seleccione método de pago</option>
                                                        <option selected value="transferencia">Transferencia Bancaria</option>
                                                        <option value="paypal">Tarjeta de crédito (PayPal)</option>
                                                        <option value="informacion">Sólo requiero más información</option>
                                                    </select>
                                                    <div class="invalid-feedback selectPago"></div>
                                                </div>
                                            </div>
                                    </fieldset>
                                    <fieldset class="pb-4">
                                        <legend>Solicitante</legend>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputCedula">Cedula</label>
                                                <input class="form-control" id="inputCedula" name="inputCedula" required tabindex="4">
                                                <div class="invalid-feedback inputCedula"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputNombre">Nombre</label>
                                                <input class="form-control" id="inputNombre" name="inputNombre" required tabindex="4">
                                                <div class="invalid-feedback inputNombre"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputApellido">Apellido</label>
                                                <input class="form-control" id="inputApellido" name="inputApellido" required tabindex="5">
                                                <div class="invalid-feedback inputApellido"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputTelefono">Teléfono</label>
                                                <input type="tel" class="form-control" id="inputTelefono" name="inputTeledono" required tabindex="6">
						<div class="invalid-feedback inputTelefono"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" required tabindex="7">
						<div class="invalid-feedback inputEmail"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputEmailConf">Confirme email</label>
                                                <input type="email" class="form-control" id="inputEmailConf" name="inputEmailConf" required tabindex="8">
						<div class="invalid-feedback inputEmailConf"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="pb-4">
                                        <legend>Empresa o Persona Física</legend>
                                        <div class="form-row">
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputEmpresa">Empresa</label>
                                                <input class="form-control" id="inputEmpresa" name="inputEmpresa" required tabindex="9">
                                                <div class="invalid-feedback inputEmpresa"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="inputEmpresaId">N° identificación</label>
                                                <input class="form-control" id="inputEmpresaId" name="inputEmpresaId" required tabindex="10">
                                                <div class="invalid-feedback inputEmpresaId"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-12">
                                                <label for="inputDireccion">Dirección</label>
                                                <textarea id="inputDireccion" class="form-control" name="inputDireccion" rows="2" required tabindex="11"></textarea>
                                                <div class="invalid-feedback inputDireccion"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="selectPais" class="col-md-12 col-form-label">Pais</label>
                                                <select id="selectPais" class="form-control" name="selectPais" tabindex="12"></select>
                                                <div class="invalid-feedback selectPais"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="selectProvincia" class="col-md-12 col-form-label">Provincia / Estado</label>
                                                <select id="selectProvincia" class="form-control" name="selectProvincia" tabindex="13"></select>
                                                <div class="invalid-feedback selectProvincia"></div>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label for="selectCanton" class="col-md-12 col-form-label">Cantón</label>
                                                <select id="selectCanton" class="form-control" name="selectCanton" disabled tabindex="14"></select>
                                                <div class="invalid-feedback selectCanton"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="pb-4">
                                        <div class="form-row justify-content-end">
                                            <div class="form-group col-md-8">
                                                <div id="recaptcha" class="g-recaptcha" data-sitekey="6LeyBI0UAAAAANzQM_JiHPIeeziVy5FNax3ghRmm" data-callback="vcc"></div>
                                                <div class="inputCaptcha d-none">¡Debe marcar la casilla de recaptcha!</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="btn-cta btn-cta-blue" tabindex="16"><i class="far fa-chevron-circle-right"></i> Comprar este plan</button>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-9">
                                                <div id="successMsg"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </main>
	
	<!-- Footer
	================================================== -->
		
	<footer class="footer" itemscope >
            <?php include '../../assets/footer_2.php';?>
	</footer>

	<!-- Scripts
	================================================== -->
        <script src="../../assets/js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="../../assets/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="../../assets/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<!-- WOW
	================================================== -->
        <script src="../../assets/js/wow.min.js"></script>
	<script>wow=new WOW({animateClass:"animated",offset:100,callback:function(a){console.log("WOW: animating <"+a.tagName.toLowerCase()+">")}}),wow.init();</script>
	
	<!-- fontawesome
	================================================== -->
        <script defer src="../../assets/js/all.js" integrity="sha384-3yBLeJ4waqGSAf4A8pjZ13UF7GuhgbdKnBQvIp/TkWoXtQbtwjlIPNjkDRJ46UCn" crossorigin="anonymous"></script>
		
	<!-- Scroll
	================================================== -->
	<script>$(window).scroll(function() {if ($(this).scrollTop() >= 200) {$('#return-to-top').fadeIn(300);} else {$('#return-to-top').fadeOut(300);}});$('#return-to-top').click(function() {
            $('body,html').animate({scrollTop : 0}, 500);});</script>

	<script>$(function(){var r=$("#header nav");$(window).scroll(function(){$(window).scrollTop()>=60?(r.removeClass("bg-custom").addClass("bg-custom-scrolled")):(r.removeClass("bg-custom-scrolled").addClass("bg-custom"))})})</script>
	<script>$(document).ready(function(){var $root=$("html, body");$("#more a").click(function(t){t.preventDefault();var r=$.attr(this,"href"),o=$(r).offset().top-115;return $root.animate({scrollTop:o},1e3),!1});})</script>	
	<script>$(document).ready(function(){var $root=$("html, body");$("#more1 a").click(function(t){t.preventDefault();var r=$.attr(this,"href"),o=$(r).offset().top-115;return $root.animate({scrollTop:o},1e3),!1});})</script>

	<script>$(document).ready(function(){var $root=$("html, body");$("#sidebar a").click(function(t){t.preventDefault();var r=$.attr(this,"href"),o=$(r).offset().top-127;return $root.animate({scrollTop:o},1e3),!1});})</script>
        <script defer src="../../assets/js/functions.js"></script>
        <script defer src="../../assets/js/countries.min.js"></script>
		
        <script>var msgSearchResult='Resultado de la búsqueda',msgDomainEmpty='Por favor indique el dominio',msgDomainEmptyFirst='Por favor indique primero el dominio',msgDomainRegex='El dominio no es válido',msgDomainSelect='Por favor seleccione el estado del dominio',msgDomainSearch='Buscando disponibilidad de',msgDomainAvailable='Disponible',selCountry='Seleccione país',selState='Seleccione provincia',selCounty='Seleccione cantón',msgAlert1='Por favor verifique ',msgAlert2=' campo(s) en rojo!',msgNameEmpty='Por favor indique el nombre',msgLastnameEmpty='Por favor indique el apellido',msgAlfaRegex='Solamente se permiten letras',msgPhoneEmpty='Por favor indique el número telefónico',msgPhoneRegex='No parece ser un número de teléfono válido',msgEmailEmpty='Por favor indique el email',msgEmailRegex='El email no es válido',msgEmailMatch='Los email no concuerdan',msgCompanyEmpty='Por favor indique la empresa o persona física',msgCompanyIDEmpty='Por favor indique el número de identificación',msgMsgRegex='Solamente se permiten números y ()-.#',msgPMSel='Por favor seleccione el modo de pago',msgCountrySel='Por favor seleccione un país',msgStateSel='Por favor seleccione una provincia',msgCountySel='Por favor seleccione un cantón',msgAddressEmpty='Por favor indique la dirección',msgSending=', estamos enviando su solicitud ...',msgError='Se dió un error. Por favor trate de nuevo o bien seleccione "registrado" para continuar el proceso.',thankYouPage = '../gracias/index.html';;</script>

        <script src="../assets/js/planes.min.js"></script>

    </body>
</html>

