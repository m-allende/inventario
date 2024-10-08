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

        <div class="row mt-5 ml-3">
            <div class="col-8">
                <section class="section novi-background section-md text-center">
                    <div class="container">
                        <div class="row row-lg-50 row-35 offset-top-2">
                            @foreach ($products as $product)
                                <div class="col-md-3 wow-outer">
                                    <!-- Post Modern-->
                                    <article class="post-modern wow slideInLeft"><a class="post-modern-media"
                                            href="#">
                                            @if ($product->lastPhoto != null)
                                                <img src="{{ $product->lastPhoto->path }}" alt="" width="571"
                                                    height="353" />
                                            @else
                                                <img src="img/no-image.jpg" alt="" width="571"
                                                    height="353" />
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
                            <div class="col-12 pb-1">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mb-3">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer class="section novi-background footer-advanced bg-gray-700">
            <div class="footer-advanced-main">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-lg-4">
                            <h5 class="font-weight-bold text-uppercase text-white">About Us</h5>
                            <p class="footer-advanced-text">inHouse is the largest full-service real estate and
                                property management company. We offer expertise in the marketing and sale of a wide
                                range of properties, including residential real estate, farms and lifestyle blocks, as
                                well as commercial and industrial properties that we hope may interest you.</p>
                        </div>
                        <div class="col-sm-7 col-md-5 col-lg-4">
                            <h5 class="font-weight-bold text-uppercase text-white">Recent Blog Posts</h5>
                            <!-- Post Inline-->
                            <article class="post-inline">
                                <p class="post-inline-title"><a href="#">Real Estate Guide: 7 Important Tips for
                                        Buying a Home</a></p>
                                <ul class="post-inline-meta">
                                    <li>by Mike Barnes</li>
                                    <li><a href="#">2 days ago</a></li>
                                </ul>
                            </article>
                            <!-- Post Inline-->
                            <article class="post-inline">
                                <p class="post-inline-title"><a href="#">Single-Family Homes as a Housing Option
                                        for Young Families</a></p>
                                <ul class="post-inline-meta">
                                    <li>by Mike Barnes</li>
                                    <li><a href="#">2 days ago</a></li>
                                </ul>
                            </article>
                        </div>
                        <div class="col-sm-5 col-md-7 col-lg-4">
                            <h5 class="font-weight-bold text-uppercase text-white">Gallery</h5>
                            <div class="row row-x-10" data-lightgallery="group">
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-1.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-1-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-2.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-2-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-3.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-3-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-4.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-4-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-5.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-5-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-6.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-6-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"> </div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-7.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-7-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                                <div class="col-3 col-sm-4 col-md-3"><a class="thumbnail-minimal"
                                        href="images/gallery-original-8.jpg" data-lightgallery="item"><img
                                            class="thumbnail-minimal-image" src="images/footer-gallery-8-85x85.jpg"
                                            alt="" />
                                        <div class="thumbnail-minimal-caption"></div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-advanced-aside">
                <div class="container">
                    <div class="footer-advanced-layout">
                        <div>
                            <ul class="list-nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="#">Properties</a></li>
                                <li><a href="{{ route('login') }}">Intranet</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="foter-social-links list-inline list-inline-md">
                                <li><a class="icon novi-icon icon-sm link-default mdi mdi-facebook"
                                        href="#"></a></li>
                                <li><a class="icon novi-icon icon-sm link-default mdi mdi-twitter" href="#"></a>
                                </li>
                                <li><a class="icon novi-icon icon-sm link-default mdi mdi-instagram"
                                        href="#"></a></li>
                                <li><a class="icon novi-icon icon-sm link-default mdi mdi-google" href="#"></a>
                                </li>
                                <li><a class="icon novi-icon icon-sm link-default mdi mdi-linkedin"
                                        href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <hr />
            </div>
            <div class="footer-advanced-aside">
                <div class="container">
                    <div class="footer-advanced-layout"><a class="brand" href="index.html"><img src="img/logo.png"
                                alt="" width="115" height="34" srcset="img/logo.png" /></a>
                        <!-- Rights-->
                        <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights
                            Reserved. Design by Manuel</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
