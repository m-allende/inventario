<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Contacts</title>
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
                                    class="button button-md button-primary button-winona wow slideInDown" href="#"
                                    data-wow-delay=".4s">Ver Servicios</a></div>
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
                                    class="button button-md button-primary button-winona wow slideInDown" href="#"
                                    data-wow-delay=".4s">Ver Productos</a></div>
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
            </div>
            <div class="swiper-pagination-outer container">
                <div class="swiper-pagination swiper-pagination-modern swiper-pagination-marked"
                    data-index-bullet="true"></div>
            </div>
        </section>
        <section class="section novi-background section-sm">
            <div class="container">
                <div class="layout-bordered">
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon novi-icon icon-lg mdi mdi-phone text-primary"></div>
                            <ul class="list-0">
                                <li><a class="link-default" href="tel:#">+56
                                        9 6917 0184</a></li>
                                <li><a class="link-default" href="tel:#">+56
                                        9 9686 8700</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon novi-icon icon-lg mdi mdi-email text-primary"></div><a
                                class="link-default" href="mailto:#">info@ebenezerautomotriz.cl</a>
                        </div>
                    </div>
                    <div class="layout-bordered-item wow-outer">
                        <div class="layout-bordered-item-inner wow slideInUp">
                            <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary"></div><a
                                class="link-default" href="#">Av San Gregorio
                                #
                                0160
                                <br> La Granja Santiago de Chile, Chile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section novi-background bg-gray-100">
            <div class="range justify-content-xl-between">
                <div class="cell-xl-6 align-self-center container">
                    <div class="row">
                        <div class="col-lg-9 cell-inner">
                            <div class="section-lg">
                                <h3 class="text-uppercase wow-outer"><span class="wow slideInDown">Contactanos</span>
                                </h3>
                                <!-- RD Mailform-->
                                <form class="rd-form rd-mailform" data-form-output="form-output-global"
                                    data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                    <div class="row row-10">
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside"
                                                    for="contact-first-name">Nombre</label>
                                                <input class="form-input" id="contact-first-name" type="text"
                                                    name="name" data-constraints="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside"
                                                    for="contact-last-name">Apellido</label>
                                                <input class="form-input" id="contact-last-name" type="text"
                                                    name="name" data-constraints="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-email">E-mail</label>
                                                <input class="form-input" id="contact-email" type="email"
                                                    name="email" data-constraints="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-phone">Teléfono</label>
                                                <input class="form-input" id="contact-phone" type="text"
                                                    name="phone" data-constraints="">
                                            </div>
                                        </div>
                                        <div class="col-12 wow-outer">
                                            <div class="form-wrap wow fadeSlideInUp">
                                                <label class="form-label-outside" for="contact-message">Tu
                                                    Mensaje</label>
                                                <textarea class="form-input" id="contact-message" name="message" data-constraints=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group group-middle">
                                        <div class="wow-outer">
                                            <button class="button button-primary button-winona wow slideInRight"
                                                type="submit">Enviar Mensaje</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell-xl-5 height-fill wow fadeIn">
                    <div class="google-map-container" data-zoom="5" data-icon="images/gmap_marker.png"
                        data-icon-active="images/gmap_marker.png"
                        data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
                        data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]">
                        <div class="google-map"></div>
                        <ul class="google-map-markers">
                            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
                                data-description="9870 St Vincent Place, Glasgow"></li>
                        </ul>
                    </div>
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
