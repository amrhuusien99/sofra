
@extends('front.master')
@section('content')

    <section class="searchresturant">
        <h1>قائمه الوجبات</h1>
        <div class="container">
            @include('flash::message');
            <div class="row">
                @isset($resProducts)
                    @foreach($resProducts as $product)
                        <div class="col-sm-6">
                            <div  class="searchresturantitem"> 
                                <div  style="max-height:220px;">
                                    <div style="line-height: .8;" class="row ">
                                        <div class="col-sm-3">
                                            <img  style="max-height:200px;" src="{{optional($product)->photo}}" alt="">
                                        </div>
                                        <div id="{{optional($product)->id}}" class="col-sm-9 resturantdetail">
                                            <h3 style="line-height:1.1;"> {{optional($product)->title}} </h3>
                                            <p style="line-height:1.1;">مكونات الوجبه : {{optional($product)->content}}</p>
                                            <p style="line-height:1.1;"> 
                                                @if( !$product->price_offer == null) 
                                                    <p> تكلفه الوجبه : {{optional($product)->price_offer}}--<del>{{optional($product)->price}}</del></p>
                                                    
                                                @else
                                                    <p> تكلفه الوجبه : {{optional($product)->price}}</p>
                                                @endif
                                            </p>
                                            <p style="line-height:1.1;"> 
                                                @if( !$product->processing_time == null) 
                                                    <p> وقت تحضير الوجبه : {{optional($product)->processing_time}}</p>
                                                @else

                                                @endif
                                            </p>
                                            @if( auth()->guard('restaurant-web')->check())
                                                <a style="text-decoration:none;font-size:12;" href="{{url(route('product-edit',$product->id))}}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                <a style="text-decoration:none;font-size:12;" href="{{url(route('product-delete',$product->id))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></a>
                                            @endif
                                            @if( auth()->guard('client-web')->check())
                                                <a style="text-decoration:none;font-size:12;" href="{{url(route('client-make-order',$product->id))}}" class="btn btn-success btn-xs"> طلب الوجبه</a>
                                                <a style="text-decoration:none;font-size:18;" href="{{url(route('client-add-cart',['product_id'=>$product->id,'client_id'=>auth('client-web')->user()->id]))}}" class="btn btn-success btn-xs">
                                                    <i class="fas fa-cart-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                @endisset
                @isset($productsall)
                    @foreach($productsall as $product)
                        <div class="col-sm-6">
                            <div  class="searchresturantitem">
                                <div  style="max-height:220px;">
                                    <div style="line-height: 1;" class="row ">
                                        <div class="col-sm-3">
                                            <img  style="max-height:200px;" src="{{optional($product)->photo}}" alt="">
                                        </div>
                                        <div id="{{optional($product)->id}}" class="col-sm-9 resturantdetail">
                                            <h3 style="line-height:1.1;"> {{optional($product)->title}} </h3>
                                            <p style="line-height:1.1;">مكونات الوجبه : {{optional($product)->content}}</p>
                                            <p style="line-height:1.1;"> 
                                                @if( !$product->price_offer == null) 
                                                    <p> تكلفه الوجبه : {{optional($product)->price_offer}}--<del>{{optional($product)->price}}</del></p>
                                                    
                                                @else
                                                    <p> تكلفه الوجبه : {{optional($product)->price}}</p>
                                                @endif
                                            </p>
                                            <p style="line-height:1.1;"> 
                                                @if( !$product->processing_time == null) 
                                                    <p> وقت تحضير الوجبه : {{optional($product)->processing_time}}</p>
                                                @else

                                                @endif
                                            </p>
                                            @if( auth()->guard('restaurant-web')->check())
                                                <a style="text-decoration:none;font-size:12px;" href="{{url(route('product-edit',$product->id))}}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                <a style="text-decoration:none;font-size:12px;" href="{{url(route('product-delete',$product->id))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></a>
                                            @endif
                                            @if( auth()->guard('client-web')->check())
                                                <a style="text-decoration:none;font-size:12px;" href="{{url(route('client-make-order',$product->id))}}" class="btn btn-success btn-xs"> طلب الوجبه</a>
                                                <a style="text-decoration:none;font-size:17px;" href="{{url(route('client-add-cart',['product_id'=>$product->id,'client_id'=>auth('client-web')->user()->id]))}}" class="btn btn-success btn-xs">
                                                    <i class="fas fa-cart-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                @endisset
                 
                
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
                        <a style="text-decoration:none; color:fff;" href="{{url(route('all-offers'))}}" > شاهد العروض </a>
                    </button>
                </div>
            </div>
        </div>
    </section>
    

@endsection