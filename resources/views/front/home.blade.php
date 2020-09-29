@extends('front.master')
@section('content')

<header>
        <div class="container">
            <div class="row">
                <div class="col-12 headerlogo">
                    <p>
                        سفره
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 headertitle">
                    بتشترى .. بتبيع ؟ 
                </div>
            </div>
                <div class="row">
                    <div class="col-12 headerbutton">
                        <button>
                            @if( !auth()->guard('client-web')->check() && !auth()->guard('restaurant-web')->check() )
                                <a style="color:white; text-decoration:none;" href="{{url(route('signin-web'))}}"> سجل الان </a>
                            @endif          
                            <img src="{{asset('front/img/dish.png')}}" alt="">
                        </button>
                    </div>
                </div> 
            </div>
    </header>
    <!----------------------------------------search resturant-------------------------------------------------------->
    <section class="searchresturant">
        <h1>قائمه المطاعم المتاحه</h1>
        <div class="container">
            <div class="row ">

                @foreach($restaurants as $restaurant)
                    <div class="col-sm-6  ">
                        <div class="searchresturantitem">
                            <div class="row ">
                                <div class="col-sm-5">
                                    <img src="{{ $restaurant->photo }}" alt="">
                                </div>
                                <div id="{{ $restaurant->id }}" class="col-sm-5 resturantdetail">
                                    <h3> {{ $restaurant->name }} </h3>
                                    <p>الرقم : {{ $restaurant->phone }}</p>
                                    <p>الحد الادنى للطلب : {{ $restaurant->minimum_order }}</p>
                                    <p> رسوم التوصيل : {{ $restaurant->delivery_cost }}</p>
                                    <a style="text-decoration:none;" href="{{url(route('restaurant-products',$restaurant->id))}}" class="btn btn-info btn-xs"> الوجبات المتاحه للمطعم </a>
                                </div>
                                <div class="col-sm-2 openresturant">
                                        @if( $restaurant->state == 'open') 
                                            <i style="color:#3ddb21;" class="fas fa-circle"></i>
                                            مفتوح
                                        @else
                                            <i style="color:red;" class="fas fa-circle"></i>
                                            مقفول
                                        @endif    
                                        

                                </div>
                               
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>
    <!-- ---------------------------------------offer------------------------------------------------------ -->
    <section class="offer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="{{asset('front/img/Group 1036.png')}}" alt="">
                </div>
                <div class="col-sm-7 offertext">
                    <p>
                        نقدم فى سفره افضل العروض لكل انواع المطاعم والاكلات الشهيه المهلبيه ماذا تنتظر ابدا الاستمتاع
                        بالعروض
                    </p>
                    <button>
                        <a style="text-decoration:none;color:fff;" href="{{url(route('all-offers'))}}"> شاهد العروض </a>
                    </button>
                </div>
            </div>
        </div>
    </section>
    
@endsection