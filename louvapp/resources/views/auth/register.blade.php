
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>REGISTRO NUEVO</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset("/assets/js/views/register.js") }}"></script>
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="{{ url("index.html") }}" class="logo-dark">
                        <span><img src="{{ asset("/assets/images/logo-dark.png") }}" alt="dark logo" height="125px"></span>
                    </a>
                    <a href="{{ url("index.html") }}" class="logo-light">
                        <span><img src="{{ asset("/assets/images/logo.png") }}" alt="logo" height="150px"></span>
                    </a>
                </div>


                    <!-- form -->
                    <form action="/registrandoContratista" method="POST" id="formRegistrando">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">NOMBRE</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"  oninput="this.value = this.value.toUpperCase()">    
                        </div>
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">APELLIDO</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">TELÉFONO</label>
                            <input type="text" class="form-control" name="telefonoPersonal" id="telefonoPersonal" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustomUsername">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="" aria-describedby="inputGroupPrepend" required>
                               
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">RFC</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        
                        <div class="mb-0 d-grid text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#termsModal">
                                VER AVISO DE PRIVACIDAD
                            </button>
                        </div>
                        <br>
                        <div class="mb-0 d-grid text-center">
                            <button class="btn btn-primary" type="button" onclick="registrarUsuario()" id="btnSignIn" style="display:none;"><i class="mdi mdi-account-circle" ></i> REGISTRARSE </button>
                        </div>
                       
                    </form>
                    <!-- end form-->
                    

                <!-- Footer-->
                <footer class="footer footer-alt">
                    
                    <p class="text-muted">YA TIENES CUENTA? <a href="" class="btn btn-success">
                        {{ __('Login') }}
                    </a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
      
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-- Contenido del modal (debes ocultarlo inicialmente) -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <!-- Agrega aquí tu HTML -->
                    <h1>Aviso de Privacidad</h1>

                    <p>En cumplimiento a lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares en adelante la Ley, así como el capítulo V, sección II de los Lineamientos de Aviso de Privacidad, publicados en el Diario Oficial de la Federación el 17 de enero del 2013, la persona moral XXXX, conocida comercialmente como XXXX, (en lo sucesivo XXXX), con domicilio XXXX, con su Registro Federal de Contribuyentes (RFC) XXXX. Con fundamento en los artículos 8, 15, 16, 33, 36 y demás aplicables de la ley y su reglamento, en respeto al derecho de toda persona a la privacidad y a la autodeterminación informativa, pone a disposición del titular de los datos personales (en lo sucesivo el “titular”) el presente aviso de privacidad.</p>
                
                    <h2>1. Datos que recabamos</h2>
                    <p>XXXX en su relación con sus empleados, proveedores y clientes, recaba datos personales de diversa índole para el cumplimiento de sus fines comerciales, siendo responsable del uso que se les dé y de su respectiva protección, contando con medios tecnológicos y procedimentales para limitar el uso y divulgación de dichos datos. XXXX tiene como una de sus finalidades dentro de su objeto social la prestación de servicios profesionales legales, tales como la consultoría corporativa, civil, mercantil y fiscal.</p>
                
                    <h2>2. Finalidad del tratamiento de los datos personales.</h2>
                    <p>Se hace de su conocimiento que las actividades de recolección, obtención, uso, almacenamiento, acceso y tratamiento de datos personales por parte de XXXX estarán sujetas a la ley, su reglamento y demás disposiciones generales aplicables, datos que se encontrarán sujetos a las siguientes finalidades:</p>
                    <ul>
                        <li>a) Identificarlo en cualquier tipo de relación jurídica con XXXX</li>
                        <li>b) Procesamiento de datos;</li>
                        <li>c) Evaluar la calidad del servicio;</li>
                        <li>d) Llevar a cabo estudios estadísticos relativos al mejoramiento de nuestros servicios;</li>
                        <li>e) Gestión de pagos;</li>
                        <li>f) Emisión de facturas y comprobantes de pago;</li>
                        <li>g) Realizar estudios estadísticos.</li>
                    </ul>
                
                    <h2>3. Medios para ejercer los derechos de acceso, rectificación, cancelación u oposición.</h2>
                    <p>De conformidad con lo dispuesto en la ley, el titular podrá acceder, rectificar y cancelar sus datos personales, así como oponerse a la divulgación de estos a través de los procedimientos que XXXX ha implementado. También podrá solicitar en nuestras instalaciones el formato para acceder, rectificar, cancelar y oponerse a la divulgación de los mismos. Para más información sobre cómo ejercer los derechos de Acceso, Rectificación, Cancelación y Oposición (Derechos ARCO), oponerse a la divulgación de sus datos, revocar su consentimiento o manifestar negativa al tratamiento de estos, el titular deberá ponerse en contacto con: XXXX, representante legal de XXXX; a través de correo electrónico XXXX o en el domicilio que se señala en el preámbulo del presente aviso.</p>
                
                    <p>Al proporcionar información a XXXX por cualquier medio, el titular confirma que está de acuerdo con los términos del presente aviso de privacidad. Si el titular no estuviere de acuerdo con cualquier término del aviso de privacidad, no estará obligado de proporcionar dato personal alguno. Si decide no proporcionar a XXXX ciertos datos personales, acepta la posibilidad de no tener acceso a los productos y servicios que proporciona XXXX, de igual manera acepta que ésta no completará o cumplirá con aquellos procesos en los cuales se requiere dicha información, sin que se genere responsabilidad alguna para ésta última.</p>
                
                    <h2>4. Límites al uso y la divulgación de sus datos personales.</h2>
                    <p>Los datos personales del titular serán resguardados en base a los principios de licitud, consentimiento, información, calidad, finalidad, lealtad, proporcionalidad y responsabilidad, mismos que se encuentran consagrados en la Ley. XXXX solo utilizará los datos para los fines y supuestos anteriormente mencionados y su divulgación solo podrá hacerse siempre que dicha transferencia se relacione con dichos fines. En caso de no proporcionar correctamente los datos solicitados XXXX no tendrá ninguna responsabilidad derivada de este supuesto.</p>
                
                    <h2>5. Medidas de seguridad.</h2>
                    <p>Asimismo, XXXX garantiza al titular que los datos personales serán tratados bajo medidas de seguridad tanto administrativas, técnicas y físicas previstas por la Ley u otras leyes especiales, según sean más apropiados de acuerdo con el tipo de datos personales en cuestión y del tratamiento al que están sujetos, garantizando la confidencialidad en todo momento, evitando accesos no autorizados, daño, pérdida, alteración o destrucción de sus datos personales.</p>
                
                    <h2>6. Transferencia de sus datos personales:</h2>
                    <p>Los datos personales que el titular proporcione serán transferidos a terceros para que XXXX cumpla con sus obligaciones comerciales; dichos terceros podrán ser personal interno de la empresa o bien proveedores de esta. Toda transferencia de datos se hace sin prejuicio del otorgante y con total apego a la Ley Federal de Protección de Datos Personales en Posesión de Particulares.</p>
                
                    <form>
                        <label> 
                            <input type="checkbox" class="form-check-input" id="sidoyconsen">
                            SI doy mi consentimiento para la transferencia de datos</label>
                        <br>
                        <!--<label>☐ NO doy mi consentimiento para la transferencia de datos</label>-->
                    </form>
                
                    <h2>7. Cambios al aviso de privacidad.</h2>
                    <p>XXXX se reserva el derecho de modificar el presente aviso de privacidad a su sola discreción. De modificarse el presente aviso, XXXX pondrá públicamente en medios electrónicos y en el domicilio de XXXX el nuevo aviso de privacidad a través de anuncios visibles en nuestro domicilio y/o vía correo electrónico a la última dirección que el titular haya proporcionado. El titular tendrá que estar al pendiente de toda modificación y actualización; todo cambio sustancial al presente, a menos que éste se derive de una reforma al marco jurídico mexicano o a una orden de autoridad competente, se notificará con treinta días naturales de anticipación a que surta efectos la modificación correspondiente.</p>
                
                    <p>De acuerdo con el artículo octavo de la ley, se entenderá que el titular consiente tácitamente el tratamiento de sus datos, cuando habiéndose puesto a su disposición el presente aviso de privacidad, no manifieste su oposición al mismo.</p>
                
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signup" data-bs-dismiss="modal" onclick="showBtn()">
                            <label class="form-check-label" for="checkbox-signup">ACEPTO <a href="javascript: void(0);" class="text-muted">LOS TERMINOS DEL AVISO DE PRIVACIDAD</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-alert-line h1 text-warning"></i>
                        <h4 class="mt-2" id="modalTitle"></h4>
                        <p id="modalMessage"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var registrandoContra = '{{ route('registrandoContratista') }}';
    </script>
</body>

</html>