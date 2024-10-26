<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Servicio Automotriz EBEN-EZER</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800%7CPoppins:300,400,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style-site.css" id="main-styles-link">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-logo"><img src="img/logo.png" alt="" width="151" height="44"
                srcset="img/logo.png" style="border-radius: 50%;" />
        </div>
        <div class="preloader-body">
            <div id="loadingProgressG">
                <div class="loadingProgressG" id="loadingProgressG_1"></div>
            </div>
        </div>
    </div>
    <div class="page">
        @include('site.header')
        <section class="section swiper-container swiper-slider swiper-slider-minimal" data-loop="true"
            data-slide-effect="fade" data-autoplay="4759" data-simulate-touch="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide_video" data-slide-bg="img/image-1.jpg">
                    <div class="container">
                        <div class="jumbotron-classic-content">
                            <div class="wow-outer">
                                <div
                                    class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">
                                    Diferentes Servicios</div>
                            </div>
                            <h1 class="text-uppercase text-white font-weight-bold wow-outer"><span
                                    class="wow slideInDown" data-wow-delay=".2s">Servicios</span></h1>
                            <p class="text-white wow-outer"><span class="wow slideInDown"
                                    data-wow-delay=".35s">Diferentes Servicios para ustedes al precio justo</span></p>
                            <div class="wow-outer button-outer"><a
                                    class="button button-md button-primary button-winona wow slideInDown"
                                    href="{{ route('services') }}" data-wow-delay=".4s">Ver Servicios</a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="img/image-2.jpg">
                    <div class="container">
                        <div class="jumbotron-classic-content">
                            <div class="wow-outer">
                                <div
                                    class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">
                                    Diferentes Productos</div>
                            </div>
                            <h1 class="text-uppercase text-white font-weight-bold wow-outer"><span
                                    class="wow slideInDown" data-wow-delay=".2s">Productos</span></h1>
                            <p class="text-white wow-outer"><span class="wow slideInDown"
                                    data-wow-delay=".35s">Productos para su vehiculo</span></p>
                            <div class="wow-outer button-outer"><a
                                    class="button button-md button-primary button-winona wow slideInDown"
                                    href="{{ route('catalog') }}" data-wow-delay=".4s">Ver Productos</a></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="img/image-3.jpg">
                    <div class="container">
                        <div class="jumbotron-classic-content">
                            <div class="wow-outer">
                                <div
                                    class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">
                                    mas de 2 años de experiencia</div>
                            </div>
                            <h1 class="text-uppercase text-white font-weight-bold wow-outer"><span
                                    class="wow slideInDown" data-wow-delay=".2s">experiencia</span></h1>
                            <p class="text-white wow-outer"><span class="wow slideInDown" data-wow-delay=".35s">Tenemos
                                    años de experiencia</span></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="img/Team1.jpeg">
                    <div class="container">
                        <div class="jumbotron-classic-content">
                            <div class="wow-outer">
                                <div
                                    class="title-docor-text font-weight-bold title-decorated text-uppercase wow slideInLeft text-white">
                                    Equipo Comprometido</div>
                            </div>
                            <h1 class="text-uppercase text-white font-weight-bold wow-outer"><span
                                    class="wow slideInDown" data-wow-delay=".2s">Satisfacción</span></h1>
                            <p class="text-white wow-outer"><span class="wow slideInDown"
                                    data-wow-delay=".35s">Tenemos un equipo comprometido con brindar el mejor servicio
                                    para su vehiculo</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-outer container">
                <div class="swiper-pagination swiper-pagination-modern swiper-pagination-marked"
                    data-index-bullet="true"></div>
            </div>
        </section>
        <section class="section novi-background section-lg text-center bg-gray-100">
            <div class="container">
                <h3 class="text-uppercase font-weight-bold wow-outer"><span class="wow slideInDown">Servicios</span>
                </h3>
                <div class="row row-lg-50 row-35 offset-top-2">
                    @foreach ($services as $service)
                        <div class="col-md-4 wow-outer">
                            <!-- Post Modern-->
                            <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="#">
                                    @if ($service->lastPhoto != null)
                                        <img src="{{ $service->lastPhoto->path }}" alt="" width="571"
                                            height="353" />
                                    @else
                                        <img src="img/no-image.jpg" alt="" width="571" height="353" />
                                    @endif
                                </a>
                                <h4 class="post-modern-title"><a class="post-modern-title"
                                        href="#">{{ $service->name }} </a></h4>
                                <ul class="post-modern-meta">
                                    <li><a class="button-winona"
                                            href="#">${{ number_format($service->lastPrice->price, 0, ',', '.') }}</a>
                                    </li>
                                </ul>
                                <p>{{ $service->description }}</p>
                            </article>
                        </div>
                    @endforeach
                    <div class="col-md-12 wow-outer"><a class="button button-primary button-winona button-md"
                            href="catalog">Ver mas Servicios</a></div>
                </div>
            </div>
        </section>
        <section class="section novi-background section-md text-center">
            <div class="container">
                <h3 class="text-uppercase font-weight-bold wow-outer"><span class="wow slideInDown">Productos
                        Populares</span></h3>
                <div class="row row-lg-50 row-35 offset-top-2">
                    @foreach ($products as $product)
                        <div class="col-md-4 wow-outer">
                            <!-- Post Modern-->
                            <article class="post-modern wow slideInLeft"><a class="post-modern-media" href="#">
                                    @if ($product->lastPhoto != null)
                                        <img src="{{ $product->lastPhoto->path }}" alt="" width="571"
                                            height="353" />
                                    @else
                                        <img src="img/no-image.jpg" alt="" width="571" height="353" />
                                    @endif
                                </a>
                                <h4 class="post-modern-title"><a class="post-modern-title"
                                        href="#">{{ $product->name }} </a></h4>
                                <ul class="post-modern-meta">
                                    <li><a class="button-winona"
                                            href="#">${{ number_format($product->lastPrice->price, 0, ',', '.') }}</a>
                                    </li>
                                    <li>{{ $product->brand->name }}</li>
                                    <li>{{ $product->category->name }}</li>
                                </ul>
                                <p>{{ $product->description }}</p>
                            </article>
                        </div>
                    @endforeach
                    <div class="col-md-12 wow-outer"><a class="button button-primary button-winona button-md"
                            href="catalog">Ver mas Productos</a></div>
                </div>
            </div>
        </section>
        <section class="section novi-background section-lg bg-gray-100">
            <div class="container">
                <div class="row row-30">
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        <!-- Box Minimal-->
                        <article class="box-minimal">
                            <div class="box-chloe__icon novi-icon linearicons-user wow fadeIn"></div>
                            <div class="box-minimal-main wow-outer">
                                <h4 class="box-minimal-title wow slideInDown">Equipo</h4>
                                <p class="wow fadeInUpSmall">Contamos con un equipo de técnicos altamente capacitados y
                                    apasionados por la mecánica automotriz. Cada miembro de nuestro equipo está
                                    comprometido con la formación continua y la actualización de sus conocimientos para
                                    mantenerse al tanto de los últimos avances y tecnologías en la industria. En
                                    EBEN-EZER, creemos que la combinación de experiencia y formación es clave para
                                    ofrecer un servicio de primera clase.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        <!-- Box Minimal-->
                        <article class="box-minimal">
                            <div class="box-chloe__icon novi-icon linearicons-bubble-text wow fadeIn"
                                data-wow-delay=".1s"></div>
                            <div class="box-minimal-main wow-outer">
                                <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".1s">¿Tienes Preguntas?
                                </h4>
                                <p class="wow fadeInUpSmall" data-wow-delay=".1s">¡No dudes en realizar tus consultas!
                                    En EBEN-EZER estamos aquí para ayudarte con cualquier duda o necesidad que tengas
                                    respecto a tu vehículo. Contáctanos hoy mismo y uno de nuestros expertos estará
                                    encantado de asistirte y proporcionarte toda la información que necesites.</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4 wow-outer">
                        <!-- Box Minimal-->
                        <article class="box-minimal">
                            <div class="box-chloe__icon novi-icon linearicons-star wow fadeIn" data-wow-delay=".2s">
                            </div>
                            <div class="box-minimal-main wow-outer">
                                <h4 class="box-minimal-title wow slideInDown" data-wow-delay=".2s">100% Garantizado
                                </h4>
                                <p class="wow fadeInUpSmall" data-wow-delay=".2s">Elegir EBEN-EZER significa optar por
                                    un servicio mecánico de confianza, con un enfoque en la satisfacción del cliente y
                                    la calidad del trabajo. Ofrecemos diagnósticos precisos, soluciones efectivas y un
                                    trato personalizado que asegura que cada cliente se sienta valorado y atendido. Ya
                                    sea que necesite una revisión rutinaria, una reparación compleja o una mejora en su
                                    vehículo, en EBEN-EZER estamos aquí para ayudarle a mantener su automóvil en óptimas
                                    condiciones.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="section novi-background section-lg text-center">
            <div class="container">
                <h3 class="text-uppercase">Categorias de Productos</h3>
                <p><span class="text-width-1">En nuestra tienda encontrara diversas categorias de productos.</span></p>
                <div class="row row-35 row-xxl-70 offset-top-2">
                    @foreach ($categories as $category)
                        <div class="col-sm-6 col-lg-3">
                            <!-- Thumbnail Light-->
                            <article class="thumbnail-light"><a class="thumbnail-light-media" href="#">
                                    @if ($category->lastPhoto != null)
                                        <img class="thumbnail-light-image" src="{{ $category->lastPhoto->path }}"
                                            alt="" width="270" height="300" />
                                    @else
                                        <img class="thumbnail-light-image" src="img/no-image.jpg" alt=""
                                            width="270" height="300" />
                                    @endif
                                </a>
                                <h4 class="thumbnail-light-title"><a href="#">{{ $category->name }} </a></h4>
                            </article>
                        </div>
                    @endforeach
                    <div class="col-md-12 wow-outer"><a class="button button-primary button-winona button-md"
                            href="catalog">Ver Todas las categorias</a></div>
                </div>
            </div>
        </section>
        <section class="section novi-background section-lg text-center bg-gray-100">
            <div class="container">
                <h3 class="text-uppercase wow-outer"><span class="wow slideInUp">Nuestro Equipo</span></h3>
                <div class="row row-lg-50 row-35 row-xxl-70 justify-content-center justify-content-lg-start">
                    <div class="col-md-10 col-lg-6 wow-outer">
                        <!-- Profile Creative-->
                        <article class="profile-creative wow slideInLeft">
                            <figure class="profile-creative-figure"><img class="profile-creative-image"
                                    src="images/team-1-270x273.jpg" alt="" width="270" height="273" />
                            </figure>
                            <div class="profile-creative-main">
                                <h5 class="profile-creative-title"><a href="#">Jose Torres</a></h5>
                                <p class="profile-creative-position">Fundador, Mecánico</p>
                                <div class="profile-creative-contacts">
                                    <div class="object-inline"><span
                                            class="icon novi-icon icon-md mdi mdi-phone"></span><a href="tel:#">+56
                                            9 6917 0184</a></div>
                                </div>
                                <p>Fundador de la empresa, Mecánico titulado</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-10 col-lg-6 wow-outer">
                        <!-- Profile Creative-->
                        <article class="profile-creative wow slideInLeft" data-wow-delay=".2s">
                            <figure class="profile-creative-figure"><img class="profile-creative-image"
                                    src="images/team-2-270x273.jpg" alt="" width="270" height="273" />
                            </figure>
                            <div class="profile-creative-main">
                                <h5 class="profile-creative-title"><a href="#">Jennifer Carrera</a></h5>
                                <p class="profile-creative-position">Fundadora, Marketing y Ventas</p>
                                <div class="profile-creative-contacts">
                                    <div class="object-inline"><span
                                            class="icon novi-icon icon-md mdi mdi-phone"></span><a href="tel:#">+56
                                            9 9686 8700</a></div>
                                </div>
                                <p>Fundadora de la empresa, Encargada de Marketing y Ventas</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- Best offer-->
        <section style="display:none" class="section novi-background section-1 bg-primary-darker text-center"
            style="background-image: url(images/bg-1-1920-455.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-7 col-xl-6">
                        <h3 class="wow-outer"><span class="wow slideInDown text-uppercase">Best offers</span></h3>
                        <p class="heading-subtitle">of September</p>
                        <p class="wow-outer offset-top-4"><span class="wow slideInDown" data-wow-delay=".05s">With a
                                variety of accountants available at our company, you can always choose one that fits
                                your corporate requirements.</span></p>
                        <div class="wow-outer button-outer"><a
                                class="button button-primary-white button-winona wow slideInDown" href="#"
                                data-wow-delay=".1s">Read more</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section style="display:none" class="section novi-background section-lg text-center">
            <div class="container">
                <h3 class="wow-outer"><span class="wow slideInDown text-uppercase">Testimonios</span></h3>
                <!-- Owl Carousel-->
                <div class="owl-carousel wow fadeIn" data-items="1" data-md-items="2" data-lg-items="3"
                    data-dots="true" data-nav="false" data-loop="true" data-autoplay="true"
                    data-autoplay-speed="731" data-autoplay-timeout="4268" data-margin="30" data-stage-padding="0"
                    data-mouse-drag="false">
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-6-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Albert Webb</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I have just bought an apartment in LA thanks to you and your brokers. Everything went
                                smooth and easy, the price was quite affordable, and I’m sure I will use your services
                                again in the future.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-1-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Kelly McMillan</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I have recently sold my rental property in Nelson via inHouse. Everything about the sale
                                was made seamless by your team. You gave me great advice about what was necessary to
                                expedite the sale.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-2-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Harold Barnett</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I really appreciate your time and expertise in helping me find and buy my current home in
                                Seattle, WA. Hope we can do business again in the future and I will recommend you to
                                family and friends.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-3-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Bill Warner</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I have just sold a property with inHouse and I can’t thank them enough. Their team has
                                great communication skills and they have regularly communicated with me throughout the
                                whole process.</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-4-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Ann Lee</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>Your skilled team helped me make the dream of selling my old property a reality. The sale
                                went smoothly, and I just closed on an ideal new place I am excited to call home. Thank
                                you for your great services!</p>
                        </div>
                    </blockquote>
                    <blockquote class="quote-classic">
                        <div class="quote-classic-meta">
                            <div class="quote-classic-avatar"><img src="images/testimonials-person-5-96x96.jpg"
                                    alt="" width="96" height="96" />
                            </div>
                            <div class="quote-classic-info">
                                <cite class="quote-classic-cite">Peter Clarkson</cite>
                                <p class="quote-classic-caption">Regular Client</p>
                            </div>
                        </div>
                        <div class="quote-classic-text">
                            <p>I have to say that inHouse has the best brokers we've ever worked with. Their
                                professionalism, personality, attention to detail, responsiveness and ability to close
                                the deal are outstanding!</p>
                        </div>
                    </blockquote>
                </div>
            </div>
        </section>

        @include('site.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
