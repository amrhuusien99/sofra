<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Sofra </title>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" /> -->
    <link rel="stylesheet" href="{{asset('front/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/css.css')}}">

</head>

<body>
    <!----------------------------------------nav-------------------------------------------------------->
    <section class="navsec ">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-6 navmarket">
                        @if( auth()->guard('client-web')->check())
                            <a href="{{url(route('product-cart',auth('client-web')->user()->id))}}">
                        @endif    
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>

                <div class="col-sm-4 col-10  navsearch ">
                    <div class="div">
                        <spa n>
                            <input type="search">
                            <i class="fas fa-search "></i>
                        </spa n>
                    </div>
                </div>
                <div class="col-sm-4 col-10 text-left navimg">
                    <a href="{{url(route('index'))}}"> <img src="{{asset('front/img/sofra logo-1.png')}}" alt=""></a>
                </div>

                
                <div class="col-sm-1 col-2 navtoggle">
                    <div class="pos-f-t">
                        <nav class="navbar  ">
                            <button class="navbar-toggler " type="button" data-toggle="collapse"
                                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="">
                                    <a style="text-decoration:none;" href="{{url(route('all-products'))}}" class="btn-xs">
                                        <i class="fas fa-hamburger"></i>
                                    </a>
                                </span>
                            </button>
                        </nav>
                    </div>
                </div>
                
                @if( auth()->guard('client-web')->check())
                    <div class="dropdown col-sm-2 col-6 navuser mb-1">
                            <button class="btn  dropdown-toggle navusertoggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="color: #fff; font-size: 20px;">
                                <span class=""> 
                                    <a href=""><i class="fas fa-user-circle"></i> 
                                        <p style="font-size:20px;">{{auth('client-web')->user()->name}}</p>
                                    </a>
                                </span>
                            </button>
                        <div class="dropdown-menu navusermenu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item " href="{{url(route('client-info',auth('client-web')->user()->id))}}">
                                <i class="far fa-user"></i>
                                حسابى 
                            </a>
                            <a class="dropdown-item" href="{{url(route('client-orders-current',auth('client-web')->user()->id))}}">
                                <i class="fas fa-clipboard-list"></i>
                                طلباتى
                            </a>
                            <a class="dropdown-item" href="{{url(route('all-offers'))}}">
                                <i class="fas fa-gift"></i>
                                العروض
                            </a>
                            <a class="dropdown-item" href="{{url(route('contact'))}}">
                                <i class="far fa-envelope"></i>
                                نواصل معنا 
                            </a>
                            <a class="dropdown-item" href="{{url(route('logout-client'))}}">
                                <i class="fas fa-sign-out-alt"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </div>
                    
                @endif

                @if( auth()->guard('restaurant-web')->check())

                    <div class="dropdown col-sm-1 col-6 navuser ">
                        <button class="btn  dropdown-toggle navusertoggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: #fff; font-size: 20px;">
                            <span class="">
                                 <a href=""> <i class="fas fa-user-circle"></i>
                                    <p style="font-size:20px;">{{auth('restaurant-web')->user()->name}}</p>
                                </a>
                            </span>
                        </button>
                        <div class="dropdown-menu navusermenu " aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item " href="{{url(route('restaurant-info',auth('restaurant-web')->user()->id))}}">
                                <i class="far fa-user"></i>
                                حسابى 
                            </a>
                            <a class="dropdown-item " href="{{url(route('restaurant-products',auth('restaurant-web')->user()->id))}}">
                                <i class="fas fa-gift"></i>
                                المنتجات
                            </a>
                            <a class="dropdown-item " href="{{url(route('add-product'))}}">
                                <i class="fas fa-clipboard-list"></i>
                                 اضافه منتج 
                            </a> 
                            <a class="dropdown-item " href="{{url(route('restaurant-offers',auth('restaurant-web')->user()->id))}}">
                                <i class="fas fa-gift"></i>
                                العروض
                            </a>
                            <a class="dropdown-item " href="{{url(route('add-offer'))}}">
                                <i class="fas fa-clipboard-list"></i>
                                 اضافه عرض 
                            </a>
                            <a class="dropdown-item " href="{{url(route('contact'))}}">
                                <i class="far fa-envelope"></i>
                                نواصل معنا 
                            </a>
                            <a class="dropdown-item " href="{{url(route('restaurant-orders-pending',auth('restaurant-web')->user()->id))}}">
                                <i class="far fa-note"></i>
                                الطلبات المقدمه
                             </a>
                            <a class="dropdown-item " href="{{url(route('logout-restaurant'))}}">
                                <i class="fas fa-sign-out-alt"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </section>

    <!----------------------------------------content-------------------------------------------------------->

    @yield('content')

    <!-- ---------------------------------------download------------------------------------------------------ -->
    <section class="downloadapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1> قم بتحميل التطبيق الخاص بنا الان</h1>

                </div>
                @inject('settings','App\Models\Setting')
                <div class="col-sm-7 text-center">
                    <button> <a style="text-decoration:none;color:fff;" href="{{optional($settings)->first()->app_link}}"> حمل الان </a>
                        <i class="fab fa-android"></i>
                    </button>
                </div>
                <div class="col-sm-5">
                    <img src="{{asset('front/img/app mockup.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- ---------------------------------------footer------------------------------------------------------ -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 footertext ">
                    <img src="{{asset('front/img/edit-min.png')}}" alt="">من نحن
                    <p> {{optional($settings)->first()->about_us}} </p>
                    <a href="{{optional($settings)->first()->insta}}" target="blank"> <i class="fab fa-instagram"></i></a>
                    <a href="{{optional($settings)->first()->twitter}}" target="blank"> <i class="fab fa-twitter"></i></a>
                    <a href="{{optional($settings)->first()->facebook}}" target="blank"> <i class="fab fa-facebook"></i></a>

                </div>
                <div class="col-sm-3 footerimg ">
                    <img src="{{asset('front/img/sofra logo-1.png')}}" alt="">
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/js/jquery-nao-calendar.js')}}"></script>
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script> -->
    <script src="{{asset('front/js/all.js')}}"></script>
    <script src="{{asset('front/js/js.js')}}"></script>

    @stack('scripts')

</body>

</html>